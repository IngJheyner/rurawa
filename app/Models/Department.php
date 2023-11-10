<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /* ============================================
    Asignación masiva
    =============================================== */
    protected $fillable = [
        'name',
        'code_divipola',
    ];

    /* ============================================
    MUTATORS
    =============================================== */
    public function setNameAttribute($value) {
        // Primero se convierte a minúsculas pero que tambien tome las tildes y ñ
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'UTF-8'));
    }

    /* ============================================
    ASSESSORS
    =============================================== */

    /* ============================================
    RELATIONSHIPS
    =============================================== */
    public function cities() {
        return $this->hasMany(City::class);
    }

}
