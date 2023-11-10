<?php

namespace App\Http\Livewire\Auth\Register;

// use App\Http\Livewire\Steps\CartStepComponent;
// use App\Http\Livewire\Steps\ConfirmStepComponent;
// use App\Http\Livewire\Steps\DeliveryAddressStepComponent;

use App\Http\Livewire\Auth\Register\Steps\RegisterOneComponent;
use App\Http\Livewire\Auth\Register\Steps\RegisterThirdComponent;
use App\Http\Livewire\Auth\Register\Steps\RegisterTwoComponent;
use App\Http\Livewire\Auth\Register\Steps\RegisterZeroComponent;
//use App\Support\OrderWizardState;
use Spatie\LivewireWizard\Components\WizardComponent;

class RegisterWizardComponent extends WizardComponent
{
    public function steps(): array
    {
        return [
            RegisterZeroComponent::class,
            RegisterOneComponent::class,
            RegisterTwoComponent::class,
            RegisterThirdComponent::class,
        ];
    }

    // public function stateClass(): string
    // {
    //     return OrderWizardState::class;
    // }
}
