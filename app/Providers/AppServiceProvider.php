<?php

namespace App\Providers;

use App\Http\Livewire\Auth\Register\Steps\RegisterZeroComponent;
use App\Http\Livewire\Auth\Register\RegisterWizardComponent;
use App\Http\Livewire\Auth\Register\Steps\RegisterOneComponent;
use App\Http\Livewire\Auth\Register\Steps\RegisterThirdComponent;
use App\Http\Livewire\Auth\Register\Steps\RegisterTwoComponent;
use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(! app()->isProduction());

        /* ============================================
        Register observers
        =============================================== */
        //User::observe(UserObserver::class);
        /* ============================================
        |  Register Livewire Components
        =============================================== */
        Livewire::component('register-wizard', RegisterWizardComponent::class);
        /* ===== ===== STEPS ===== ===== */
        Livewire::component('step-zero', RegisterZeroComponent::class);
        Livewire::component('step-one', RegisterOneComponent::class);
        Livewire::component('step-two', RegisterTwoComponent::class);
        Livewire::component('step-third', RegisterThirdComponent::class);

    }
}
