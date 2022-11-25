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
    public function index(){
       
        $pacientes = Paciente::orderBy('id','desc')->get(); //permite obtener todos los pacientes ordenados de manera descendentes es decir del mas actual al antiguo
        return view('home',['pacientes'=>$pacientes]);
    }
}
