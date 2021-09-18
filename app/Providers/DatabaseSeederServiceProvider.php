<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeederServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadAllFactories();

        $this->loadAllMigrations();
    }

    public function loadAllMigrations()
    {
        $mainPath = database_path('migrations');
        $directories = glob($mainPath . '/*', GLOB_ONLYDIR);
        $paths = array_merge([$mainPath], $directories);

        $this->loadMigrationsFrom($paths);
    }

    public function loadAllFactories()
    {
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            // We can also customise where our factories live too if we want:
            $namespace =  $modelName === 'App\Models\User' ? 'Database\\Factories\\' : 'Database\\Factories\\Movies\\';

            // Here we are getting the model name from the class namespace
            $modelName = Str::afterLast($modelName, '\\');

            // Finally we'll build up the full class path where
            // Laravel will find our model factory
            return $namespace . $modelName . 'Factory';
        });
    }
}
