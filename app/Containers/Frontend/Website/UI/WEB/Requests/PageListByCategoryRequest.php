<?php

namespace App\Containers\Frontend\Website\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class PageListByCategoryRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [
        // 'id',
    ];

    protected array $urlParameters = [
        'category_id',
        'category_name'
    ];

    public function rules(): array
    {
        return [
            'category_id' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
