<?php

namespace App\Containers\Monitoring\Denunciation\Actions;

use App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByViolationTypeTask;
use App\Containers\Monitoring\ViolationType\Tasks\ViolationTypeCategory\FindViolationTypeCategoryByIdTask;
use App\Containers\Monitoring\ViolationType\Tasks\ViolationTypeCategory\ListViolationTypeCategoriesTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class GetReportDataByViolationTypeAction extends ParentAction
{
    public function __construct(
        private GetReportDataByViolationTypeTask $getDataReportTask,
        private FindCatalogByCodeTask $findCatalogTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(Request $request): mixed
    {
        $denunciations = $this->getDataReportTask->run($request);
        $data = [];
        $title = '-';

        if ($request->has('category') && ! empty($request->get('category'))) {
            $category = app(FindViolationTypeCategoryByIdTask::class)->run($request->get('category'));

            foreach ($category->items as $index => $violation_type) {

                $rows = (clone $denunciations)->whereHas('violationTypes', function ($q) use ($violation_type) {
                    $q->where('violation_types.id', $violation_type->id);
                })->get();

                $data[] = [
                    "short_name" => $this->toShortName($violation_type->name),
                    "name" => $violation_type->name,
                    "total" => $rows->count(),
                ];
            }

            $title = $category->name;

        } else {
            $categories = app(ListViolationTypeCategoriesTask::class)->run();

            foreach ($categories as $index => $category) {

                $rows = (clone $denunciations)->whereHas('violationTypes.category', function ($q) use ($category) {
                    $q->where('id', $category->id);
                })->get();

                $data[] = [
                    "short_name" => $this->toShortName($category->name),
                    "name" => $category->name,
                    "total" => $rows->count(),
                ];
            }

            $title = 'Todos los tipos de agresión o vulneración';
        }

        $result = [
            'report' => $data,
            'total' => (clone $denunciations)->count(),
            'rows' => $denunciations->all(),
            'title' => $title
        ];

        return $result;
    }

    private function toShortName(string $_name): string {
        if (strlen($_name) > 30) {
            return trim(mb_substr($_name, 0, 30, 'UTF-8')) . '...';
        }
        return $_name;
    }
}
