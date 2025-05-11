<?php

namespace App\Containers\Monitoring\Denunciation\Tasks;

use App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask;
use App\Containers\AppSection\Localization\Tasks\State\ListStatesTask;
use App\Containers\Monitoring\Denunciation\Data\Repositories\DenunciationRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetReportDataByDepartmentTask extends ParentTask
{
    public function __construct(
        private DenunciationRepository $repository,
    ) {
    }

    public function run($denunciations): mixed
    {
        $states = app(ListStatesTask::class)->run();
        $title = 'Departamento';

        $data = [];
        foreach ($states as $index => $state) {
            $rows = (clone $denunciations)->where('state', $state->name)->get();
            $data[] = [
                "short_name" => toShortName($state->name),
                "name" => $state->name,
                "total" => $rows->count(),
            ];
        }

        return [$data, $title];
    }
}
