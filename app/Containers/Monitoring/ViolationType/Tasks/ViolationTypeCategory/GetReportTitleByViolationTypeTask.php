<?php

namespace App\Containers\Monitoring\ViolationType\Tasks\ViolationTypeCategory;

use App\Containers\Monitoring\ViolationType\Models\ViolationTypeCategory;
use App\Containers\Monitoring\ViolationType\Tasks\ViolationType\FindViolationTypeByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Str;

class GetReportTitleByViolationTypeTask extends ParentTask
{
    public function __construct(
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(Request $request): string
    {
        $category_id = null;
        $name = '';

        if ($request->has('category')) {
            if (Str::contains($request->get('category'), 'CAT_')) {
                $group = explode('_', $request->get('category'));
                $category_id = (int) $group[1];
                $category = app(FindViolationTypeCategoryByIdTask::class)->run($category_id);
                $name = $category->name;
            }
            if (Str::contains($request->get('category'), 'ITEM_')) {
                $group = explode('_', $request->get('category'));
                $type_id = (int) $group[1];
                $type = app(FindViolationTypeByIdTask::class)->run($type_id);
                $name = $type->name;
            }
        }

        return  $name;
    }
}
