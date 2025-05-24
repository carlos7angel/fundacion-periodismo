<?php

namespace App\Containers\AppSection\Catalog\Data\Seeders;

use App\Containers\AppSection\Catalog\Tasks\Catalog\CreateCatalogTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class CatalogsSeeder_1 extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     * @throws \Throwable
     */
    public function run(CreateCatalogTask $task): void
    {
        $task->run(['id' => 1, 'code' => 'AGR', 'name' => 'Tipo de agresor']);
        $task->run(['id' => 2, 'code' => 'VIC', 'name' => 'Tipo de víctima']);
        $task->run(['id' => 3, 'code' => 'GEN', 'name' => 'Género']);
        $task->run(['id' => 4, 'code' => 'AGE', 'name' => 'Grupo etario']);
        $task->run(['id' => 5, 'code' => 'STA', 'name' => 'Estado de la denuncia']);
        $task->run(['id' => 6, 'code' => 'SST', 'name' => 'Estado de la agresión denunciada']);
        $task->run(['id' => 7, 'code' => 'CTX', 'name' => 'Circunstancia del hecho']);
        $task->run(['id' => 8, 'code' => 'ARE', 'name' => 'Acción/respuesta del estado']);
        $task->run(['id' => 9, 'code' => 'APE', 'name' => 'Acciones de desprotección del estado']);
        $task->run(['id' => 10, 'code' => 'RGP', 'name' => 'Respuesta/Acción de gremios periodísticos']);
        $task->run(['id' => 11, 'code' => 'ROS', 'name' => 'Respuesta/Acción de Organizaciones de la Sociedad Civil']);
        $task->run(['id' => 12, 'code' => 'SOU', 'name' => 'Fuente de información']);
    }
}
