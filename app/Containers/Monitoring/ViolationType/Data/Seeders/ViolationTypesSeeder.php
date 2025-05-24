<?php

namespace App\Containers\Monitoring\ViolationType\Data\Seeders;

use App\Containers\Monitoring\ViolationType\Tasks\ViolationType\CreateViolationTypeTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class ViolationTypesSeeder extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     * @throws \Throwable
     */
    public function run(CreateViolationTypeTask $task): void
    {
        $task->run(['fid_violation_type_category' => 1, 'name' => 'Asesinato']);
        $task->run(['fid_violation_type_category' => 1, 'name' => 'Homicidio']);
        $task->run(['fid_violation_type_category' => 1, 'name' => 'Tortura']);
        $task->run(['fid_violation_type_category' => 1, 'name' => 'Desaparición forzada/ secuestro']);
        $task->run(['fid_violation_type_category' => 1, 'name' => 'Detención arbitraria']);
        $task->run(['fid_violation_type_category' => 1, 'name' => 'Proceso judicial ilegal o indebido']);
        $task->run(['fid_violation_type_category' => 1, 'name' => 'Requerimiento fiscal (infundado)']);
        $task->run(['fid_violation_type_category' => 1, 'name' => 'Desplazamiento forzado interno']);
        $task->run(['fid_violation_type_category' => 1, 'name' => 'Desplazamiento forzado externo']);
        $task->run(['fid_violation_type_category' => 1, 'name' => 'Persecución / Acoso']);

        $task->run(['fid_violation_type_category' => 2, 'name' => 'Violación/ agresión sexual']);
        $task->run(['fid_violation_type_category' => 2, 'name' => 'Amenaza sexual']);
        $task->run(['fid_violation_type_category' => 2, 'name' => 'Acoso sexual']);
        $task->run(['fid_violation_type_category' => 2, 'name' => 'Revictimización']);
        $task->run(['fid_violation_type_category' => 2, 'name' => 'Acoso y violencia digital']);
        $task->run(['fid_violation_type_category' => 2, 'name' => 'Persecución']);
        $task->run(['fid_violation_type_category' => 2, 'name' => 'Amenazas al entorno familiar']);
        $task->run(['fid_violation_type_category' => 2, 'name' => 'Amenazas a hijos e hijas']);
        $task->run(['fid_violation_type_category' => 2, 'name' => 'Desplazamiento forzado interno']);
        $task->run(['fid_violation_type_category' => 2, 'name' => 'Desplazamiento forzado externo']);

        $task->run(['fid_violation_type_category' => 3, 'name' => 'Ataque-agresión física']);
        $task->run(['fid_violation_type_category' => 3, 'name' => 'Agresión verbal']);
        $task->run(['fid_violation_type_category' => 3, 'name' => 'Amenazas de muerte y otras']);
        $task->run(['fid_violation_type_category' => 3, 'name' => 'Discriminación']);
        $task->run(['fid_violation_type_category' => 3, 'name' => 'Interceptación y grabación de correos electrónicos,  llamadas telefónicas y comunicaciones en general']);

        $task->run(['fid_violation_type_category' => 4, 'name' => 'Coacción']);
        $task->run(['fid_violation_type_category' => 4, 'name' => 'Coacción administrativa (ATT)']);
        $task->run(['fid_violation_type_category' => 4, 'name' => 'Coacción publicitaria']);
        $task->run(['fid_violation_type_category' => 4, 'name' => 'Coacción tributaria (ilegítima)']);
        $task->run(['fid_violation_type_category' => 4, 'name' => 'Censura previa']);
        $task->run(['fid_violation_type_category' => 4, 'name' => 'Ataque /cerco a instalaciones e infraestructura de medios de comunicación (Chapultepec; protocolo Bolivia)']);
        $task->run(['fid_violation_type_category' => 4, 'name' => 'Robo-hurto de equipos, materiales y pertenencias de periodistas']);
        $task->run(['fid_violation_type_category' => 4, 'name' => 'Secuestro de equipos y materiales periodísticos']);
        $task->run(['fid_violation_type_category' => 4, 'name' => 'Requerimiento para revelar el secreto de fuente']);
        $task->run(['fid_violation_type_category' => 4, 'name' => 'Destrozo/destrucción de equipos y/o infraestructura']);
        $task->run(['fid_violation_type_category' => 4, 'name' => 'Borrado de material periodístico']);
        $task->run(['fid_violation_type_category' => 4, 'name' => 'Ataque informático/digital a medios y periodistas']);
        $task->run(['fid_violation_type_category' => 4, 'name' => 'Impedir/Entorpecer el trabajo periodístico']);
        $task->run(['fid_violation_type_category' => 4, 'name' => 'Impedir/entorpecer el acceso a fuentes de información']);
        $task->run(['fid_violation_type_category' => 4, 'name' => 'Criminalización']);
        $task->run(['fid_violation_type_category' => 4, 'name' => 'Requerimiento para ser testigo en juicios a terceros']);

        $task->run(['fid_violation_type_category' => 5, 'name' => 'Uso del nombre del periodista para difundir mensajes desinformadores']);
        $task->run(['fid_violation_type_category' => 5, 'name' => 'Uso del nombre del medio de comunicación para difundir mensajes desinformadores']);
        $task->run(['fid_violation_type_category' => 5, 'name' => 'Discurso de odio contra periodistas']);
        $task->run(['fid_violation_type_category' => 5, 'name' => 'Difamación']);
        $task->run(['fid_violation_type_category' => 5, 'name' => 'Amenazas e intimidación']);
        $task->run(['fid_violation_type_category' => 5, 'name' => 'Acoso']);
        $task->run(['fid_violation_type_category' => 5, 'name' => 'Invasión de privacidad y exposición de información personal']);
        $task->run(['fid_violation_type_category' => 5, 'name' => 'Estigmatización']);
        $task->run(['fid_violation_type_category' => 5, 'name' => 'Denuncias o acusaciones infundadas']);

        $task->run(['fid_violation_type_category' => 6, 'name' => 'Incumplimiento de contrato laboral']);
        $task->run(['fid_violation_type_category' => 6, 'name' => 'Contrato laboral sin seguridad a corto plazo']);
        $task->run(['fid_violation_type_category' => 6, 'name' => 'Contrato laboral sin seguridad a largo plazo']);
        $task->run(['fid_violation_type_category' => 6, 'name' => 'Acuerdo laboral sin contrato']);



    }
}
