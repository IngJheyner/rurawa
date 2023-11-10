<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    /* ============================================
    TABLE
    =============================================== */
    protected $table = 'persons';

    /* ============================================
    Asignación masiva
    =============================================== */
    protected $fillable = [
        'type_person',
        'first_name',
        'last_name',
        'document_type',
        'document_number',
        'date_of_birth',
        'address',
        'company_name',
        'phone',
        'organization_belongs',
        'user_id',
        'city_id',
    ];

    /* ============================================
    MUTATORS
    =============================================== */
    // Guardar en minusculas el nombre y apellido de la persona
    public function setFirstNameAttribute($value) {
        $this->attributes['first_name'] = strtolower($value);
    }

    public function setLastNameAttribute($value) {
        $this->attributes['last_name'] = strtolower($value);
    }

    /* ============================================
    RELATIONSHIPS
    =============================================== */
    // users
    public function user() {
        return $this->belongsTo(User::class);
    }
}
