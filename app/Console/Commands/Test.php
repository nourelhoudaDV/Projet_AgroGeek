<?php

namespace App\Console\Commands;


use App\Helpers\FileGenerator;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class Test extends Command
{
    protected $signature = 'editconsult:init {name}';

    protected $description = 'Make Trait Command';

    public Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    public function handle()
    {
        $namespace = 'App\\Traits';

        $full_path = base_path($namespace) . '\\' . $this->argument('name').'Trait.php';

        $message = FileGenerator::of($this->files,'test.stub',$this->argument('name'),$namespace,$full_path);

        $this->info($message);
    }
}
