<?php

namespace KamalSroor\CrudGenerator\Console\Commands\Generators;

use Illuminate\Support\Str;
use KamalSroor\CrudGenerator\Console\Commands\CrudGenerator;
use KamalSroor\CrudGenerator\Console\Commands\CrudMakeCommand;

class Import extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command)
    {
        $name = Str::of($command->argument('name'))->plural()->studly();

        static::put(
            app_path("Imports"),
            $name.'Import.php',
            self::qualifyContent(
                __DIR__.'/../stubs/Imports/Import.stub',
                $name
            )
        );


    }
}
