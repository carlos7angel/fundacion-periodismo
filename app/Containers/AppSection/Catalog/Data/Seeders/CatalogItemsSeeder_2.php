<?php

namespace App\Containers\AppSection\Catalog\Data\Seeders;

use App\Containers\AppSection\Catalog\Tasks\CatalogItem\CreateCatalogItemTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class CatalogItemsSeeder_2 extends ParentSeeder
{
    /**
     * @throws CreateResourceFailedException
     * @throws \Throwable
     */
    public function run(CreateCatalogItemTask $task): void
    {
        $task->run(['catalog_code' => 'AGR', 'code' => 'AGR01', 'name' => 'Actor estatal']);
        $task->run(['catalog_code' => 'AGR', 'code' => 'AGR02', 'name' => 'Otros actores que actúan con el permiso, apoyo o aquiescencia del Estado']);
        $task->run(['catalog_code' => 'AGR', 'code' => 'AGR03', 'name' => 'Otros actores que no actúan con el permiso, apoyo o aquiescencia del Estado / actores privados']);

        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE01', 'name' => 'Autoridad del poder ejecutivo nacional']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE02', 'name' => 'Autoridad de entidad desconcentrada nacional']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE03', 'name' => 'Asambleísta nacional']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE04', 'name' => 'Autoridad del poder judicial']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE05', 'name' => 'Autoridad del poder electoral']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE06', 'name' => 'Defensoría del pueblo']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE07', 'name' => 'Fiscal']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE08', 'name' => 'Juez/a']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE09', 'name' => 'Policía nacional']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE10', 'name' => 'Militar']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE11', 'name' => 'Asambleísta departamental']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE12', 'name' => 'Autoridad del poder ejecutivo municipal']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE13', 'name' => 'Concejal municipal']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE14', 'name' => 'Servidor público del poder ejecutivo, legislativo, judicial o electoral a nivel nacional']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE15', 'name' => 'Servidor público ejecutivo nacional']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE16', 'name' => 'Servidor público departamental']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE17', 'name' => 'Servidor público municipal']);
        $task->run(['catalog_code' => 'AGR', 'parent_code' => 'AGR01', 'code' => 'AE18', 'name' => 'Servidor público de entidad desconcentrada']);

        $task->run(['catalog_code' => 'VIC', 'code' => 'VIC01', 'name' => 'Periodista']);
        $task->run(['catalog_code' => 'VIC', 'code' => 'VIC02', 'name' => 'Trabajador/a en medios', 'description' => 'camarógrafo/a, fotógrafo/a, fotoperiodista, sonidista, etc.']);
        $task->run(['catalog_code' => 'VIC', 'code' => 'VIC03', 'name' => 'Medio de comunicación']);
        $task->run(['catalog_code' => 'VIC', 'code' => 'VIC04', 'name' => 'Agencia de noticias']);
        $task->run(['catalog_code' => 'VIC', 'code' => 'VIC05', 'name' => 'Medio, plataforma, blog o red periodística digital']);

        $task->run(['catalog_code' => 'GEN', 'code' => 'GEN01', 'name' => 'Hombre']);
        $task->run(['catalog_code' => 'GEN', 'code' => 'GEN02', 'name' => 'Mujer']);
        $task->run(['catalog_code' => 'GEN', 'code' => 'GEN03', 'name' => 'No binario']);
        $task->run(['catalog_code' => 'GEN', 'code' => 'GEN04', 'name' => 'Sin identificación']);

        $task->run(['catalog_code' => 'AGE', 'code' => 'AGE01', 'name' => 'Adulto (18 años o más)']);
        $task->run(['catalog_code' => 'AGE', 'code' => 'AGE02', 'name' => 'Adolescente (menor de 18 años)']);

        $task->run(['catalog_code' => 'CTX', 'code' => 'CTX01', 'name' => 'Conferencia de prensa']);
        $task->run(['catalog_code' => 'CTX', 'code' => 'CTX02', 'name' => 'Entrevista']);
        $task->run(['catalog_code' => 'CTX', 'code' => 'CTX03', 'name' => 'Investigación/Búsqueda de información']);
        $task->run(['catalog_code' => 'CTX', 'code' => 'CTX04', 'name' => 'Marcha callejera']);
        $task->run(['catalog_code' => 'CTX', 'code' => 'CTX05', 'name' => 'Bloqueo de calles']);
        $task->run(['catalog_code' => 'CTX', 'code' => 'CTX06', 'name' => 'Bloqueo carretero']);
        $task->run(['catalog_code' => 'CTX', 'code' => 'CTX07', 'name' => 'Toma de predios']);
        $task->run(['catalog_code' => 'CTX', 'code' => 'CTX08', 'name' => 'Vigilia']);
        $task->run(['catalog_code' => 'CTX', 'code' => 'CTX09', 'name' => 'Audiencia judicial']);
        $task->run(['catalog_code' => 'CTX', 'code' => 'CTX10', 'name' => 'Evento festivo público o en predio público']);
        $task->run(['catalog_code' => 'CTX', 'code' => 'CTX11', 'name' => 'Cobertura/investigación de minería ilegal']);
        $task->run(['catalog_code' => 'CTX', 'code' => 'CTX12', 'name' => 'Cobertura/investigación de narcotráfico']);
        $task->run(['catalog_code' => 'CTX', 'code' => 'CTX13', 'name' => 'Otro']);

        $task->run(['catalog_code' => 'STA', 'code' => 'STA01', 'name' => 'Agresión denunciada formalmente']);
        $task->run(['catalog_code' => 'STA', 'code' => 'STA02', 'name' => 'Agresión no denunciada formalmente']);

        $task->run(['catalog_code' => 'SST', 'code' => 'SST01', 'name' => 'Denuncia en proceso']);
        $task->run(['catalog_code' => 'SST', 'code' => 'SST02', 'name' => 'Denuncia con sentencia']);
        $task->run(['catalog_code' => 'SST', 'code' => 'SST03', 'name' => 'Denuncia cerrada']);

        $task->run(['catalog_code' => 'ARE', 'code' => 'ARE01', 'name' => 'Acción Judicial']);
        $task->run(['catalog_code' => 'ARE', 'code' => 'ARE02', 'name' => 'Acción administrativa']);
        $task->run(['catalog_code' => 'ARE', 'code' => 'ARE03', 'name' => 'Seguimiento e investigación']);
        $task->run(['catalog_code' => 'ARE', 'code' => 'ARE04', 'name' => 'Sentencia de responsabilidad por agresión / vulneración de derechos de periodistas']);
        $task->run(['catalog_code' => 'ARE', 'code' => 'ARE05', 'name' => 'Compromiso']);
        $task->run(['catalog_code' => 'ARE', 'code' => 'ARE06', 'name' => 'Declaración condenatoria']);
        $task->run(['catalog_code' => 'ARE', 'code' => 'ARE07', 'name' => 'Aclaración']);
        $task->run(['catalog_code' => 'ARE', 'code' => 'ARE08', 'name' => 'Proceso por Jurado de Imprenta']);
        $task->run(['catalog_code' => 'ARE', 'code' => 'ARE09', 'name' => 'Ninguna']);
        $task->run(['catalog_code' => 'ARE', 'code' => 'ARE10', 'name' => 'Sin dato/información']);

        $task->run(['catalog_code' => 'APE', 'code' => 'APE01', 'name' => 'Minimización del hecho']);
        $task->run(['catalog_code' => 'APE', 'code' => 'APE02', 'name' => 'Soslayamiento']);
        $task->run(['catalog_code' => 'APE', 'code' => 'APE03', 'name' => 'Retardación de justicia']);
        $task->run(['catalog_code' => 'APE', 'code' => 'APE04', 'name' => 'Olvido judicial']);
        $task->run(['catalog_code' => 'APE', 'code' => 'APE05', 'name' => 'Archivo judicial']);
        $task->run(['catalog_code' => 'APE', 'code' => 'APE06', 'name' => 'Sin dato/información']);

        $task->run(['catalog_code' => 'RGP', 'code' => 'RGP01', 'name' => 'Declaración condenatoria']);
        $task->run(['catalog_code' => 'RGP', 'code' => 'RGP02', 'name' => 'Inicio de proceso judicial']);
        $task->run(['catalog_code' => 'RGP', 'code' => 'RGP03', 'name' => 'Seguimiento e investigación']);
        $task->run(['catalog_code' => 'RGP', 'code' => 'RGP04', 'name' => 'Ninguna']);
        $task->run(['catalog_code' => 'RGP', 'code' => 'RGP05', 'name' => 'Sin dato/información']);

        $task->run(['catalog_code' => 'ROS', 'code' => 'ROS01', 'name' => 'Declaración condenatoria']);
        $task->run(['catalog_code' => 'ROS', 'code' => 'ROS02', 'name' => 'Inicio de proceso judicial']);
        $task->run(['catalog_code' => 'ROS', 'code' => 'ROS03', 'name' => 'Seguimiento e investigación']);
        $task->run(['catalog_code' => 'ROS', 'code' => 'ROS04', 'name' => 'Ninguna']);
        $task->run(['catalog_code' => 'ROS', 'code' => 'ROS05', 'name' => 'Sin dato/información']);

        $task->run(['catalog_code' => 'SOU', 'code' => 'SOU01', 'name' => 'Defensor del Pueblo']);
        $task->run(['catalog_code' => 'SOU', 'code' => 'SOU02', 'name' => 'Organización de la Sociedad Civil']);
        $task->run(['catalog_code' => 'SOU', 'code' => 'SOU03', 'name' => 'Gremio periodístico']);
        $task->run(['catalog_code' => 'SOU', 'code' => 'SOU04', 'name' => 'Publicación /nota de prensa']);
        $task->run(['catalog_code' => 'SOU', 'code' => 'SOU05', 'name' => 'Fuente policial']);
        $task->run(['catalog_code' => 'SOU', 'code' => 'SOU06', 'name' => 'Fuente Judicial (fiscalía, juzgado)']);
        $task->run(['catalog_code' => 'SOU', 'code' => 'SOU07', 'name' => 'Otras fuentes']);

    }
}
