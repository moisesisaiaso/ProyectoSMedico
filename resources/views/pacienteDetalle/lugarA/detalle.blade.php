@extends('layouts.panel')
@section('title', 'paciente')

@section('content')

<div class="row">
    <div class="col-md-12 mb-5">
        <div class="card">
            
            <div class="card-body" style="display: flex; justify-content: space-between">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div>Detalle: Lugar de Atención</div>
                <a class="h4 font-weight-bold mb-0 text-default text-uppercase d-none d-lg-inline-block" style="margin-left: 40px justify-content: end" href="{{route('home')}}">
                  <i class="fas fa-notes-medical" style="font-size: 24px"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<?php

  list($fechaCreated,$horaCreated) = explode(' ',$lugarA->created_at); // explode es una función que me divide una cadena de texto en función de un delimitador en este caso el delimitador es ' ' el espacio, de esta manera separo la fecha de la hora y me crea un array justo donde se delimita, es exactamente igual que hacer un split en JS
  //list() funciona como una forma de desestructuración del array, donde la primera variable corresponde al elemento de indice 0
 

  
  list($fechaUpdated,$horaUpdated) = explode(' ',$lugarA->updated_at); // saco fecha y hora en variables distintas
  $doctor = $doctor->name;

       
?>

<div class="card-body" style="display: flex; justify-content: space-between">
    <div>
        <a href="{{route('lugarAtencion.edit',['lugarAtencion'=>$lugarA->id])}}" class="btn btn-outline-default">Editar Datos</a>  
    </div>


    <a class="h4 font-weight-bold mb-0 text-default text-uppercase d-none d-lg-inline-block" style="margin-left: 40px justify-content: end" href="{{route('lugarAtencion.index',['lugarAtencion'=>$paciente->id])}}">
        <i class="ni ni-bold-left" style="font-size: 24px"></i>
    </a>
</div>

<div class="card-body pt-1 pb-1" style="display: flex; justify-content: space-between">
    <div>Fecha de creación: {{$fechaCreated}} 
        @if($horaCreated == $horaUpdated)
        <div style="font-size: 15px">Dr. {{$doctor}}</div> 
        @endif
    </div>

    @if($horaCreated != $horaUpdated)
    <div>Fecha de actualización: {{$fechaUpdated}} 
        <div style="font-size: 15px">Dr. {{$doctor}}</div>
    </div>
    @endif
    
</div>

<h2 class="mb-0" style="text-align: center">
    LUGAR DE ATENCIÓN
</h2>

<div class="card-body">
    
    <div class="col-xl-13 mb-5 mb-xl-0">
        <div>
            
            <div class="card card-stats mb-3">   
                <!-- Card body -->
                <div class="card-body">
                        
                        <div>
                            <div>
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">TIPO DE ATENCIÓN</h5>
                                    <span class="h4 font-weight-bold mb-0 text-uppercase">{{$lugarA->tipo_atencion}}</span>
                                </div>
                            </div>
                        </div>
                        
                </div>

            </div>

        </div>
    </div>

    
    <div class="col-xl-13 mb-5 mb-xl-0">
        <div>
            
            <div class="card card-stats mb-3">   
                <!-- Card body -->
                <div class="card-body">
                        
                        <div>
                            <div>
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">LUGAR DE ATENCIÓN</h5>
                                    <span class="h4 font-weight-bold mb-0 text-uppercase">{{$lugarA->lugar_atencion}}</span>
                                </div>
                            </div>

                            
                        </div>
                        
                </div>

            </div>

        </div>
    </div>

    
    <?php
  
        $grupos_prioritarios = explode(';',$lugarA->grupo_prioritario);  
        
    ?>

    <div class="col-xl-13 mb-5 mb-xl-0">
        <div>
            
            <div class="card card-stats mb-3">   
                <!-- Card body -->
                <div class="card-body">
                        
                        <div class="row" style="display: flex; justify-content: space-between">
                            <div class="col-auto">
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">GRUPOS PRIORITARIOS</h5>
                                    <span class="h4 font-weight-bold mb-0 text-uppercase">{{$grupos_prioritarios[0]}}</span>
                                    
                                </div>
                            </div>

                            @foreach($grupos_prioritarios as $i => $grupo_prioritario)
                                @if($i != 0)
                                <div class="col-auto">
                                    <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0" style="display:flex; justify-content: center">-</h5>
                                        <span class="h4 font-weight-bold mb-0 text-uppercase">{{$grupo_prioritario}}</span>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                        
                </div>

            </div>

        </div>
    </div>

    
</div>
@endsection
