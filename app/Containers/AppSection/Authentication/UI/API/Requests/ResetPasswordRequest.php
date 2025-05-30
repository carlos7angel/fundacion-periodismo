<?php

namespace App\Containers\AppSection\Authentication\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rules\Password;

class ResetPasswordRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [];

    protected array $urlParameters = [];

    public function rules(): array
    {
        return [
            'token' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:50',
        ];
    }

    public function authorize(): bool
    {
        return $this->hasAccess();
    }
}
