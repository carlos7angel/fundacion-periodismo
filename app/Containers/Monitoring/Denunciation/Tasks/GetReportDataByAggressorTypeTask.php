<?php

namespace App\Containers\Monitoring\Denunciation\Tasks;

use App\Containers\Monitoring\Denunciation\Data\Repositories\DenunciationRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetReportDataByAggressorTypeTask extends ParentTask
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
        // TODO: check dates and change logic
        $start_date = $request->get('start');
        $end_date = $request->get('end');

        try {
            $result = $this->repository->scopeQuery(function ($query) use ($start_date, $end_date) {

                if ($start_date == $end_date) {
                    $query = $query->whereDate('date_event', '=', $start_date);
                } else if ($start_date <= $end_date) {
                    $query = $query->whereDate('date_event', '>=', $start_date)
                                    ->whereDate('date_event', '<=', $end_date);
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
