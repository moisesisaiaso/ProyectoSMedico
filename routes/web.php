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

//* RUTAS DE HOME
Route::get('/home/{buscar?}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/home/buscar', [App\Http\Controllers\HomeController::class, 'buscar'])->name('home.buscar');


//* RUTAS DE USUARIO

//Ruta configuracion de cuenta
Route::get('/configuracion',[App\Http\Controllers\UserController::class, 'config'])->name('config.user');

Route::post('/user/update',[App\Http\Controllers\UserController::class, 'update'])->name('update.user');

Route::get('/user/avatar/{filename}',[App\Http\Controllers\UserController::class, 'getImage'])->name('getImage.user'); 

//Ruta  configuración de password
Route::get('/password',[App\Http\Controllers\UserController::class, 'password'])->name('password.user');

Route::post('/password/update',[App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatePassword.user');

//Ruta de perfil de usuario
Route::get('/perfil',[App\Http\Controllers\UserController::class, 'perfil'])->name('perfil.user');



//* RUTA RESOURCE DE PACIENTE "Pagina HOME"
//Rutas añadidas de controller resource paciente
Route::post('/paciente/buscar',[App\Http\Controllers\PacienteController::class, 'buscar'])->name('paciente.buscar');

Route::get('/paciente/{paciente}/perfil',[App\Http\Controllers\PacienteController::class, 'perfil'])->name('paciente.perfil');

//controller resource
Route::resource('/paciente', App\Http\Controllers\PacienteController::class); // para ver mas detallado las rutas y name que tiene cada controlador con esta ruta resource, podemos listar en la consola con el comando://* php artisan route:list 

// !  Ojo al enviar un dato del parametro de la ruta desde un enlace(a) ejemplo: <a href="{{route('paciente.show',['paciente'=>$paciente->id])}}" en el array asociativo su nombre debe ser igual al nombre del parametro que se establece en la ruta, sino ocurre un error*/


//* Ruta paciente-LugarAtecion
Route::get('/lugarAtencion/{lugarAtencion}/crear',[App\Http\Controllers\lugarAController::class, 'create'])->name('lugarAtencion.create'); // esta es una ruta adicional al controlador resource(lugarAController) //? las nuevas rutas se ponen antes para evitar problemas con las rutas por defecto

Route::get('/lugarAtencion/{lugarAtencion}/listar',[App\Http\Controllers\lugarAController::class, 'index'])->name('lugarAtencion.index');

Route::resource('/lugarAtencion',App\Http\Controllers\lugarAController::class)->except(['create','index']); // except es un metodo que se le aplicac a la ruta resource para omitir metodos del controlador, //^ en este caso yo utilizo este metodo para poder crear un metodo adaptado a lo que requiero, que es permitir que el metodo create del controlador reciba un parametro para poder enviar el id del paciente


//* Ruta paciente-MotivoConsulta
Route::get('/motivoConsulta/{motivoConsulta}/crear',[App\Http\Controllers\MotivoCController::class, 'create'])->name('motivoConsulta.create');

Route::get('/motivoConsulta/{motivoConsulta}/listar',[App\Http\Controllers\MotivoCController::class, 'index'])->name('motivoConsulta.index');

Route::resource('/motivoConsulta',App\Http\Controllers\MotivoCController::class, [
    'parameters'=> ['motivoConsulta'=>'motivoConsulta']
    ])->except(['create','index']); // esta forma de añadir un array multidimencional es una manera de cambiar el nombre a los parametros que vienen por defector en las rutas, en este caso existió un error especial ya que debería tener el mismo nombre del path cada parametro pero lo que se generaba era un nombre erroneo (mal escrito), con este array pude renombrar los nombres de los parametros en las rutas 



//* Ruta paciente-SignosVitales
//rutas añadidas
Route::get('/signosVitales/{signosVitales}/create',[App\Http\Controllers\SignosVController::class, 'create'])->name('signosVitales.create');

Route::get('/signosVitales/{signosVitales}/listar',[App\Http\Controllers\SignosVController::class, 'index'])->name('signosVitales.index');

//ruta principal resource
Route::resource('/signosVitales',App\Http\Controllers\SignosVController::class,  [
    'parameters'=> ['signosVitales'=>'signosVitales']
    ])->except(['create','index']);



//todo:  La forma en que cada link del menú de navegación haga referencia al paciente es que cada vista del menú (create, listar , detalle) envía por sus acciones siempre el paciente id, de esta forma no importa en que apartado del menú estemos siempre pobremos acceder al $paciente. 
//? siempre estamos enviando en las acciones del controlador el paciente, recuperandolo y volviendolo a enviar a las vistas que accedemos(esto es requerido tambien por que cada registro debe contener el id del paciente para hacer referencia al paciente que pertenece dicho registro)