<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreateRoleTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class AuthorizationRolesSeeder_2 extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     */
    public function run(CreateRoleTask $task): void
    {
        // Default Roles for every Guard ----------------------------------------------------------------
        $task->run(config('appSection-authorization.admin_role'), 'Usuario administrador', 'Administrador', 'web');
        $task->run('monitor', 'Usuario de monitoreo', 'Monitor', 'web');
    }
}
