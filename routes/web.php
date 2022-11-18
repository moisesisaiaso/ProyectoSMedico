<?php

use Illuminate\Support\Facades\Route;


use App\Models\Paciente; // hago uso de la clase del modelo que voy a utilizar atravez del nameSpace

Route::get('/', function () {
  //probando los modelos con ORM de Eloquent
  /* $pacientes = Paciente::all(); // con el all() accedemos a todos los registros
  foreach($pacientes as $paciente){
        echo $paciente->name."<br/>";
        echo $paciente->historiaClinica."<br/>";
        echo $paciente->grupoSanguineo."<br/>";
        echo $paciente->fechaNacimiento."<br/>";
        echo $paciente->user->name."<br/>"; // el metodo user del modelo es accedido como si fuera una propiedad 

        if(count($paciente->lugaresA) != 0){

            foreach($paciente->lugaresA as $lugarA){
                echo $lugarA->lugar_atencion." --- ";
                
            }
        }
        echo "<hr/>";
  }


    die(); */
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta Paciente
Route::get('/patient', [App\Http\Controllers\PatientController::class, 'index']);


//Ruta configuracion de cuenta
Route::get('/configuracion',[App\Http\Controllers\UserController::class, 'config'])->name('config.user');

Route::post('/user/update',[App\Http\Controllers\UserController::class, 'update'])->name('update.user');