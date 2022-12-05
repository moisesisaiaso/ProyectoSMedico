<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\LugarA;

class lugarAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth'); // este middleware me permite mantener mis rutas protegidas es decir solo podràn acceder a las vistas los usuarios autenticados
    }

    public function index($id)
    {
        //? encuentro el paciente
        $paciente = Paciente::find($id);

        //? obtendo todos los lugaresA de este paciente
        $lugaresA = $paciente->lugaresA()->orderBy('id','desc')->paginate(5);
        
        return view('pacienteDetalle.lugarA.lista',[
            'lugaresA'=> $lugaresA,
            'paciente'=> $paciente
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //? CREATE ----- C
    public function create($id)
    {
        $paciente = Paciente::find($id);

        return view('pacienteDetalle.lugarA.create',[
            'paciente'=>$paciente
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //? validación del formulario

        //* instancio y creo el objeto del registro
        $lugarA = new LugarA;

        //? obtengo los datos y los asigno a las propiedades(que son los campos de la entidad LugarA) del objeto 
        $user =  \Auth::user();

        $lugarA->user_id = $user->id;
        $lugarA->paciente_id = $request->paciente_id;

        $lugarA->tipo_atencion = $request->tipo_atencion;
        $lugarA->lugar_atencion = $request->lugar_atencion;
        $lugarA->grupo_prioritario	= implode(' ; ', $request->grupo_prioritario); // el metodo implode permite convertir un array elementos a un string //^ el primer argumento es un separador de los elementos y el segundo es el array

        //*Guardo el objeto que contiene los datos 
        $lugarA->save();

        //? redireccion hacie la lista una vez creado un nuevo registro
        return redirect()->route('lugarAtencion.index',['lugarAtencion'=>$request->paciente_id])
        ->with('status','Lugar de atención creado exitosamente');
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //? MOSTRAR DETALLE DE LUGAR-A 
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lugarA = LugarA::find($id);
        $paciente_id = $lugarA->paciente_id;
        $paciente = Paciente::find($paciente_id);

        return view('pacienteDetalle.lugarA.create',[
            'lugarA'=>$lugarA,
            'paciente'=>$paciente
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //? validación del formulario

        //* obtengo el registro que se va a actualizar
        $lugarA = LugarA::find($id);

        
        //? reasigno los nuevos datos a los campos del objeto(registro)
        $lugarA->tipo_atencion = $request->tipo_atencion;
        $lugarA->lugar_atencion = $request->lugar_atencion;
        $lugarA->grupo_prioritario = implode(' ; ',$request->grupo_prioritario);

        //* guardos los datos en la base de datos
        $lugarA->save();

        //? redireccion hacie la lista
        return redirect()->route('lugarAtencion.index',['lugarAtencion'=>$lugarA->paciente_id])->with('status','Lugar de Atención editado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //? obtengo el registro a eliminar
        $lugarA = LugarA::find($id);

        //* Elimino el registro
        $lugarA->delete();

        //
        return redirect()->route('lugarAtencion.index',['lugarAtencion'=>$lugarA->paciente_id])->with('status','Registro eliminado correctamente');
    }
}
