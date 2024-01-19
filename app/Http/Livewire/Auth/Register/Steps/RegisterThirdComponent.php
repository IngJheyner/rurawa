<?php

namespace App\Http\Livewire\Auth\Register\Steps;

use App\Enums\OrganizationBelongsEnum;
use App\Models\City;
use App\Models\Department;
use Spatie\LivewireWizard\Components\StepComponent;

class RegisterThirdComponent extends StepComponent
{
    public $cities = [];
    public int $department_id = 0, $city_id = 0;
    public string $address = '', $company_name = '', $organization_belongs = 'none';

    protected $rules = [
        'department_id' => 'required|not_in:0',
        'city_id' => 'required|not_in:0',
        'address' => 'required|unique:persons,address',
        'company_name' => 'required',
        'organization_belongs' => 'required|not_in:none',
    ];

    public function mount() {

        $this->cities = session('cities', []);
    }

    /* ============================================
    COMPUTED PROPERTIES
    =============================================== */
    public function getDepartmentsProperty() {
        return Department::all();
    }

    public function getOrganizationBelongsProperty() {

        $organizationBelongs = [];

        foreach (OrganizationBelongsEnum::cases() as $value) {
            $organizationBelongs[$value->value] = $value->getOrganizationBelongs();
        }

        return $organizationBelongs;

    }

    /* ============================================
    METHODS
    =============================================== */
    public function updatedDepartmentId($value) {
        $this->cities = Department::find($value)->cities;
        session(['cities' => $this->cities]);
        $this->reset('city_id');
    }

    public function previous() {

        $this->showStep('step-one');

    }

    public function next() {

        $this->validate();
        $this->showStep('step-two');

    }

    public function render()
    {
        return view('livewire.auth.register.steps.third');

    }
}
