<?php

namespace App\Containers\Frontend\Administrator\UI\WEB\Requests\Document;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateDocumentRequest extends ParentRequest
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
        return $this->check([
            'hasAccess',
        ]);
    }
}
