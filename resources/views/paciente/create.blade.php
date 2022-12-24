@extends('layouts.panelBasic')
@section('title', '')

@section('content')
<div class="row">
    <div class="col-md-12 mb-1 mt-4">
        <div class="card">

            <div class="card-body">
              @if(isset($paciente) && is_object($paciente))
                <h1>EDITAR PACIENTE</h1>
        
              
              @else
                <h1>CREAR UN PACIENTE</h1>
                
              @endif

            </div>
            @if($errors->any())
              @foreach($errors->all() as $error)
                
                <div class="alert alert-danger ml-4 mr-4" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> <strong> Error!</strong> {{$error}}
                </div>
                  
              @endforeach
    
            @endif
        </div>

    </div>
</div>
        
<div class="row mt-2" >
  <div class="col-xl-12 mb-5 mb-xl-0">
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Pacientes</h3>
          </div>
          <div class="col text-right">
            <a href="{{route('paciente.index')}}" class="btn btn-outline-default">Regresar</a>  
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{isset($paciente)? route('paciente.update',['paciente'=>$paciente->id]) : route('paciente.store')}}" method="POST"> <!-- Ojo ['paciente'=>$paciente->id]) en el array asociativo su nombre debe ser igual al nombre del parametro que se establece en la ruta-->
        
        <!--metodo POST está dando problemas ya que no es aceptado por la ruta de paciente.update , seguramente se necesita un metodo PUT o PACH pero hay que ver como hacer la condición por si es actualizar o crear -->
          @csrf
          @if(isset($paciente) && is_object($paciente))
                
                  @method('PUT')
        
          @endif
            <div class="row mt-2 flex-grow-1" >
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="name">Nombre del Paciente</label>
                    <input type="text" name="name" class="form-control" value="{{$paciente->name ?? old('name')}}"> <!-- old('name') es un metodo que permite mantener la permanencia de los datos ingresados en los campos cuando se envía el formulario y existe un ERROR DE VALIDACIÓN-->
                </div>
    
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="historiaClinica">N°Cédula</label>
                    <input type="text" name="historiaClinica" class="form-control" value="{{$paciente->historiaClinica ?? old('historiaClinica')}}" required>
                </div>

                <div class="form-group flex-grow-1 ml-2 mr-2">
                  <label for="sexo">Genero</label>
                  <select class="form-control" name="sexo">
                    <!-- Este codigo me va a permitir poner el atributo selected="selected" solo al option con el valor existente es decir ya tiene un valor en la base de datos y de esta forma creo los demás option diferentes al valor existente para crearlos -->
                    <?php
                      $options = ['Masculino', 'Femenino'];
                    ?>
                    <!-- Creo los option, si existe el objeto $paciente me crea solo los option diferentes a el valor de $paciente->sexo de lo contrario me genera todo los option -->
                    @foreach($options as $option)
                       @if(isset($paciente->sexo) && $option != $paciente->sexo)
                          <option value="{{$option}}">{{$option}}</option>
                       @elseif(!isset($paciente->sexo))
                          <option value="{{$option}}">{{$option}}</option> <!-- cuando creo pacientes -->

                       @endif
                    @endforeach

                    <!-- creo un option con su valor y aplico el atributo  selected="selected"  si existe el objeto $paciente->sexo -->
                    @if(isset($paciente->sexo))
                    <option selected="selected" value="{{$paciente->sexo}}">{{$paciente->sexo}}</option>

                    @endif
                    
                  </select>
                </div>
    
                <div class="form-group flex-grow-1 ml-2 mr-2 w-25">
                    <label for="grupoSanguineo">Grupo Sanguineo</label>
                    <select class="form-control" name="grupoSanguineo">

                    <?php
                      $options = ['A+', 'A-','B+','B-','AB+','AB-','O+','O-'];
                    ?>

                    @foreach($options as $option)
                       @if(isset($paciente->grupoSanguineo) && $option != $paciente->grupoSanguineo)
                          <option value="{{$option}}">{{$option}}</option>

                       @elseif(!isset($paciente->grupoSanguineo))
                          <option value="{{$option}}">{{$option}}</option> <!-- cuando creo pacientes -->

                       @endif
                    @endforeach
                    <!-- creo un option con su valor y aplico el atributo  selected="selected"  si existe el objeto $paciente -->
                    @if(isset($paciente->grupoSanguineo))
                       <option selected="selected" value="{{$paciente->grupoSanguineo}}">{{$paciente->grupoSanguineo}}</option>

                    @endif
                    
                  </select>

                   
                </div>
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="edad">Edad</label>
                    <input type="text" name="edad" class="form-control" value="{{$paciente->edad ?? old('edad')}}">
                </div>
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="peso">Peso</label>
                    <input type="text" name="peso" class="form-control" value="{{$paciente->peso ?? old('peso')}}">
                </div>
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="talla">Talla</label>
                    <input type="text" name="talla" class="form-control" value="{{$paciente->talla ?? old('talla')}}">
                </div>
                

                

                <div class="form-group flex-grow-1 ml-2 mr-2 w-25">
                    <label for="fechaNacimiento" class="form-control-label">Fecha de Nacimiento
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control datepicker" placeholder="Seleccionar fecha" type="text" value="{{$paciente->fechaNacimiento ?? old('fechaNacimiento')}}" name="fechaNacimiento">
                    </div>
                    
                </div>

                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="indiceMC">Indice de Masa Corporal </label>
                    <input type="text" name="indiceMC" class="form-control" value="{{$paciente->indiceMC ?? old('indiceMC')}}">
                </div>
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="presionArterial">Presión Arterial</label>
                    <input type="text" name="presionArterial" class="form-control" value="{{$paciente->presionArterial ?? old('presionArterial')}}">
                </div>
            </div>

            <button type="submit" class="btn  btn-lg btn-block" style="background-color: #2dcebd; color: white"><i class="ni ni-send"></i>{{isset($paciente) && is_object($paciente)? ' Editar paciente':' Crear paciente'}}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts') <!-- Escript para campo fecha Naciemiento -->

<script src="{{asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

@endsection