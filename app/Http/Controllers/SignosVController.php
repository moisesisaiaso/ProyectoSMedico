<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\SignoV;

class SignosVController extends Controller
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
        $signosV = $paciente->signosV()->orderBy('id','desc')->paginate(5);
        
        return view('pacienteDetalle.signosV.lista',[
            'signosV'=> $signosV,
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

        return view('pacienteDetalle.signosV.create',[
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
        $signoV = new SignoV;

        //? obtengo los datos y los asigno a las propiedades(que son los campos de la entidad SignoV) del objeto 
        $user =  \Auth::user();

        $signoV->user_id = $user->id;
        $signoV->paciente_id = $request->paciente_id;

        $signoV->presionArS = $request->presionArS;
        $signoV->presionArD = $request->presionArD;
        $signoV->presionArM	= $request->presionArM; 
        $signoV->temperatura= $request->temperatura; 
        $signoV->frecuenciaRes= $request->frecuenciaRes; 
        $signoV->frecuenciaCar= $request->frecuenciaCar; 
        $signoV->saturacionOxi= $request->saturacionOxi; 
        $signoV->peso= $request->peso; 
        $signoV->talla= $request->talla; 
        $signoV->iMC= $request->iMC; 
        $signoV->perimetroAbdominal= $request->perimetroAbdominal; 
        $signoV->glucosaCapilar= $request->glucosaCapilar; 
        $signoV->vHemoglobina= $request->vHemoglobina; 
        $signoV->vHemoglobinaC= $request->vHemoglobinaC; 


        //*Guardo el objeto que contiene los datos 
        $signoV->save();


        //todo: actualizando los datos de peso y talla del paciente cuando creo un registro "signosV"
        //?obtengo el paciente y actualizo los campos peso y talla
        $paciente = Paciente::find($request->paciente_id);
        $paciente->peso = $request->peso;
        $paciente->talla = $request->talla;

        $paciente->save();

        //? redireccion hacie la lista una vez creado un nuevo registro
        return redirect()->route('signosVitales.index',['signosVitales'=>$request->paciente_id])
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
        $signoV = SignoV::find($id);
        $paciente_id = $signoV->paciente_id;
        $paciente = Paciente::find($paciente_id);

        return view('pacienteDetalle.signosV.detalle',[
            'signoV'=> $signoV,
            'paciente'=> $paciente
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $signoV = SignoV::find($id);
        $paciente_id = $signoV->paciente_id;
        $paciente = Paciente::find($paciente_id);

        return view('pacienteDetalle.signosV.create',[
            'signoV'=> $signoV,
            'paciente'=> $paciente
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
         $signoV = SignoV::find($id);

        //? reasigno los nuevos datos a los campos del objeto (el registro)

        $signoV->presionArS = $request->presionArS;
        $signoV->presionArD = $request->presionArD;
        $signoV->presionArM	= $request->presionArM; 
        $signoV->temperatura= $request->temperatura; 
        $signoV->frecuenciaRes= $request->frecuenciaRes; 
        $signoV->frecuenciaCar= $request->frecuenciaCar; 
        $signoV->saturacionOxi= $request->saturacionOxi; 
        $signoV->peso= $request->peso; 
        $signoV->talla= $request->talla; 
        $signoV->iMC= $request->iMC; 
        $signoV->perimetroAbdominal= $request->perimetroAbdominal; 
        $signoV->glucosaCapilar= $request->glucosaCapilar; 
        $signoV->vHemoglobina= $request->vHemoglobina; 
        $signoV->vHemoglobinaC= $request->vHemoglobinaC; 


        //*Guardo el objeto que contiene los datos 
        $signoV->save();


        //todo: actualizando los datos de peso y talla del paciente cuando actualizo un registro "signosV"
        //?obtengo el paciente y actualizo los campos peso y talla
        $paciente = Paciente::find($request->paciente_id);
        $paciente->peso = $request->peso;
        $paciente->talla = $request->talla;

        $paciente->save();

        //? redireccion hacie la lista una vez creado un nuevo registro
        return redirect()->route('signosVitales.index',['signosVitales'=>$request->paciente_id])
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
        $signoV = SignoV::find($id);

        //* Elimino el registro
        $signoV->delete();

        
        return redirect()->route('signosVitales.index',['signosVitales'=>$signoV->paciente_id])->with('status','Registro eliminado correctamente');
    }
}
