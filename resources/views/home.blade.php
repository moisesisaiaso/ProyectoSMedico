@extends('layouts.panelBasic')
@section('title', 'home')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header">{{ __('Bienvenido !') }}</div>

            <div class="card-body">
               
              @if((session('status')))
                  <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <span class="alert-icon">
                          <i class="ni ni-like-2"></i>
                        </span>
                        <span class="alert-text"><strong>Éxito! </strong>{{ session('status') }}
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
  <div class="col-xl-9 mb-5 mb-xl-0">
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Pacientes</h3>
          </div>
          <div class="col text-right">
            <a href="{{route('paciente.create')}}" class="btn btn-sm btn-outline-success">Crear Paciente</a>  
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">N°Cédula</th>
              <th scope="col">Genero</th>
              <th scope="col">Grupo Sanguineo</th>
              <th scope="col">Edad</th>
              <th scope="col">Peso</th>
              <th scope="col">Talla</th>
            </tr>
          </thead>
          <tbody>

            <!-- itera -->
          @foreach($pacientes as $paciente)
            <tr height="61px">
              <th scope="row">
                {{$paciente->name}}
              </th>
              <td>
                {{$paciente->historiaClinica}}
              </td>
              <td>
                {{$paciente->sexo}}
              </td>
              <td>
                <i class="fas fa-arrow-up text-success mr-3"></i>{{$paciente->grupoSanguineo}}
              </td>
              <td>
                {{$paciente->edad}}
              </td>
              <td>
                {{$paciente->peso}} kg
              </td>
              <td>
                {{$paciente->talla}} m
              </td>
            </tr>
          @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>

  
  <div class="col-xl-3 pl-0 pr-3"> <!-- con esta clase modificamos el ancho de la card de acciones -->
     <div class="card shadow">
       <div class="card-header border-0">
         <div class="row align-items-center">
           <div class="col">
             <h3 class="mb-0">Acciones</h3>
           </div>
         </div>
       </div>
       <div class="table-responsive">
         <!-- Projects table -->
         <table class="table align-items-center table-flush">
           <thead class="thead-light" height="43px">
             <tr>
               <th scope="col" colspan="3"></th>
             </tr>
           </thead>
           <tbody>

           <!-- Itera -->
           @foreach($pacientes as $paciente)
             </tr>
             <tr> 
               <td style="padding: 16px 15px">
                   <a href="{{route('paciente.show',['paciente'=>$paciente->id])}}" class="btn btn-sm btn-info" style="display: block">Entrar</a>
               </td>
               <td style="padding-left:0px; padding-right:0px">
                   <a href="{{route('paciente.edit',['paciente'=>$paciente->id])}}" class="btn btn-sm btn-success" style="display: block">Actualizar</a>
               </td>

               <form action="{{route('paciente.destroy',['paciente'=>$paciente->id])}}" method="POST">
                @csrf
                @method('DELETE')
                 <td style="padding: 16px 15px">
                     <button type="submit" class="btn btn-sm btn-default" style="display: block">Eliminar</button>
                 </td>
               </form>
             </tr>
          @endforeach


           </tbody>
         </table>
       </div>
     </div> 
   </div> 
</div>
@endsection
