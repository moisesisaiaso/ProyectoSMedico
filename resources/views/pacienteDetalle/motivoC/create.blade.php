@extends('layouts.panel')
@section('title', 'paciente')

@section('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')

<div class="row">
    <div class="col-md-12 mb-1 mt-4">
        <div class="card">

            <div class="card-body" style="display: flex; justify-content: space-between">
              @if(isset($motivoC) && is_object($motivoC))
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
            <h3 class="mb-0">MOTIVO DE CONSULTA</h3>
          </div>
          <div class="col text-right">
              <a href="{{route('motivoConsulta.index',['motivoConsulta'=>$paciente->id])}}" class="btn btn-outline-default">
                <span class="btn-inner--icon mr-2"><i class="ni ni-book-bookmark"></i></span>
                Historial
            </a>  
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{isset($motivoC)? route('motivoConsulta.update',['motivoConsulta'=>$motivoC->id]) : route('motivoConsulta.store')}}" method="POST"> <!-- Ojo ['paciente'=>$paciente->id]) en el array asociativo su nombre debe ser igual al nombre del parametro que se establece en la ruta-->
        
        <!--metodo POST está dando problemas ya que no es aceptado por la ruta de paciente.update , seguramente se necesita un metodo PUT o PACH pero hay que ver como hacer la condición por si es actualizar o crear -->
          @csrf
          @if(isset($motivoC) && is_object($motivoC))
                
                  @method('PUT')
        
          @endif
            <div class="mt-2" >
                 
                <input type="hidden" name="paciente_id" value="{{$paciente->id}}" />
                
                <div class="form-group ml-2 mr-2">
                    
                    <div class="input-group">
                        <textarea class="form-control" aria-label="With textarea" name="planificacion_familiar" placeholder="Planificación Familiar">{{$motivoC->planificacion_familiar ?? old('planificacion_familiar')}}</textarea>
                    </div>
                </div>

    
                <div class="form-group ml-2 mr-2">
                    <label for="lugar_atencion">Motivo de Consulta</label>
                    <div class="input-group">
                        <textarea class="form-control" aria-label="With textarea" name="descripcion_motivo" placeholder="Describa el Motivo de Consulta">{{$motivoC->descripcion_motivo ?? old('descripcion_motivo')}}</textarea>
                    </div>
                </div> 
                
                <div class="form-group ml-2 mr-2">
                  <label for="grupo_prioritario">Enfermedad o Problema actual</label>
                  <div class="input-group">
                        <textarea class="form-control" aria-label="With textarea" name="descripcion_enfermedad" placeholder="Describa la Enfermedad o Problema actual">{{$motivoC->descripcion_enfermedad ?? old('descripcion_enfermedad')}}</textarea>
                    </div>
                </div>
                
            </div>

            <button type="submit" class="btn  btn-lg btn-block" style="background-color: #2dcebd; color: white"><i class="ni ni-send"></i>{{isset($motivoC) && is_object($motivoC)? ' Editar registro':' Crear registro'}}</button>
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