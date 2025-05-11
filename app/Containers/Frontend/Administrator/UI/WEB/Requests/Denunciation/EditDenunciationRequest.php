<?php

namespace App\Containers\Frontend\Administrator\UI\WEB\Requests\Denunciation;

use App\Ship\Parents\Requests\Request as ParentRequest;

class EditDenunciationRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [

    ];

    protected array $urlParameters = [
        'id',
    ];

    public function rules(): array
    {
        return [
            'id' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
