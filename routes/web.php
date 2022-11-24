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
   
    if(auth()->user()){
        return redirect()->route('home');
    }else{
        return view('auth.login');

    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// RUTAS DE USUARIO

//Ruta configuracion de cuenta
Route::get('/configuracion',[App\Http\Controllers\UserController::class, 'config'])->name('config.user');

Route::post('/user/update',[App\Http\Controllers\UserController::class, 'update'])->name('update.user');

Route::get('/user/avatar/{filename}',[App\Http\Controllers\UserController::class, 'getImage'])->name('getImage.user');

//Ruta configuración de password
Route::get('/password',[App\Http\Controllers\UserController::class, 'password'])->name('password.user');

Route::post('/password/update',[App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatePassword.user');

Route::get('/patient', [App\Http\Controllers\PatientController::class, 'index']); // ojo esta ruta hay que reemplazarla por una de las rutas de paciente en este controlador resource y va a ser la de ver paciente, para de esta forma ingresar a la vista del paciente

//RUTA DE PACIENTE HOME
//Ruta Paciente

Route::resource('/paciente', App\Http\Controllers\PacienteController::class); // para ver mas detallado las rutas y name que tiene cada controlador con esta ruta resource, podemos listar en la consola con el comando://* php artisan route:list 
//? esto podría servir para mostrar las rutas de mejor forma: https://javiergutierrez.trade/mostrar-una-lista-de-rutas-por-consola-en-laravel-de-forma-bonita/