<?php

namespace KamalSroor\CrudGenerator\Console\Commands\Generators;

use Illuminate\Support\Str;
use KamalSroor\CrudGenerator\Console\Commands\CrudGenerator;
use KamalSroor\CrudGenerator\Console\Commands\CrudMakeCommand;

class Seeder extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();

        $stub = __DIR__.'/../stubs/Seeder.stub';

        static::put(
            database_path('seeds'),
            $name.'Seeder.php',
            self::qualifyContent(
                $stub,
                $name
            )
        );
    }
}
