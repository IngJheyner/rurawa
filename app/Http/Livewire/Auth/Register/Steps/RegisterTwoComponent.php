<?php

namespace App\Http\Livewire\Auth\Register\Steps;

use App\Models\User;
use Spatie\LivewireWizard\Components\StepComponent;
use Spatie\LivewireWizard\Support\State;
use Illuminate\Auth\Events\Registered;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Person;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\RegisterResponse;

class RegisterTwoComponent extends StepComponent
{
    use PasswordValidationRules;

    protected $dataStepZero;
    protected $dataStepOne;
    protected $dataStepThird;

    public string $email = '';
    public string $phone = '';
    public string $password = '';
    public string $password_confirmation = '';
    public bool $terms = false;


    protected $listeners = ['passwordChanged', 'passwordConfirmationChanged'];

    public function passwordChanged($value) {

        $this->password = $value;

    }

    public function passwordConfirmationChanged($value) {

        $this->password_confirmation = $value;

    }

    public function save() {

        $this->dataStepZero = $this->state()->get('step-zero');
        $this->dataStepOne = $this->state()->get('step-one');
        $this->dataStepThird = $this->state()->get('step-third');

        $name = strtoupper(substr($this->dataStepOne['first_name'], 0, 1));
        $surname = strtolower(substr($this->dataStepOne['last_name'], 0, 1));
        $document = substr($this->dataStepOne['document_number'], -6);

        $user = app(CreateNewUser::class)->create([
            'name' => $name . $surname . $document,
            'email' => $this->email,
            'phone' => $this->phone, // TODO: Validar que el número de teléfono no exista en la tabla persons
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'terms' => $this->terms,
        ]);

        $person = Person::create([
            'type_person' => $this->dataStepZero['type_person'],
            'first_name' => $this->dataStepOne['first_name'],
            'last_name' => $this->dataStepOne['last_name'],
            'type_of_document' => $this->dataStepOne['type_of_document'],
            'document_number' => $this->dataStepOne['document_number'],
            'company_name' => $this->dataStepThird['company_name'] ?? null,
            'organization_belongs' => $this->dataStepThird['organization_belongs'] ?? null,
            'date_of_birth' => $this->dataStepThird['date_of_birth'] ?? null,
            'address' => $this->dataStepThird['address'] ?? null,
            'phone' => $this->phone,
            'user_id' => $user->id,
            'city_id' => $this->dataStepThird['city_id'] ?? null,
        ]);

        // Asignar rol al usuario creado anteriormente
        $user->assignRole($this->dataStepZero['type_user']);

        auth()->login($user);
        auth()->user()->sendEmailVerificationNotification();

        // eliminar la session cities si existe
        if (session()->has('cities')) {
            session()->forget('cities');
        }
        return app(RegisterResponse::class);
    }

    public function previous() {

        // Si existe la session cities, debe devolver al step-third
        if (session()->has('cities')) {
            $this->showStep('step-third');
        } else {
            $this->previousStep();
        }


    }

    public function render()
    {
        return view('livewire.auth.register.steps.two');
    }
}
