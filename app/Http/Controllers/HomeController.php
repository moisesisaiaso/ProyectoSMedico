<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($buscar = null){

        if(!empty($buscar)){ //Buscador
            $pacientes = Paciente::where('name','LIKE','%'.$buscar.'%')
                                   ->orwhere('historiaClinica','LIKE','%'.$buscar.'%')
                                   ->orderBy('id','desc')->paginate(5);
        }else{

            $pacientes = Paciente::orderBy('id','desc')->paginate(5); //permite obtener todos los pacientes ordenados de manera descendentes es decir del mas actual al antiguo
            // con el paginate secciono esa petición por paginas distintas
        }
       

        return view('home',[
            'pacientes'=>$pacientes,  
        ]);
    }

    //? obteniendo los datos de la busqueda
    public function buscar(Request $request){

        $busqueda = $request->buscar;

        
        return redirect()->route('home',[
            'buscar'=> $busqueda
        ]);
    }
}
