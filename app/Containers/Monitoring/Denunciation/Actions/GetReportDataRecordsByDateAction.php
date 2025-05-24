<?php

namespace App\Containers\Monitoring\Denunciation\Actions;

use App\Containers\AppSection\Catalog\Tasks\Catalog\FindCatalogByCodeTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetDenunciationsByCreatedDateTask;
use App\Containers\Monitoring\Denunciation\Tasks\GetReportDataByRangeDateTask;
use App\Containers\Monitoring\Denunciation\Tasks\ListDenunciationsTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class GetReportDataRecordsByDateAction extends ParentAction
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
        Carbon::setLocale('es');

        $date_start = Carbon::today()->subDays(30);
        $date_finish = Carbon::now()->addDays(1);

        $from = $date_start->copy()->startOfDay();
        $to = $date_finish->copy()->startOfDay();
        $to->addDay();
        $step = CarbonInterval::day();
        $period = new \DatePeriod($from, $step, $to);

        $data = [];
        foreach ($period as $day) {
            $dater = $day->format('Y-m-d');
            $regs = app(GetDenunciationsByCreatedDateTask::class)->run($dater);
            $data[] = (object)[
                //"date" => $day->translatedFormat('M d'),
                "date" => $day->format('M d'),
                "value" => $regs->count()
            ];
        }

        $denunciations = app(ListDenunciationsTask::class)->run();

        return [
            'report' => $data,
            'totals' => [
                'all' => $denunciations->count(),
                'in_progress' => $denunciations->where('status', 'IN_PROGRESS')->count(),
                'closed' => $denunciations->where('status', 'CLOSED')->count()
            ]

        ];
    }

}
