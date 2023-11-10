<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /* ============================================
    Asignación masiva
    =============================================== */
    protected $fillable = [
        'name',
        'code_divipola',
        'department_id',
    ];

    /* ============================================
    MUTATORS
    =============================================== */
    public function setNameAttribute($value) {
        // Primero se convierte a minúsculas pero que tambien tome las tildes y ñ
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'UTF-8'));

    }

    /* ============================================
    RELATIONSHIPS
    =============================================== */
    public function department() {
        return $this->belongsTo(Department::class);
    }
}
