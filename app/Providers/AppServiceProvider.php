<?php

namespace App\Providers;

use App\Models\LigneCommande;
use Illuminate\Support\ServiceProvider;
use App\Observers\LigneCommandeObserver;

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
        LigneCommande::observe(LigneCommandeObserver::class);
    }
}
