<?php

namespace KamalSroor\CrudGenerator\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use KamalSroor\CrudGenerator\Console\Commands\Generators\Lang;
use KamalSroor\CrudGenerator\Console\Commands\Generators\Test;
use KamalSroor\CrudGenerator\Console\Commands\Generators\View;
use KamalSroor\CrudGenerator\Console\Commands\Generators\Model;
use KamalSroor\CrudGenerator\Console\Commands\Generators\Filter;
use KamalSroor\CrudGenerator\Console\Commands\Generators\Policy;
use KamalSroor\CrudGenerator\Console\Commands\Generators\Seeder;
use KamalSroor\CrudGenerator\Console\Commands\Generators\Factory;
use KamalSroor\CrudGenerator\Console\Commands\Generators\Request;
use KamalSroor\CrudGenerator\Console\Commands\Generators\Resource;
use KamalSroor\CrudGenerator\Console\Commands\Generators\Migration;
use KamalSroor\CrudGenerator\Console\Commands\Generators\Breadcrumb;
use KamalSroor\CrudGenerator\Console\Commands\Generators\Controller;
use KamalSroor\CrudGenerator\Console\Commands\Generators\VirtualResource;
use KamalSroor\CrudGenerator\Console\Commands\Generators\VirtualModel;
use KamalSroor\CrudGenerator\Console\Commands\Generators\Import;

class CrudMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud
                            {name : Class (Singular), e.g User, Place, Car}
                            {--translatable}
                            {--has-media}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create all Crud operations with a single command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Lang::generate($this);
        Breadcrumb::generate($this);
        View::generate($this);
        Resource::generate($this);
        Migration::generate($this);
        Factory::generate($this);
        Seeder::generate($this);
        Policy::generate($this);
        Controller::generate($this);
        Model::generate($this);
        Request::generate($this);
        Filter::generate($this);
        Test::generate($this);
        VirtualResource::generate($this);
        VirtualModel::generate($this);
        Import::generate($this);

        $name = $this->argument('name');

        app(Modifier::class)->routes($name);

        app(Modifier::class)->sidebar($name);

        app(Modifier::class)->seeder($name);

        app(Modifier::class)->permission($name);

        app(Modifier::class)->softDeletes($name);

        $seederName = Str::of($name)->singular()->studly().'Seeder';

        $this->info('Api Crud for '.$name.' created successfully 🎉');
        $this->warn('Please run "composer dump-autoload && php artisan migrate && php artisan db:seed --class='.$seederName.' && php artisan l5-swagger:generate"');
    }
}
