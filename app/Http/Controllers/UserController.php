<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // este middleware me permite mantener mis rutas protegidas es decir solo podràn acceder a las vistas los usuarios autenticados
    }


    /* Actualización datos de userName, correo y imagen de perfil */
    public function config(){
        $titulo = 'configuracion';
        return view('user.config',[
            'titulo'=>$titulo, 
        ]);
    }

    public function update(Request $request){
        
        // conseguir el objeto de usuario autentificado
        $user = \Auth::user();
        $id = $user->id;
        
        //validación del formulario
        $validate = $this->validate($request, [  /* Me permite poner reglas de validación para los datos que se envien*/
            'name' => ['required', 'string', 'max:255,','unique:users,name,'.$id], //unique:users,name,'.$id esto condiciona que los datos en el campo de name debe ser unico a excepción de si coinciden con el mismo valor ya almacenado, es decir no debe repetirce con ningún otro registro mas que consigo mismo
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id]
            //para  crear nuevos datos de un usuario nuevo esto sería diferente solo se necesitaría de unique:users para hacer que los campos no permitan valore ya existentes o repetidos en otros registros
        ]);


        //Recoger los datos del formulario
        $name = $request->input('name');
        $email = $request->input('email');


        //asignar nuevos valores al objeto del usuario
        $user->name = $name;
        $user->email = $email;
        
        //Subir la imagen
        $image_path = $request->file('image_path');  //esto recoge el dato del campo file es igual que con los otros campos 
        if($image_path){
               //poner nombre unico
               $image_path_name= time().$image_path->getClientOriginalName(); //* con esto le damos un nombre unico a la imagen que guardamos, que es el nombre del archivo

               //guardar en la carpeta storage (storage/app/users)
               Storage::disk('users')->put($image_path_name, File::get($image_path)); //* se hace referencia al disco virtual que se va a utilizar que a la vez hace referencia a la carpeta user del storage/app 
               //? encadenando el ->put(nombreDelArchivo, File::get(archivo)) obtiene el nombre del archivo con el que se va a almacenar y luego el archivo, put almacena en la carpeta del disco virtual; 

               //Seteo el nombre de la imagen en el objeto
               //? es decir permite darle un valor de nombre como el registro del campo image, ya que realmete no se está guardando el archivo en la base de datos sino una referencia por su nombre para luego poder ser obtenido o consultado en el storage 
               $user->image = $image_path_name;
        }
        
        //ejecutar consulta y cambios en la base de datos 
        $user->update();

        return redirect()->route('config.user')
                        ->with(['message'=>'Usuario actualizado correctamente']);
    }

    // Con este metodo recuperamos la imagen del Storage y mostramos en el formulario al cargarla o espcaio donde se ,llame a la ruta de este metodo desde una etiqueta img
    public function getImage($filename){
        $file = Storage::disk('users')->get($filename); // obtiene el archivo de imagen por su nombre (Nos damos utilidad de campo image para mandar el nombre del archivo por parametro de la ruta)
        return new Response($file, 200);
    }
    
    // Actualización de Password
    public function password(){
        $titulo = "Password";
        return view('user.passwordUpdate',[
            'titulo'=>$titulo
        ]);
    }
    

    public function updatePassword(Request $request){
        // conseguir el objeto de usuario autentificado
        $user = \Auth::user();
        $id = $user->id;

        //validación del formulario
        $validate = $this->validate($request,[
             'password'=> ['required', 'string', 'min:8', 'confirmed', 'unique:users,password,'.$id]
        ]);

        //Recoger los datos del formulario
        $password = $request->input('password');

         //asignar nuevos valores al objeto del usuario
        $user->password = Hash::make($password);  // utilizamos esta clase Hash, con su estructura Hash::make('nuevoValor') ya que laravel en sus sistema de autenticación en el formulario de login obtiene el dato enviado por el input de tipo password y automaticamente cifra el valor de esta forma compara este valor cifrado con el campo password en la base de datos y si son iguales pues nos deja entrar.

        // !! el error que ocurría al momento de actualizar el password fue en el momento de enviar los datos sin cifrar, aunque se actualiza el campo password al momento de loguearnos no nos va a permitir enviar, ya que la contraseña no será la misma que esté almacenada en la base de datos, nuevamente por que en el login convierte el valor en su equivalente cifrado y pues en la base de datos no tenemos el valor cifrado sino puro.

        //? por esto la clase Hash nos permite enviar un valor cifrado de esta forma podemos actualizar el password y con esta clase convertir a su equivalente cifrado y este valo se almacenará en la base de datos.

        //ejecutar consulta y cambios en la base de datos 
        $user->update();

        return redirect()->route('password.user')
                         ->with(['message'=>'Contraseña actualizada correctamente']);
    

    }

    //Perfil de usuario
    public function perfil(){
        $user = \Auth::user();
        $titulo = "MI PERFIL";
        return view('user.perfil',[
            'user'=>$user,
            'titulo'=>$titulo
        ]);
    }
}
