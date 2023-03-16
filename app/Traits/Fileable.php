<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use League\Flysystem\FilesystemException;

trait Fileable
{
    /***
     * @param $destination
     * @param $file
     * @param $url
     * @return string|null
     * @throws \League\Flysystem\FilesystemException
     */
    protected function saveFile($destination, $file = null, $url = null,): ?string
    {
        if (isset($file) && $file instanceof UploadedFile) {
            $disk = $this->getDisk();

            if (!$disk->has($destination))
                $disk->makeDirectory($destination);

            $image = Image::make($file);
            $image->resize(570, 326, function ($constraint) {
                $constraint->aspectRatio();
            });
            $fileName = md5($file->getClientOriginalName() . time());
            $path = $destination . '/' . $fileName . '.' . $file->extension();

            $image->save(storage_private_path($path));

            return $path;
        } elseif (isset($url)) {
            $image = Image::make($url);
            $image->resize(570, 326, function ($constraint) {
                $constraint->aspectRatio();
            });
            $pathInfo = pathinfo($url);
            $fileName = md5($pathInfo['filename'] . time());
            $path = 'app/' . $destination . '/' . $fileName . '.' . $pathInfo['extension'];
            $image->save(storage_path($path));
            return $destination . '/' . $fileName . '.' . $pathInfo['extension'];
        }
        return null;


    }

    /***
     * @param $disk
     * @param $path
     * @return void
     */
    protected function deleteFile($disk, $path): void
    {
        $disk = $this->getDisk($disk);
        if ($disk->exists($path))
            $disk->delete($path);
    }


    /***
     * @param $file
     * @param $destination
     * @param $model
     * @param $column
     * @return string|void|null
     * @throws FilesystemException
     */
    protected function saveAndDeleteOld($file, $destination, $model, $column)
    {


        if (isset($file)) {
            $this->deleteFile($this->getDisk(), $model[$column]);
            $model[$column] = $this->saveFile($destination, file:$file);
        }

    }


    /***
     * Get file system
     * @param $name
     * @return \Illuminate\Contracts\Filesystem\Filesystem
     */
    private function getDisk(): \Illuminate\Contracts\Filesystem\Filesystem
    {
        return Storage::disk(config('configs.disk_private'));
    }


}
