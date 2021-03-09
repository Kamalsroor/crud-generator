<?php

namespace KamalSroor\CrudGenerator\Console\Commands\Generators;

use Illuminate\Support\Str;
use KamalSroor\CrudGenerator\Console\Commands\CrudGenerator;
use KamalSroor\CrudGenerator\Console\Commands\CrudMakeCommand;

class Policy extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();

        $stub = __DIR__.'/../stubs/Policy/Policy.stub';

        static::put(
            app_path("Policies"),
            $name.'Policy.php',
            self::qualifyContent(
                $stub,
                $name
            )
        );
    }
}
