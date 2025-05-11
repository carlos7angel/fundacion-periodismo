<?php

namespace App\Containers\Monitoring\ViolationType\Tasks\ViolationTypeCategory;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Monitoring\ViolationType\Data\Repositories\ViolationTypeCategoryRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListViolationTypeMapToArrayTask extends ParentTask
{
    public function __construct(
        private readonly ViolationTypeCategoryRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $categories = $this->repository->findWhere(['active' => true]);

        $violationData = $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'items' => $category->items->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'name' => $item->name,
                    ];
                })->values()->all(),
            ];
        })->values()->all();

        // dd($violationData);

        return $violationData;
    }
}
