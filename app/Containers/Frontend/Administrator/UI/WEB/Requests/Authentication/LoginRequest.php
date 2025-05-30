<?php

namespace App\Containers\Frontend\Administrator\UI\WEB\Requests\Authentication;

use App\Containers\AppSection\Authentication\Classes\LoginFieldParser;
use App\Ship\Parents\Requests\Request as ParentRequest;

class LoginRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [];

    protected array $urlParameters = [];

    public function rules(): array
    {
        $rules = [
            'password' => 'required',
            'remember' => 'boolean',
        ];

        return LoginFieldParser::mergeValidationRules($rules);
    }

    public function authorize(): bool
    {
        return $this->hasAccess();
    }
}
