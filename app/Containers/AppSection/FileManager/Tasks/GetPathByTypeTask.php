<?php

namespace App\Containers\AppSection\FileManager\Tasks;

use App\Containers\Monitoring\Report\Models\Report;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetPathByTypeTask extends ParentTask
{
    public function __construct() {
    }

    public function run($type, $id, $user = null): mixed
    {
        switch (strtolower($type)) {
            case 'report-yearly':
                $fileable_id = $id;
                $fileable_type = Report::class;
                $path = '/informes/anuales';
                break;

            case 'report-quarterly':
                $fileable_id = $id;
                $fileable_type = Report::class;
                $path = '/informes/trimestrales';
                break;

            default:
                break;
        }

        return [$path,$fileable_type,$fileable_id];
    }
}
