<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(){
        $titulo = 'Pacientes';
        return view('patient.index', array(
            'titulo'=> $titulo
        ));
    }
}
