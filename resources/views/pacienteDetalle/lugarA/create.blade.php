@extends('layouts.panel')
@section('title', 'paciente')

@section('modal-delete')
<!-- bibliotecas de jquery y booststrap necesarias para el campo multiple select -->
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
@endsection

@section('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')

<!-- <div class="row">
    <div class="col-md-12 mb-5">
        <div class="card">
            

            <div class="card-body" style="display: flex; justify-content: space-between">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div> EDITAR LUGAR A</div>
                <a class="h4 mb-0 text-default text-uppercase d-none d-lg-inline-block" style="margin-left: 40px justify-content: end" href="{{route('home')}}">
                  <i class="fas fa-notes-medical" style="font-size: 24px"></i>
                </a>
            </div>
        </div>
    </div>
</div> -->


<div class="row">
    <div class="col-md-12 mb-1 mt-4">
        <div class="card">

            <div class="card-body" style="display: flex; justify-content: space-between">
              @if(isset($lugarA) && is_object($lugarA))
                <h1 style="display:inline">EDITAR REGISTRO</h1>
        
              
              @else
                <h1 style="display:inline">CREAR REGISTRO</h1>
                
              @endif
              
              <a class="h4 mb-0 text-default text-uppercase d-none d-lg-inline-block" style="margin-left: 40px justify-content: end" href="{{route('home')}}">
                  <i class="fas fa-notes-medical" style="font-size: 24px"></i>
              </a>
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
            <h3 class="mb-0">LUGAR DE ATENCIÓN</h3>
          </div>
          <div class="col text-right">
              <a href="{{route('lugarAtencion.index',['lugarAtencion'=>$paciente->id])}}" class="btn btn-outline-default">
                <span class="btn-inner--icon mr-2"><i class="ni ni-book-bookmark"></i></span>
                Historial
            </a>  
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{isset($lugarA)? route('lugarAtencion.update',['lugarAtencion'=>$lugarA->id]) : route('lugarAtencion.store')}}" method="POST"> <!-- Ojo ['paciente'=>$paciente->id]) en el array asociativo su nombre debe ser igual al nombre del parametro que se establece en la ruta-->
        
        <!--metodo POST está dando problemas ya que no es aceptado por la ruta de paciente.update , seguramente se necesita un metodo PUT o PACH pero hay que ver como hacer la condición por si es actualizar o crear -->
          @csrf
          @if(isset($lugarA) && is_object($lugarA))
                
                  @method('PUT')
        
          @endif
            <div class="mt-2" >
                 
                <input type="hidden" name="paciente_id" value="{{$paciente->id}}" />
                
                <div class="form-group ml-2 mr-2">
                  <label for="tipo_atencion">Tipo de atención</label>
                  <select class="form-control" name="tipo_atencion">
                    <!-- Este codigo me va a permitir poner el atributo selected="selected" solo al option con el valor existente es decir ya tiene un valor en la base de datos y de esta forma creo los demás option diferentes al valor existente para crearlos -->
                    <?php
                      $options = ['Atención básica de primer nivel', 'Servicios de hospitalización de segundo nivel de la población','Servicios de atención de tercer nivel','Asistencia medica','Asistencia Social','Unidad móvil o consultorio rural','Unidad medica de primer contacto','Centros de salud','Clínica'];
                    ?>
                    <!-- Creo los option, si existe el objeto $paciente me crea solo los option diferentes a el valor de $paciente->sexo de lo contrario me genera todo los option -->
                    @foreach($options as $option)
                    @if(isset($lugarA->tipo_atencion) && $option != $lugarA->tipo_atencion)
                          <option value="{{$option}}">{{$option}}</option>
                       @elseif(!isset($lugarA->tipo_atencion))
                          <option value="{{$option}}">{{$option}}</option> <!-- cuando creo pacientes -->

                       @endif
                    @endforeach

                    <!-- creo un option con su valor y aplico el atributo  selected="selected"  si existe el objeto $paciente->sexo -->
                    @if(isset($lugarA->tipo_atencion))
                    <option selected="selected" value="{{$lugarA->tipo_atencion}}">{{$lugarA->tipo_atencion}}</option>

                    @endif
                    
                  </select>
                </div>
    
                <div class="form-group ml-2 mr-2">
                    <label for="lugar_atencion">Lugar de atención</label>
                    <select class="form-control" name="lugar_atencion">

                    <?php
                      $options1 = ['Casa', 'Clinica','Empresa'];
                    ?>

                    @foreach($options1 as $option)
                       @if(isset($lugarA->lugar_atencion) && $option != $lugarA->lugar_atencion)
                          <option value="{{$option}}">{{$option}}</option>

                       @elseif(!isset($lugarA->lugar_atencion))
                          <option value="{{$option}}">{{$option}}</option> <!-- cuando creo pacientes -->

                       @endif
                    @endforeach
                    <!-- creo un option con su valor y aplico el atributo  selected="selected"  si existe el objeto $paciente -->
                    @if(isset($lugarA->lugar_atencion))
                       <option selected="selected" value="{{$lugarA->lugar_atencion}}">{{$lugarA->lugar_atencion}}</option>

                    @endif
                    
                  </select>
                </div> 
                
                <div class="form-group ml-2 mr-2">
                  <label for="grupo_prioritario">Grupos prioritarios</label>
                  <select name="grupo_prioritario[]" class="form-control selectpicker" data-style="btn-default" title="Selecciona Grupos prioritarios" multiple>
                    <!-- Este codigo me va a permitir poner el atributo selected="selected" solo al option con el valor existente es decir ya tiene un valor en la base de datos y de esta forma creo los demás option diferentes al valor existente para crearlos -->
                    <?php
                      $options2 = ['No aplica', 'Embarazadas', 'Personas por Desastres Naturales', 'Personas por Desastres Antropogénicos', 'Privadas de la Libertad', 'Víctimas de Violencia Física', 'Víctimas de Violencia Psicológica', 'Víctimas de Violencia Sexual', 'Trabajador/a Sexual','Enfermedades Catastroficas y Raras'];
                    ?>
                    <!-- Creo los option, si existe el objeto $paciente me crea solo los option diferentes a el valor de $paciente->sexo de lo contrario me genera todo los option -->
                    @foreach($options2 as $option)
                       @if(isset($lugarA->grupo_prioritario) && $option != $lugarA->grupo_prioritario)
                          <option value="{{$option}}">{{$option}}</option>
                       @elseif(!isset($lugarA->grupo_prioritario))
                          <option value="{{$option}}">{{$option}}</option> <!-- cuando creo pacientes -->

                       @endif
                    @endforeach

                    <!-- creo un option con su valor y aplico el atributo  selected="selected"  si existe el objeto $paciente->sexo -->
                    @if(isset($lugarA->grupo_prioritario))
                    <option selected="selected" value="{{$lugarA->grupo_prioritario}}">{{$lugarA->grupo_prioritario}}</option>

                    @endif
                    
                  </select>
                </div>
                
            </div>

            <button type="submit" class="btn  btn-lg btn-block" style="background-color: #2dcebd; color: white"><i class="ni ni-send"></i>{{isset($lugarA) && is_object($lugarA)? ' Editar registro':' Crear registro'}}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <!-- script para campo select multiple de create lugarA -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection