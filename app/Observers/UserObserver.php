<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function created(User $user) {

        $person = $user->person;

        $name = strtoupper(substr($person->first_name, 0, 1));
        $surname = substr($person->last_name, 0, 1);
        $document = substr($person->document_number, -4);

        $user->name = $name . $surname . $document;
        $user->save();
    }
}
