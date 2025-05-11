<?php

namespace App\Containers\Monitoring\ViolationType\Data\Seeders;

use App\Containers\Monitoring\ViolationType\Tasks\ViolationTypeCategory\CreateViolationTypeCategoryTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class ViolationTypeCategoriesSeeder extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     * @throws \Throwable
     */
    public function run(CreateViolationTypeCategoryTask $task): void
    {
        $task->run(['id' => 1, 'name' => 'Vulneración de derechos y delitos contra la vida, integridad corporal, dignidad y libertad del ser humano']);
        $task->run(['id' => 2, 'name' => 'Violencia/ agresión física, sexual y/o psicológica contra mujeres periodistas (Belem do Pará)']);
        $task->run(['id' => 3, 'name' => 'Otras agresiones y vulneraciones a derechos y libertades individuales']);
        $task->run(['id' => 4, 'name' => 'Vulneración de la Libertad de Prensa y Trabajo']);
        $task->run(['id' => 5, 'name' => 'Violencia digital y Desinformación']);
        $task->run(['id' => 6, 'name' => 'Vulneración de derechos económicos, laborales y contractuales']);

    }
}
