<?php

namespace Sashalenz\HasManyCount;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    #[\Override]
    public function boot(): void
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('has-many-count', __DIR__.'/../dist/js/field.js');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    #[\Override]
    public function register(): void
    {
        //
    }
}
