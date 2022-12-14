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

                <div>Detalle: Signos Vitales</div>
                <a class="h4 mb-0 text-default text-uppercase d-none d-lg-inline-block" style="margin-left: 40px justify-content: end" href="{{route('home')}}">
                  <i class="fas fa-notes-medical" style="font-size: 24px"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<?php

  list($fechaCreated,$horaCreated) = explode(' ',$signoV->created_at); // explode es una función que me divide una cadena de texto en función de un delimitador en este caso el delimitador es ' ' el espacio, de esta manera separo la fecha de la hora y me crea un array justo donde se delimita, es exactamente igual que hacer un split en JS
  //list() funciona como una forma de desestructuración del array, donde la primera variable corresponde al elemento de indice 0
 

  
  list($fechaUpdated,$horaUpdated) = explode(' ',$signoV->updated_at); // saco fecha y hora en variables distintas
  $doctor = $doctor->name;

       
?>

<div class="card-body" style="display: flex; justify-content: space-between">
    <div>
        <a href="{{route('signosVitales.edit',['signosVitales'=>$signoV->id])}}" class="btn btn-outline-default">Editar Datos</a>  
    </div>


    <a class="h4 mb-0 text-default text-uppercase d-none d-lg-inline-block" style="margin-left: 40px justify-content: end" href="{{route('signosVitales.index',['signosVitales'=>$paciente->id])}}">
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
    SIGNOS VITALES
</h2>
<div class="card-body">
    
    <div class="col-xl-13 mb-5 mb-xl-0">
        <div>
            
            <div class="card card-stats">   
                <!-- Card body -->
                <div class="card-body">
                        
                        <div class="row"  style="display: flex; justify-content: space-between">
                            <div class="col-auto">
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">Presión arterial S</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$signoV->presionArS}}  mmHg</span>
                                </div>

                                <div class="mt-3 mb-4 text-sm col-auto  text-success">
                                    <div>
                                        <i class="ni ni-check-bold"></i>
                                        <span >adecuado</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">Presión arterial D</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$signoV->presionArD}}  mmHg</span>
                                </div>

                                <div class="mt-3 mb-4 text-sm col-auto   text-success">
                                    <div>
                                        <i class="ni ni-check-bold"></i>
                                        <span >adecuado</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">Presión arterial M</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$signoV->presionArM}}  mmHg</span>
                                </div>
                                
                                <div class="mt-3 mb-4 text-sm col-auto  text-warning">
                                    <div>
                                        <i class="ni ni-fat-add"></i>
                                        <span >peligroso</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">Temperatura</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$signoV->temperatura}}  ºC</span>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">Frecuencia respiratoria</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$signoV->frecuenciaRes}} res/min</span>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">Frecuencia cardiaca</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$signoV->frecuenciaCar}} lat/min</span>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">Saturación de oxigeno</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$signoV->saturacionOxi}}  %</span>
                                </div>
                            </div>

                        </div>
                        
                </div>

            </div>

        </div>
    </div>

    <h2 class="mb-4 mt-5 row">
    DATOS ANTROPOMETRICOS
    </h2>

    <div class="col-xl-13 mb-5 mb-xl-0">
        <div>
            
            <div class="card card-stats">   
                <!-- Card body -->
                <div class="card-body">
                        
                        <div class="row"  style="display: flex; justify-content: space-between">
                            
                            <div class="col-auto">
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">Peso</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$signoV->peso}}  Kg</span>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">Talla</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$signoV->talla}} m</span>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">I.M.C</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$signoV->iMC}} lat/min</span>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">Perimetro abdominal</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$signoV->perimetroAbdominal}}  cm</span>
                                </div>
                            </div>

                        </div>
                        
                </div>

            </div>

        </div>
    </div>

    <h2 class="mb-4 mt-5 row">
    MEDICIONES CAPILARES
    </h2>

    <div class="col-xl-13 mb-5 mb-xl-0">
        <div>
            
            <div class="card card-stats">   
                <!-- Card body -->
                <div class="card-body">
                        
                        <div class="row"  style="display: flex; justify-content: space-between">
                            
                            <div class="col-auto">
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">Glucosa capilar</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$signoV->glucosaCapilar}}</span>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">Valor hemoglobina</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$signoV->vHemoglobina}}</span>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div>
                                    <h5 class="card-title text-uppercase text-muted mb-0">Valor de hemoglobina corregido</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$signoV->vHemoglobinaC}}</span>
                                </div>
                            </div>


                        </div>
                        
                </div>

            </div>

        </div>
    </div>

    
</div>
@endsection
