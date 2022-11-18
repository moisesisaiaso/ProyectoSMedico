<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // este middleware me permite mantener mis rutas protegidas es decir solo podràn acceder a las vistas los usuarios autenticados
    }

    public function config(){
        $titulo = 'configuracion';
        return view('user.config',[
            'titulo'=>$titulo
        ]);
    }

    public function update(Request $request){

        // conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;
        
        //validación del formulario
        $validate = $this->validate($request, [  /* Me permite poner reglas de validación para los datos que se envien*/
            'name' => ['required', 'string', 'max:255,','unique:users,name,'.$id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id]
        ]);


        //Recoger los datos del formulario
        $name = $request->input('name');
        $email = $request->input('email');


        //asignar nuevos valores al objeto del usuario
        $user->name = $name;
        $user->email = $email;


        //ejecutar consulta y cambios en la base de datos 
        $user->update();

        return redirect()->route('config.user')
                        ->with(['message'=>'Usuario actualizado correctamente']);
    }
}
