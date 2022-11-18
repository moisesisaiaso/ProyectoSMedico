<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';
    //Esta relación me va a permitir sacar todos los lugaresA cuyo paciente_id es igual a un numero, se sacan estos datos llamando al metodo una ves creado el objeto pacientes en este caso
    //Relacion One to Many / de uno a muchos
    public function lugaresA(){  // para sacar todos los usuarios asignados a un paciente
        return $this->hasMany('App\Models\LugarA');// como parametro indico con que objeto quiero que se relacione o trabaje

    }

    //Relación One to Many / de uno a muchos.
    // el analisis en este tipo de relacion sería: un paciente puede tener muchos signos vitales (de 1 a muchos) y un signo vital puede pertenecer a un solo paciente (de uno a 1)
    // de estas preposiciones (de 1 a muchos) y (de 1 a 1) se compara y se toma el de mayor valor en cada preposición: 
    // comparo: (de 1 ) = (de 1 ) son iguales entonces se mantienen; (a muchos)>(a 1) entonces tomamos el mayor y unimos: (de 1 a muchos) 
    public function signosV(){
        return $this->hasMany('App\Models\SignoV');
    }


    //Relación One to Many / de uno a muchos.
    public function diagnosticos(){
        return $this->hasMany('App\Models\Diagnostico');
    }

    //Relación One to Many / de uno a muchos.
    public function motivosC(){
        return $this->hasMany('App\Models\MotivoC');
    }

    //Relación One to Many / de uno a muchos.
    public function tratamientos(){
        return $this->hasMany('App\Models\Tratamiento');
    }


    //Relación One to Many / de uno a muchos.
    public function antecendentes(){
        return $this->hasMany('App\Models\Antecedente'); //en otras palabras el metodo hasMany se va a encargar de buscar todos los antecedentes cuyo Paciente sea el que estamos sacando
    }

    //Relación One to Many / de uno a muchos.
    public function examenesF(){
        return $this->hasMany('App\Models\ExamenF');
    }


    //Relación Many to One / de muchos a uno
    //En este caso tenemos esta relación con la entidad de User y su preposición sería:
    /*Un paciente puede ser creado por un mismo usuario(de 1 a 1) y un usuario puede tener muchos pacientes(de 1 a muchos ), tomamos el mayor y ordenamos, ciendo este el modelo de pacientes hacemos referencia primero al paciente y luego al usuario, entonces:  */ 
    //(muchos a 1) Muchos pacientes puden ser creados por un mismo usuario
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id'); //belongsTo = pertence a, es decir permite relacionar la dependencia que tiene con el modelo User ya que contiene un parametro fk de user_id que es el campo con el que se relacionan
    }


}
