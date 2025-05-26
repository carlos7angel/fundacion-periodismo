<?php

namespace App\Containers\Monitoring\Denunciation\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Monitoring\Denunciation\Data\Repositories\DenunciationRepository;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListDenunciationsWithPaginationTask extends ParentTask
{
    public function __construct(
        private DenunciationRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(Request $request): mixed
    {
        $search_field = null;
        if ($request->get('search')) {
            $search_field = trim($request->get('search'));
        }

        $category_id = null;
        if ($request->category_id) {
            $category_id = (int) $request->category_id;
        }

        $result = $this->repository->scopeQuery(function ($query) use ($search_field, $category_id){

            if (! empty($category_id)) {
                $query = $query->whereHas('violationTypes.category', function ($q) use ($category_id) {
                    $q->where('violation_type_categories.id', $category_id);
                });
            }

            if (! empty($search_field)) {
                $query = $query->where(function ($q) use ($search_field) {
                    $q->where('description_event', 'like', "%{$search_field}%")
                        ->orWhereHas('violationTypes.category', function ($q2) use ($search_field) {
                            $q2->where('name', 'like', "%{$search_field}%");
                        })
                        ->orWhereHas('violationTypes', function ($q3) use ($search_field) {
                            $q3->where('violation_types.name', 'like', "%{$search_field}%");
                        });
                });
            }

            $query->with('violationTypes');

            return $query->distinct()->select(['denunciations.*']);

        })->paginate(1);

        return $result;
    }
}
