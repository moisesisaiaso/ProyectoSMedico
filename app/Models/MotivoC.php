<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivoC extends Model
{
    use HasFactory;

    protected $table = 'motivosc';
    // Relacion Many to One / de muchos a uno
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // Relacion Many to One / de muchos a uno
    public function paciente(){
        return $this->belongsTo('App\Models\Paciente', 'paciente_id');
    }
}

