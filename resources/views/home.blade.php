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
            
              @elseif((session('status2')))
                  <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                        <span class="alert-icon">
                          <i class="ni ni-bell-55"></i>
                        </span>
                        <span class="alert-text"><strong>Fallido! </strong>{{ session('status2') }}
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
              <i class="ni ni-single-02 text-warning mr-3"></i> {{$paciente->name}}
              </th>
              <td>
                {{$paciente->historiaClinica}}
              </td>
              <td>
                {{$paciente->sexo}}
              </td>
              <td>
                <i class="fas fa-burn text-danger mr-3"></i>{{$paciente->grupoSanguineo}}
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
           
           
         @if(count($pacientes) == 0) <!-- Si $pacientes está vación muestra mensaje "no hay coincidencias" (para mostrar un mensaje cuando la busqueda no fue exitosa)-->
           
            <thead class="thead-light" height="43px">
              <tr style= "text-align: center">
                <th scope="col" class="text-warning"> Coincidencia no encontrada</th>
              </tr>
            </thead>
            <tbody>

         @else
            <thead class="thead-light" height="43px">
              <tr>
                <th scope="col" colspan="3"></th>
              </tr>
            </thead>
            <tbody>
              <!-- Itera -->
            @foreach($pacientes as $paciente)

                <!-- //^ Logica para saber si un paciente se puede borrar o no por dependencia de datos y de esta forma permitir o no crear el boton "eliminar"
                // ? aquí en PHP los nombres de propiedades están en "" como un objeto json, por este motivo no causará problemas acceder a sus propiedades con string -->
                    <?php
                        $dependendientes = ['antecedentes','diagnosticos','examenesF','lugaresA','motivosC','signosV','tratamientos'];

                        $dependenciaConPacientes = false;
                        foreach($dependendientes as $dependiente){

                          if(count($paciente->$dependiente) != 0){
                              $dependenciaConPacientes = true;
                          }
                        }
              
                    ?>

                @if($dependenciaConPacientes == false)
                <tr> 
                  <td style="padding: 16px 15px">
                      <a href="{{route('paciente.show',['paciente'=>$paciente->id])}}" class="btn btn-sm btn-info" style="display: block">Entrar</a>
                  </td>
                  <td style="padding-left:0px; padding-right:0px">
                      <a href="{{route('paciente.edit',['paciente'=>$paciente->id])}}" class="btn btn-sm btn-success" style="display: block">Actualizar</a>
                  </td>

                  <!-- //* eliminar con modal -->
                  <td style="padding: 16px 15px; width: 20px">
                      <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-default" style="display: block" data-toggle="modal" data-target="#eliminarModal" data-id="{{$paciente->id}}"> <!-- data- es atributo que me permite enviar una variable al modal para poder ser accedida en ete caso envío la variable data-id -->
                          Eliminar
                        </button>
                  </td>
                </tr>

                @else
              
                <tr> 
                  <td style="padding: 16px 15px">
                      <a href="{{route('paciente.show',['paciente'=>$paciente->id])}}" class="btn btn-sm btn-info" style="display: block">Entrar</a>
                  </td>
                  <td style="padding-left:0px; padding-right:15px" colspan="2">
                      <a href="{{route('paciente.edit',['paciente'=>$paciente->id])}}" class="btn btn-sm btn-success" style="display: block">Actualizar</a>
                  </td>
                </tr>

                  
                @endif

                <!-- // ? MODAL  -->
            <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalLabel">
                    Advertencia!!  Se va a eliminar el registro
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                  ¿Está seguro que desea eliminar este registro?
                    
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                       
                      
                      <form action="{{route('paciente.destroy',1)}}"  data-action="{{route('paciente.destroy',1)}}" method="POST" id="form-delete">
                        @csrf
                        @method('DELETE')
                           
                          <button type="submit" class="btn btn-warning">
                            Sí, Eliminar
                          </button>
                      </form>
                     
          
                  </div>
                </div>
              </div>
            </div>   

            <!-- // *Script para modal-delete -->
            <script src="{{asset('js/modal-delete.js')}}"> </script>
            @endforeach

          @endif
                
            </tbody>
          </table>
        </div>
      </div> 
    </div> 
    <!-- Enlace vista de paginación personalizada:  https://laravel.com/docs/9.x/pagination#customizing-the-pagination-view-->
    <div class="card-body"> 
        {{$pacientes->links()}}
    </div>
</div>
@endsection
