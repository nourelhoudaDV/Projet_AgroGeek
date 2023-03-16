<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

class StorageController extends Controller
{


    protected function public(Request $request, $path ='')
    {
        $disk = \Storage::disk('public');
        return $this->getFile($disk, $request, $path);
    }


    protected function private(Request $request, $path ='')
    {
        $disk = \Storage::disk(config('configs.disk_private'));
        return $this->getFile($disk, $request, $path, true);

    }

    /***
     * @param Filesystem $filesystem
     * @param $request
     * @param $path
     * @return mixed|string
     */
    private function getFile(Filesystem $filesystem, $request, $path)
    {
        if (empty($path) || !$filesystem->exists($path)) {
            return $this->getDefaut($request);
        }

        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory($request),
            'source' => $filesystem->getDriver(),
            'cache' => $filesystem->getDriver(),
            'cache_path_prefix' => '.glide-cache',
        ]);
        return $server->getImageResponse($path, $request->all());


    }

    private function getDefaut(Request $request)
    {
        $filesystem = \Storage::disk('public');
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory($request),
            'source' => $filesystem->getDriver(),
            'cache' => $filesystem->getDriver(),
            'cache_path_prefix' => '.glide-cache',
        ]);
        return $server->getImageResponse('default/image-placeholder.png', $request->all());
    }


}
