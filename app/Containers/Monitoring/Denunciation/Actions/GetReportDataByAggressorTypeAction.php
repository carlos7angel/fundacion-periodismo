<?php

namespace App\Containers\Monitoring\Denunciation\Actions;

use App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByAggressorTypeTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class GetReportDataByAggressorTypeAction extends ParentAction
{
    public function __construct(
        private GetReportDataByAggressorTypeTask $getDataReportTask,
        private FindCatalogByCodeTask $findCatalogTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(Request $request): mixed
    {
        $denunciations = $this->getDataReportTask->run($request);
        $catalog = app(FindCatalogByCodeTask::class)->run('AGR');
        $data = [];
        foreach ($catalog->items as $index => $catalog_item) {
            $rows = (clone $denunciations)->where('aggressor_type', $catalog_item->name)->get();
            $data[] = [
                "short_name" => $this->toShortName($catalog_item->name),
                "name" => $catalog_item->name,
                "total" => $rows->count(),
            ];
        }

        $result = [
            'report' => $data,
            'total' => (clone $denunciations)->count(),
            'rows' => $denunciations->all()
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
