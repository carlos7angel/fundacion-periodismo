<?php

namespace App\Containers\Monitoring\Denunciation\Tasks;

use App\Containers\Monitoring\Denunciation\Data\Repositories\DenunciationRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Str;

class GetReportDataByRangeDateAndCategoryTask extends ParentTask
{
    public function __construct(
        private DenunciationRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(Request $request): mixed
    {
        $start_date = $request->get('start');
        $end_date = $request->get('end');

        $category_id = $level = null;
        if ($request->has('category')) {
            if (Str::contains($request->get('category'), 'CAT_')) {
                $level = 'CATEGORY';
                $group = explode('_', $request->get('category'));
                $category_id = (int) $group[1];
            }
            if (Str::contains($request->get('category'), 'ITEM_')) {
                $level = 'TYPE';
                $group = explode('_', $request->get('category'));
                $category_id = (int) $group[1];
            }
        }

        try {
            $result = $this->repository->scopeQuery(function ($query) use ($start_date, $end_date, $level, $category_id) {

                if ($start_date == $end_date) {
                    $query = $query->whereDate('date_event', '=', $start_date);
                } else if ($start_date <= $end_date) {
                    $query = $query->whereDate('date_event', '>=', $start_date)
                                    ->whereDate('date_event', '<=', $end_date);
                }

                if (! empty($category_id) && ! empty($level)) {

                    if ($level === 'CATEGORY') {
                        $query = $query->whereHas('violationTypes.category', function ($q) use ($category_id) {
                            $q->where('violation_type_categories.id', $category_id);
                        });
                    }
                    if ($level === 'TYPE') {
                        $query = $query->whereHas('violationTypes', function ($q) use ($category_id) {
                            $q->where('violation_types.id', $category_id);
                        });
                    }
                }

                $query->with('violationTypes');
                return $query->distinct()->select([
                    'denunciations.*',
                ]);
            });

            return $result;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
