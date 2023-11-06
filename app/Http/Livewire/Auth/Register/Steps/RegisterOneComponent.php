<?php

namespace App\Http\Livewire\Auth\Register\Steps;

use Spatie\LivewireWizard\Components\StepComponent;
use App\Enums\TypeOfDocumentEnum;

class RegisterOneComponent extends StepComponent
{

    public string $first_name = '';
    public string $last_name = '';
    public string $type_of_document = 'none';
    public array $type_of_documents = [];
    public string $document_number = '';

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'type_of_document' => 'required|not_in:none',
        'document_number' => 'required|numeric|min:1|not_in:0',
    ];

    public function mount() {

        foreach (TypeOfDocumentEnum::cases() as $value) {
            $this->type_of_documents[$value->value] = $value->getTypeOfDocument();
        }
    }

    public function next() {

        $this->validate();
        $this->nextStep();

    }

    public function previous() {

        $this->previousStep();

    }

    public function render()
    {
        return view('livewire.auth.register.steps.one');
    }
}
