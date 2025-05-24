<?php

namespace App\Containers\AppSection\FileManager\Tasks;

use App\Containers\AppSection\FileManager\Data\Repositories\FileRepository;
use App\Containers\AppSection\FileManager\Models\File;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CreateFileTask extends ParentTask
{
    public function __construct(
        private GetPathByTypeTask $getPathByTypeTask,
        private StoreFileTask $storeFileTask,
        private StorageFileTask $storageFileTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run($file, $type, $id, $user): File|null
    {
        if (! $file) {
            return null;
        }

        [$path, $fileable_type, $fileable_id] = $this->getPathByTypeTask->run($type, $id, $user);
        $sanitize_name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $unique_code = md5(Carbon::now()->timestamp . $sanitize_name .  $file->getSize() . $file->getMimeType() . Str::random(24));
        $new_name = substr($unique_code, 0, 8) . '__' . $sanitize_name . '.' . $file->getClientOriginalExtension();
        [$hash_file, $url_file, $path_file, $locale_upload] = $this->storageFileTask->run($file, $path, $new_name);

        $data = [
            'unique_code'       => $unique_code,
            'file_hash'         => $hash_file,
            'name'              => $new_name,
            'origin_name'       => $file->getClientOriginalName(),
            'mime_type'         => $file->getMimeType(),
            'size'              => $file->getSize(),
            'url_file'          => $url_file,
            'path_file'         => $path_file,
            'locale_upload'     => $locale_upload,
            'status'            => 'created',
            'fid_user'          => $user->id,
            'fileable_id'       => $fileable_id,
            'fileable_type'     => $fileable_type,
        ];

        return $this->storeFileTask->run($data);
    }
}
