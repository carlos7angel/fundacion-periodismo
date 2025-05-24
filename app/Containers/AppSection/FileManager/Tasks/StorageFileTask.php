<?php

namespace App\Containers\AppSection\FileManager\Tasks;

use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\Storage;
use Exception;

class StorageFileTask extends ParentTask
{
    public function __construct() {
    }

    /**
     * @throws NotFoundException
     * @throws CreateResourceFailedException
     */
    public function run($file, $path, $new_name): array
    {
        $type = 'local';

        try {
            switch ($type) {
                case 'local':
                    $upload = Storage::disk('local-uploads')->putFileAs($path, $file, $new_name);
                    $hash_file = hash_file(
                        'md5',
                        Storage::disk('local-uploads')->getConfig()['root'] . '/' . $upload
                    );
                    $url = url('/') . '/storage' . $path . '/' . $new_name;
                    break;
                default:
                    throw new NotFoundException('El tipo de almacenamiento no existe.');
                    break;
            }
        } catch (Exception $exception) {
            throw (new CreateResourceFailedException(
                'Ocurrió un problema al subir un archivo en el servidor.'
            ))->debug($exception);
        }

        if (!$upload) {
            throw new CreateResourceFailedException('No se puede subir el archivo.');
        }

        return array(
            $hash_file,
            $url,
            $upload,
            $type
        );
    }
}
