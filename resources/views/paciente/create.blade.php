@extends('layouts.panelBasic')
@section('title', 'home')

@section('content')
<div class="row">
    <div class="col-md-12 mb-1">
        <div class="card">
            <div class="card-header">{{ __('Bienvenido !') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if((session('status')))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <span class="alert-icon">
                        <i class="ni ni-like-2"></i>
                      </span>
                      <span class="alert-text"><strong>Success!</strong>{{ session('status') }}
                      </span>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                </div>
               @else
                {{ __('Esta es la lista de pacientes existentes!') }}
               @endif
            </div>
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
        <form action="">
            <div class="row mt-2 flex-grow-1" >
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="name">Nombre del Paciente</label>
                    <input type="text" name="name" class="form-control">
                </div>
    
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="historiaClinica">N°Cédula</label>
                    <input type="text" name="historiaClinica" class="form-control">
                </div>
    
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="genero">Genero</label>
                    <input type="text" name="genero" class="form-control">
                </div>
    
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="grupoSanguineo">Grupo Sanguineo</label>
                    <input type="text" name="grupoSanguineo" class="form-control">
                </div>
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="edad">Edad</label>
                    <input type="text" name="edad" class="form-control">
                </div>
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="peso">Peso</label>
                    <input type="text" name="peso" class="form-control">
                </div>
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="talla">Talla</label>
                    <input type="text" name="talla" class="form-control">
                </div>
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="fechaNacimiento">Fecha de Nacimiento</label>
                    <input type="text" name="fechaNacimiento" class="form-control">
                </div>
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="indiceMC">Indice de Masa Corporal </label>
                    <input type="text" name="indiceMC" class="form-control">
                </div>
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="presionArterial">Presión Arterial</label>
                    <input type="text" name="presionArterial" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn  btn-lg btn-block" style="background-color: #2dcebd; color: white">Crear paciente</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
