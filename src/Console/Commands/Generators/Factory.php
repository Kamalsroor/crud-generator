<?php

namespace KamalSroor\CrudGenerator\Console\Commands\Generators;

use Illuminate\Support\Str;
use KamalSroor\CrudGenerator\Console\Commands\CrudGenerator;
use KamalSroor\CrudGenerator\Console\Commands\CrudMakeCommand;

class Factory extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();

        $stub = __DIR__.'/../stubs/Factory.stub';

        static::put(
            database_path('factories'),
            $name.'Factory.php',
            self::qualifyContent(
                $stub,
                $name
            )
        );
    }
}
