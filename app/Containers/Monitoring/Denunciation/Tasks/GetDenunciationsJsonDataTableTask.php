<?php

namespace App\Containers\Monitoring\Denunciation\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\Monitoring\Denunciation\Data\Repositories\DenunciationRepository;
use App\Ship\Criterias\SkipTakeCriteria;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;
use Prettus\Repository\Exceptions\RepositoryException;

class GetDenunciationsJsonDataTableTask extends ParentTask
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
        $requestData = $request->all();

        $draw = $requestData['draw'];
        $start = $requestData['start'];
        $length = $requestData['length'];
        $sortColumn = $sortColumnDir = null;
        if (isset($requestData['order'])) {
            $indexSort = $requestData['order'][0]['column'];
            $sortColumn = $requestData['columns'][$indexSort]['name'];
            $sortColumnDir = $requestData['order'][0]['dir'];
        }
        $searchValue = $requestData['search']['value'];
        $pageSize = $length != null ? intval($length) : 0;
        $skip = $start != null ? intval($start) : 0;

        $searchFieldCode = $requestData['columns'][1]['search']['value'];
        $searchFieldStatus = $requestData['columns'][6]['search']['value'];
        $searchFieldViolationType = $requestData['columns'][2]['search']['value'];
        $searchFieldAggressorType = $requestData['columns'][3]['search']['value'];
        $searchFieldVictimType = $requestData['columns'][4]['search']['value'];

        $searchFieldStartDate = $requestData['columns'][5]['search']['value'];
        $searchFieldEndDate = $requestData['columns'][7]['search']['value'];

        $result = $this->repository->scopeQuery(function ($query) use (
            $searchValue,
            $searchFieldCode,
            $searchFieldStatus,
            $searchFieldStartDate,
            $searchFieldEndDate,
            $searchFieldViolationType,
            $searchFieldAggressorType,
            $searchFieldVictimType,
        ) {
            if (! empty($searchFieldCode)) {
                $query = $query->where('code', 'like', '%'.$searchFieldCode.'%');
            }

            if (! empty($searchFieldStatus)) {
                $query = $query->where('status', '=', $searchFieldStatus);
            }

//            if (! empty($searchFieldDate)) {
//                $searchDate = Carbon::createFromFormat('d/m/Y', $searchFieldDate)->format('Y-m-d');
//                $query = $query->whereDate('date_event', '=', $searchDate);
//            }

            if (!empty($searchFieldStartDate) || !empty($searchFieldEndDate)) {
                if (!empty($searchFieldStartDate)) {
                    $dateStart = Carbon::createFromFormat('d/m/Y', $searchFieldStartDate)->startOfDay()->format('Y-m-d');
                }

                if (!empty($searchFieldEndDate)) {
                    $dateEnd = Carbon::createFromFormat('d/m/Y', $searchFieldEndDate)->endOfDay()->format('Y-m-d');
                }

                if (!empty($dateStart) && !empty($dateEnd)) {
                    $query = $query->whereBetween('date_event', [$dateStart, $dateEnd]);
                } elseif (!empty($dateStart)) {
                    $query = $query->whereDate('date_event', '>=', $dateStart);
                } elseif (!empty($dateEnd)) {
                    $query = $query->whereDate('date_event', '<=', $dateEnd);
                }
            }

            if (! empty($searchFieldAggressorType)) {
                $query = $query->where('aggressor_type', '=', $searchFieldAggressorType);
            }

            if (! empty($searchFieldVictimType)) {
                $query = $query->where('victim_type', '=', $searchFieldVictimType);
            }

            if (! empty($searchFieldViolationType)) {
                $query = $query->whereHas('violationTypes.category', function ($q) use ($searchFieldViolationType) {
                    $q->where('id', $searchFieldViolationType);
                });
            }

            if (! empty($searchValue)) {
                $query = $query->where('code', 'like', '%'.$searchValue.'%')
                    ->orWhere('aggressor_name', 'like', '%'.$searchValue.'%')
                    ->orWhere('victim_name', 'like', '%'.$searchValue.'%');
            }

            $query = $query->whereIn('status', ['NEW', 'IN_PROGRESS', 'CLOSED', 'ARCHIVED']);

            $query->with('violationTypes');

            return $query->distinct()->select(['denunciations.*']);
        });

        $recordsTotal =  (clone $result)->count();
        $result = $result->pushCriteria(new SkipTakeCriteria($skip, $pageSize));

        if ($sortColumn != null && $sortColumn != "" && $sortColumnDir != null && $sortColumnDir != "") {
            $result->orderBy($sortColumn, $sortColumnDir);
        }

        return [
            'draw' => $draw,
            'recordsFiltered' => $recordsTotal,
            'recordsTotal' => $recordsTotal,
            'data' => $result->all()
        ];
    }
}
