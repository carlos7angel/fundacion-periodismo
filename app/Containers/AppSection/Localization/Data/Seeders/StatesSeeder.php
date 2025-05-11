<?php

namespace App\Containers\AppSection\Localization\Data\Seeders;

use App\Containers\AppSection\Localization\Tasks\State\CreateStateTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class StatesSeeder extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     * @throws \Throwable
     */
    public function run(CreateStateTask $task): void
    {
        $task->run(['id' => 1, 'code' => 'LPZ', 'name' => 'La Paz', 'main_axis' => true]);
        $task->run(['id' => 2, 'code' => 'ORU', 'name' => 'Oruro', 'main_axis' => false]);
        $task->run(['id' => 3, 'code' => 'PTS', 'name' => 'Potosí', 'main_axis' => false]);
        $task->run(['id' => 4, 'code' => 'CBA', 'name' => 'Cochabamba', 'main_axis' => true]);
        $task->run(['id' => 5, 'code' => 'CHQ', 'name' => 'Chuquisaca', 'main_axis' => false]);
        $task->run(['id' => 6, 'code' => 'TJA', 'name' => 'Tarija', 'main_axis' => false]);
        $task->run(['id' => 7, 'code' => 'PND', 'name' => 'Pando', 'main_axis' => false]);
        $task->run(['id' => 8, 'code' => 'BEN', 'name' => 'Beni', 'main_axis' => false]);
        $task->run(['id' => 9, 'code' => 'SCZ', 'name' => 'Santa Cruz', 'main_axis' => true]);
    }
}
