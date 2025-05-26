<?php

namespace App\Containers\Frontend\Administrator\UI\WEB\Requests\Authentication;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateUsernameProfileRequest extends ParentRequest
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
            'username' => 'required|min:6|max:50',
        ];
    }

    public function authorize(): bool
    {
        return $this->hasAccess();
    }
}
