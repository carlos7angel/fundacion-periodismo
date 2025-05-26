<?php

namespace App\Containers\Frontend\Administrator\UI\WEB\Requests\Authentication;

use App\Ship\Parents\Requests\Request as ParentRequest;

class MyProfileRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [

    ];

    protected array $urlParameters = [

    ];

    public function rules(): array
    {
        return [

        ];
    }

    public function authorize(): bool
    {
        return $this->hasAccess();
    }
}
