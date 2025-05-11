<?php

namespace App\Containers\Monitoring\Denunciation\Actions;

use App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByAggressorTypeTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByRangeDateTask;
use App\Containers\Monitoring\ViolationType\Tasks\ViolationTypeCategory\FindViolationTypeCategoryByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class GetReportDataByVictimTypeAction extends ParentAction
{
    public function __construct(
        private GetReportDataByRangeDateTask $getDataReportTask,
        private FindCatalogByCodeTask $findCatalogTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(Request $request): mixed
    {
        $denunciations = $this->getDataReportTask->run($request);
        $catalog = app(FindCatalogByCodeTask::class)->run('VIC');
        $data = [];
        $title = 'Todos los Tipos de Víctima';

        if ($request->has('category') && ! empty($request->get('category'))) {
            $category = app(FindViolationTypeCategoryByIdTask::class)->run($request->get('category'));
            $title = $category->name;
        }

        foreach ($catalog->items as $index => $catalog_item) {
            $rows = (clone $denunciations)->where('victim_type', $catalog_item->name)->get();
            $data[] = [
                "short_name" => $this->toShortName($catalog_item->name),
                "name" => $catalog_item->name,
                "total" => $rows->count(),
            ];
        }

        $result = [
            'report' => $data,
            'total' => (clone $denunciations)->count(),
            'rows' => $denunciations->all(),
            "title" => $title
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
