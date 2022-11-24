<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente; 

class PatientController extends Controller
{
    public function index(){
        $titulo = 'Pacientes';
        return view('patient.index', array(
            'titulo'=> $titulo
        ));
    }
}
