<?php

namespace KamalSroor\CrudGenerator\Console\Commands\Generators;

use Illuminate\Support\Str;
use KamalSroor\CrudGenerator\Console\Commands\CrudGenerator;
use KamalSroor\CrudGenerator\Console\Commands\CrudMakeCommand;

class VirtualModel extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();

        static::put(
            app_path("Virtual/Models"),
            $name.'.php',
            self::qualifyContent(
                __DIR__.'/../stubs/Virtual/Models/Model.stub',
                $name
            )
        );


    }
}
