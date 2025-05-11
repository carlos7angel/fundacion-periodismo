<?php

namespace App\Containers\Monitoring\Denunciation\Actions;

use App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByActionJournalisticUnionsTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByActionOrganizationSocietyTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByActionResponseStateTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByActionUnprotectStateTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByAggressorType2Task;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByDepartmentTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByRangeDateAndCategoryTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByReportStatusTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataBySourceInformationTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByVictimAgeGroupTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByVictimGenderTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByVictimTypeTask;
use App\Containers\Monitoring\ViolationType\Tasks\ViolationTypeCategory\GetReportTitleByViolationTypeTask;
use App\Ship\Constants\IndicatorType;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class GetReportDataByIndicatorAction extends ParentAction
{
    public function __construct(
        private GetReportDataByRangeDateAndCategoryTask $getDataReportTask,
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
        $category = app(GetReportTitleByViolationTypeTask::class)->run($request);

        switch ($request->id) {
            case IndicatorType::INDICATOR_VICTIM_TYPE:
                [$data, $title] = app(GetReportDataByVictimTypeTask::class)->run(clone $denunciations);
                break;
            case IndicatorType::INDICATOR_AGGRESSOR_TYPE:
                [$data, $title] = app(GetReportDataByAggressorType2Task::class)->run(clone $denunciations);
                break;
            case IndicatorType::INDICATOR_VICTIM_GENDER:
                [$data, $title] = app(GetReportDataByVictimGenderTask::class)->run(clone $denunciations);
                break;
            case IndicatorType::INDICATOR_VICTIM_AGE_GROUP:
                [$data, $title] = app(GetReportDataByVictimAgeGroupTask::class)->run(clone $denunciations);
                break;
            case IndicatorType::INDICATOR_DEPARTMENT:
                [$data, $title] = app(GetReportDataByDepartmentTask::class)->run(clone $denunciations);
                break;
            case IndicatorType::INDICATOR_REPORT_STATUS:
                [$data, $title] = app(GetReportDataByReportStatusTask::class)->run(clone $denunciations);
                break;
            case IndicatorType::INDICATOR_ACTION_RESPONSE_STATE:
                [$data, $title] = app(GetReportDataByActionResponseStateTask::class)->run(clone $denunciations);
                break;
            case IndicatorType::INDICATOR_UNPROTECT_STATE:
                [$data, $title] = app(GetReportDataByActionUnprotectStateTask::class)->run(clone $denunciations);
                break;
            case IndicatorType::INDICATOR_ACTION_JOURNALISTIC_UNIONS:
                [$data, $title] = app(GetReportDataByActionJournalisticUnionsTask::class)->run(clone $denunciations);
                break;
            case IndicatorType::INDICATOR_ACTION_ORGANIZATION_SOCIETY:
                [$data, $title] = app(GetReportDataByActionOrganizationSocietyTask::class)->run(clone $denunciations);
                break;
            case IndicatorType::INDICATOR_SOURCE_INFORMATION:
                [$data, $title] = app(GetReportDataBySourceInformationTask::class)->run(clone $denunciations);
                break;
        }

        $result = [
            'report' => $data,
            'total' => (clone $denunciations)->count(),
            'rows' => $denunciations->all(),
            'title' => $title,
            'category' => $category
        ];

        return $result;
    }
}
