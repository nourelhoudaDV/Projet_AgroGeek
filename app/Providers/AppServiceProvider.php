<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Update defaultStringLength
        Builder::defaultStringLength(191);

        Model::unguard();

        // Init layout file
        app(\App\Core\Bootstrap\BootstrapDefault::class)->init();

        $this->bindComponents();

        VarDumper::setHandler(function ($var) {
            $cloner = new VarCloner();
            $cloner->setMaxItems(-1); // Specifying -1 removes the limit
            $dumper = 'cli' === PHP_SAPI ? new CliDumper() : new HtmlDumper();

            $dumper->dump($cloner->cloneVar($var));
        });

    }


    public function bindComponents()
    {
        Blade::directive('bind', function ($bind = null) {
            return '<?php \App\Helpers\FormDataBinder::bind(' . $bind . ') ?>';
        });
        Blade::directive('endBinding', function () {
            return '<?php \App\Helpers\FormDataBinder::end() ?>';
        });
    }
}
