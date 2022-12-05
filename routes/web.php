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

//Ruta  configuración de password
Route::get('/password',[App\Http\Controllers\UserController::class, 'password'])->name('password.user');

Route::post('/password/update',[App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatePassword.user');

//Ruta de perfil de usuario
Route::get('/perfil',[App\Http\Controllers\UserController::class, 'perfil'])->name('perfil.user');

//RUTA RESOURCE DE PACIENTE HOME
//Ruta Paciente

Route::resource('/paciente', App\Http\Controllers\PacienteController::class); // para ver mas detallado las rutas y name que tiene cada controlador con esta ruta resource, podemos listar en la consola con el comando://* php artisan route:list 

// !  Ojo al enviar un dato del parametro de la ruta desde un enlace(a) ejemplo: <a href="{{route('paciente.show',['paciente'=>$paciente->id])}}" en el array asociativo su nombre debe ser igual al nombre del parametro que se establece en la ruta, sino ocurre un error*/


//Ruta paciente-LugarAtecion
Route::get('/lugarAtencion/{lugarAtencion}/crear',[App\Http\Controllers\lugarAController::class, 'create'])->name('lugarAtencion.create'); // esta es una ruta adicional al controlador resource(lugarAController) //? las nuevas rutas se ponen antes para evitar problemas con las rutas por defecto

Route::get('/lugarAtencion/{lugarAtencion}/listar',[App\Http\Controllers\lugarAController::class, 'index'])->name('lugarAtencion.index');

Route::resource('/lugarAtencion',App\Http\Controllers\lugarAController::class)->except(['create','index']); // except es un metodo que se le aplicac a la ruta resource para omitir metodos del controlador, //^ en este caso yo utilizo este metodo para poder crear un metodo adaptado a lo que requiero, que es permitir que el metodo create del controlador reciba un parametro para poder enviar el id del paciente