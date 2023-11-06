<?php

namespace App\Http\Livewire\Auth\Register;

use Livewire\Component;
use ZxcvbnPhp\Zxcvbn;

class RegisterPasswords extends Component
{
    // Utilizar el paquete composer require bjeavons/zxcvbn-php para validar la fortaleza de la contraseña
    public string $password = '';
    public string $password_confirmation = '';
    public int $strengthScore = 0;

    public array $strengthLevels = [
        1 => 'Weak',
        2 => 'Fair',
        3 => 'Good',
        4 => 'Strong',
    ];

    public function generatePassword(): void
    {
        $lowercase = range('a', 'z');
        $uppercase = range('A', 'Z');
        $digits = range(0,9);
        $special = ['!', '@', '#', '$', '%', '^', '*'];
        $chars = array_merge($lowercase, $uppercase, $digits, $special);
        $length = 12;
        do {
            $password = array();

            for ($i = 0; $i <= $length; $i++) {
                $int = rand(0, count($chars) - 1);
                $password[] = $chars[$int];
            }

        } while (empty(array_intersect($special, $password)));

        $this->setPasswords(implode('', $password));

    }

    public function updatedPassword($value)
    {

        $this->strengthScore = (new Zxcvbn())->passwordStrength($value)['score'];

        $this->emitUp('passwordChanged', $value);
    }

    public function updatedpasswordConfirmation($value)
    {

        $this->emitUp('passwordConfirmationChanged', $value);
    }

    private function setPasswords($value): void
    {
        $this->password = $value;
        $this->password_confirmation = $value;
        $this->updatedPassword($value);
        $this->updatedpasswordConfirmation($value);
    }

    public function render()
    {
        return view('livewire.auth.register.register-passwords');
    }
}
