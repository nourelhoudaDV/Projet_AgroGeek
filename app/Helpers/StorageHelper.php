<?php

namespace App\Helpers;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

/**
 * Storage  Helper
 * @author MRX
 * @namespace App\Helpers
 */
class StorageHelper
{
    public function __invoke(Filesystem $filesystem, Request $request, $path)
    {

        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory($request),
            'source' => $filesystem->getDriver(),
            'cache' => $filesystem->getDriver(),
            'cache_path_prefix' => '.glide-cache',
        ]);


        if (!$filesystem->exists($path)) {
            return redirect('error');
        }
        return $server->getImageResponse($path, $request->all());
    }
}
