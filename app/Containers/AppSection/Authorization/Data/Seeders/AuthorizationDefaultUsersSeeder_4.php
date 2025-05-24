<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\User\Tasks\CreateUserTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class AuthorizationDefaultUsersSeeder_4 extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     * @throws \Throwable
     */
    public function run(CreateUserTask $task): void
    {
        $userData = [
            'email' => 'admin@admin.com',
            'password' => 'admin.123',
            'name' => 'Administrator',
        ];

        $user_admin = $task->run($userData);
        $user_admin->assignRole(app(FindRoleTask::class)->run('admin', 'web'));
        $user_admin->email_verified_at = now();
        $user_admin->save();
    }
}
