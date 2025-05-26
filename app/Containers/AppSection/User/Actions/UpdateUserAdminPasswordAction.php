<?php

namespace App\Containers\AppSection\User\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\UpdateUserTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;

class UpdateUserAdminPasswordAction extends ParentAction
{
    public function __construct(
        private UpdateUserTask $updateUserTask,
    ) {
    }

    /**
     * @throws IncorrectIdException
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(Request $request): User
    {
        $sanitizedData = $request->sanitizeInput([
            'password',
        ]);

        $user = $this->updateUserTask->run($request->id, ['password' => $sanitizedData['password']]);

        return $user;
    }
}
