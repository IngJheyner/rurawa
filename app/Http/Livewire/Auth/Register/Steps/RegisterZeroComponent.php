<?php

namespace App\Http\Livewire\Auth\Register\Steps;

use App\Enums\TypeOfPersonEnum;
use Spatie\LivewireWizard\Components\StepComponent;

class RegisterZeroComponent extends StepComponent
{
    public string $type_user = '';
    public string $type_person = 'none';
    public array $type_of_persons = [];

    public function mount() {

        foreach (TypeOfPersonEnum::cases() as $key => $value) {
            $this->type_of_persons[$value->value] = $value->getTypeOfPerson();
        }

    }

    // Validar que el campo type person no sea 0
    protected $rules = [
        'type_user' => 'required',
        'type_person' => 'required|not_in:none',
    ];

    public function next() {

        $this->validate();
        $this->nextStep();

    }

    public function render()
    {
        return view('livewire.auth.register.steps.zero');

    }
}
