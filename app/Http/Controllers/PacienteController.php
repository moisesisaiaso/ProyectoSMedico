<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
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

    //este metodo en una ruta resource su path index no se toma en cuenta sino que es el mismo de raiz osea /paciente
    public function index(){

       
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //? CREATE ----- C
    public function create()
    {
        return view('paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //? validando formulario
        $rules = [
            'historiaClinica' => ['required','string', 'max:10,','min:10,','unique:pacientes,historiaClinica'], //!! ojo los espacios pueden provocar errores ejemplo: 'unique:pacientes,historiaClinica' no es lo mismo que:
            // 'unique:pacientes, historiaClinica' aquí se le añadió un espacio a la ulta palabra y esto causa un errror
        ];

        $messages = [
            'historiaClinica.unique'=>'El número de historia clínica ya existe.',
            'historiaClinica.max'=>'El número de historia clínica debe tener 10 digitos.',
            'historiaClinica.min'=> 'El número de historia clínica debe tener 10 digitos.'
        ];

        $this->validate($request, $rules,$messages );

        //^ Esta es una manera de crear 
        //*instanciamos el objeto para crear un nuevo paciente
        $paciente = new Paciente;
        
        //*Asignamos los valores que nos llegan de los input a las propiedades del objeto
        $paciente->name = $request->name; //podemos hacer referencia directamente al valor del atributo name de los imput, en casos anteriores utilizabamos el metodo input('') ejemplo:
        $paciente->historiaClinica = $request->input('historiaClinica')	;
        $paciente->sexo = $request->sexo;
        $paciente->grupoSanguineo = $request->grupoSanguineo;
        $paciente->fechaNacimiento = $request->fechaNacimiento;
        $paciente->edad = $request->edad;
        $paciente->peso = $request->peso;
        $paciente->talla = $request->talla;
        $paciente->indiceMC = $request->indiceMC;
        $paciente->presionArterial = $request->presionArterial;

        //* guardamos los datos en la base de datos
        $paciente->save();

        
        return redirect()->route('home')->with('status','Paciente creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //? MOSTRAR DETALLE PACIENTE
    public function show($id)
    {
       $paciente = Paciente::find($id);
       
        $titulo = 'Paciente';
        return view('pacienteDetalle.index', array(
            'titulo'=> $titulo,
            'paciente'=> $paciente
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //? ACTUALIZAR PACIENTE ---- U
    public function edit($id)
    {
        //Cargar datos en el los input del formulario
        $paciente = Paciente::find($id);

        return view('paciente.create',[
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
        //? validando formulario
        $rules = [
            'historiaClinica' => ['required','string', 'max:10,','min:10,','unique:pacientes,historiaClinica,'.$id], //!! ojo los espacios pueden provocar errores ejemplo: 'unique:pacientes,historiaClinica' no es lo mismo que:
            // 'unique:pacientes, historiaClinica' aquí se le añadió un espacio a la ulta palabra y esto causa un errror
        ];

        $messages = [
            'historiaClinica.unique'=>'El número de historia clínica ya existe.',
            'historiaClinica.max'=>'El número de historia clínica debe tener 10 digitos.',
            'historiaClinica.min'=> 'El número de historia clínica debe tener 10 digitos.'
        ];

        $this->validate($request, $rules,$messages );

        //Obtenemos el paciente que se va a actualizar
        $paciente = Paciente::find($id);
        //Obtenemos los valores que vienen por request desde el formulario y los asignamos a los campos del usuario a actualizar, esto lo que hace es como reasignar nuevos valores
        $paciente->name = $request->name; 
        $paciente->historiaClinica = $request->input('historiaClinica')	;
        $paciente->sexo = $request->sexo;
        $paciente->grupoSanguineo = $request->grupoSanguineo;
        $paciente->fechaNacimiento = $request->fechaNacimiento;
        $paciente->edad = $request->edad;
        $paciente->peso = $request->peso;
        $paciente->talla = $request->talla;
        $paciente->indiceMC = $request->indiceMC;
        $paciente->presionArterial = $request->presionArterial;

        //* guardamos los datos en la base de datos
        $paciente->save();

        
        return redirect()->route('home')->with('status','Paciente editado correctamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);

        $paciente->delete();
        return redirect()->route('home')->with('status','Paciente borrado correctamente');

    }
}
