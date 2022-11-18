<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $table = 'tratamientos';
    // Relacion Many to One / de muchos a uno
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // Relacion Many to One / de muchos a uno
    public function paciente(){
        return $this->belongsTo('App\Models\Paciente', 'paciente_id');
    }
}
