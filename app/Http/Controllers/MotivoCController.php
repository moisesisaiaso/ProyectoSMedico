<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\MotivoC;

class MotivoCController extends Controller
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
        $motivosC = $paciente->motivosC()->orderBy('id','desc')->paginate(5);
        
        return view('pacienteDetalle.motivoC.lista',[
            'motivosC'=> $motivosC,
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

        return view('pacienteDetalle.motivoC.create',[
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
        $motivoC = new MotivoC;

        //? obtengo los datos y los asigno a las propiedades(que son los campos de la entidad MotivoC) del objeto 
        $user =  \Auth::user();

        $motivoC->user_id = $user->id;
        $motivoC->paciente_id = $request->paciente_id;

        $motivoC->planificacion_familiar = $request->planificacion_familiar;
        $motivoC->descripcion_motivo = $request->descripcion_motivo;
        $motivoC->descripcion_enfermedad	= $request->descripcion_enfermedad; 

        //*Guardo el objeto que contiene los datos 
        $motivoC->save();

        //? redireccion hacie la lista una vez creado un nuevo registro
        return redirect()->route('motivoConsulta.index',['motivoConsulta'=>$request->paciente_id])
        ->with('status','Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $motivoC = MotivoC::find($id);
        $paciente_id = $motivoC->paciente_id;
        $paciente = Paciente::find($paciente_id);

        return view('pacienteDetalle.motivoC.create',[
            'motivoC'=>$motivoC,
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
    public function update(Request $request, $id)
    {
        //? validación del formulario

        //* obtengo el registro que se va a actualizar
        $motivoC = MotivoC::find($id);

        
        //? reasigno los nuevos datos a los campos del objeto(registro)
        $motivoC->planificacion_familiar = $request->planificacion_familiar;
        $motivoC->descripcion_motivo = $request->descripcion_motivo;
        $motivoC->descripcion_enfermedad	= $request->descripcion_enfermedad; 

        //*Guardo el objeto que contiene los datos 
        $motivoC->save();


        //? redireccion hacie la lista una vez creado un nuevo registro
        return redirect()->route('motivoConsulta.index',['motivoConsulta'=>$request->paciente_id])
        ->with('status','Registro editado exitosamente');
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
        $motivoC = MotivoC::find($id);

        //* Elimino el registro
        $motivoC->delete();

        
        return redirect()->route('motivoConsulta.index',['motivoConsulta'=>$motivoC->paciente_id])->with('status','Registro eliminado correctamente');
    }
}
