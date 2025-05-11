<?php

namespace App\Containers\Monitoring\Denunciation\Tasks;

use App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask;
use App\Containers\Monitoring\Denunciation\Data\Repositories\DenunciationRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetReportDataBySourceInformationTask extends ParentTask
{
    public function __construct(
        private DenunciationRepository $repository,
    ) {
    }

    public function run($denunciations): mixed
    {
        $catalog = app(FindCatalogByCodeTask::class)->run('SOU');
        $title = 'Fuente de información';

        $data = [];
        foreach ($catalog->items as $index => $catalog_item) {
            $rows = (clone $denunciations)->where('source_information', $catalog_item->name)->get();
            $data[] = [
                "short_name" => toShortName($catalog_item->name),
                "name" => $catalog_item->name,
                "total" => $rows->count(),
            ];
        }

        return [$data, $title];
    }
}
