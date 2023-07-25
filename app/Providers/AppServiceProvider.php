<?php

namespace App\Providers;

use App\Models\JobTeam;
use App\Models\Service;
use App\Models\ServicesHasclient;
use Illuminate\Support\ServiceProvider;

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
        view()->composer(['layouts.app','webSite.service','webSite.contact'], function($view){
            $services = Service::active()->get();

            $view->with(['servicesGlobal'=> $services]);
        });
        view()->composer(['webSite.about'], function($view){
            $jobTeams = JobTeam::active()->get();

            $view->with(['jobTeamsGlobal'=> $jobTeams]);
        });
        view()->composer(['layouts.dashboard'], function($view){
            $serviceHasClientGlobal = ServicesHasclient::active()->get();

            $view->with(['serviceHasClientGlobal'=> $serviceHasClientGlobal]);
        });
    }
}
