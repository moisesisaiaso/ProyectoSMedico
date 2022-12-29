@extends('layouts.panel')
@section('title', 'paciente')

@section('content')
<div class="row">
    <div class="col-md-12 mb-1 mt-4">
        <div class="card">

          <div class="card-body" style="display: flex; justify-content: space-between">
            <h1>Perfil del Paciente</h1>
            <a class="h4 mb-0 text-default text-uppercase d-none d-lg-inline-block" style="margin-left: 40px justify-content: end" href="{{route('home')}}">
                  <i class="fas fa-notes-medical" style="font-size: 24px"></i>
            </a>
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
            <h3 class="mb-0">Info</h3>
          </div>
          <div class="col text-right">
            <a href="{{route('paciente.edit',['paciente'=>$paciente->id])}}" class="btn btn-outline-default">Editar Datos</a>  
          </div>
        </div>
      </div>
      <div class="card-body" style="padding: 0px 80px">
        
        <div class="pt-0" style="display: flex; flex-wrap: wrap; justify-content: center">

            @if($paciente->sexo == 'Masculino')

            <div class="mb-5"> 
                <img src="{{asset('img/brand/masculino.png')}}" alt="avatar">
            </div> 
            
            @else
            <div class="mb-5"> 
                <img src="{{asset('img/brand/femenino.png')}}" alt="avatar">
            </div> 

            @endif
            
            <div class="col ml-2" style="display: flex; flex-wrap: wrap; text-align: center">
                    
                <div class="mt-5 col">
                   <h3 style="font-family:Raleway; line-height: 38px ;font-weight: 900; font-size:35px">{{$paciente->name}}</h3>
                   <h2 >{{$paciente->historiaClinica}}</h2>

                   <div class="row" style="display: flex; flex-wrap: wrap; justify-content: space-between">
                           
                       <div class="mt-5 mb-3 mr-1 ml-1">
                          <h2 style="font-family:Raleway" class="text-gray">Peso</h2>
                          <h2 class="text-default">{{$paciente->peso}} Kg</h2>
                       </div>

                       <div class="mt-5 mb-3 mr-1 ml-1">
                          <h2 style="font-family:Raleway" class="text-gray">Indice de MC</h2>
                          <h2 class="text-default">{{$paciente->indiceMC}}Kg/m</h2>
                       </div>

                       <div class="mt-5 mb-3 mr-1 ml-1">
                          <h2 style="font-family:Raleway" class="text-gray">Talla</h2>
                          <h2 class="text-default">{{$paciente->talla}} cm</h2>
                       </div>

                       <div class="mt-5 mb-3 mr-1 ml-1">
                          <h2 style="font-family:Raleway" class="text-gray">Género</h2>
                          <h2 class="text-default">{{$paciente->sexo}}</h2>
                       </div>

                       <div class="mt-5 mb-3 mr-1 ml-1">
                          <h2 style="font-family:Raleway" class="text-gray">Presion A</h2>
                          <h2 class="text-default">{{$paciente->presionArterial}} mm</h2>
                       </div>

                       <div class="mt-5 mb-3 mr-1 ml-1">
                          <h2 style="font-family:Raleway" class="text-gray">Edad</h2>
                          <h2 class="text-default">{{$paciente->edad}}</h2>
                       </div>

                       
                       <!-- esta condicional solo es para que el formato de los datos se adecúe mejor, ya que por la imagen del avatar cuando es masculino es mas ancha que cuando es femenino y los estilos se distorcionan -->
                       @if($paciente->sexo == 'Masculino')
                       
                       <div class="mt-5 mb-3 mr-1 ml-1">
                          <h2 style="font-family:Raleway" class="text-gray">Grupo Sa</h2>
                          <h2 class="text-default">{{$paciente->grupoSanguineo}}</h2>
                       </div>

                       <div class="mt-5 mb-3 mr-1 ml-1">
                          <h2 style="font-family:Raleway" class="text-gray">fecha de Na</h2>
                          <h2 class="text-default">{{$paciente->fechaNacimiento}}</h2>
                       </div>
                       @else
                       
                       <div class="mt-5 mb-3 mr-1 ml-1">
                        <!-- el unico cambio es el texto Grupo Sang -->
                          <h2 style="font-family:Raleway" class="text-gray">Grupo Sang</h2>
                          <h2 class="text-default">{{$paciente->grupoSanguineo}}</h2>
                       </div>

                       <div class="mt-5 mb-3 mr-1 ml-1">
                         <!-- el unico cambio es el texto fecha de Naci -->
                          <h2 style="font-family:Raleway" class="text-gray">fecha de Naci</h2>
                          <h2 class="text-default">{{$paciente->fechaNacimiento}}</h2>
                       </div>
                       @endif
                       
                   </div>

                </div>
                
            </div>

            <?php

            list($pacienteCreated,) = explode(' ',$paciente->created_at);
            $user = $paciente->user;
            $doctor = $user->name;
            ?>
            <div class="pt-0 col ml-4" style="display: flex; flex-wrap: wrap; justify-content: center">
              
              <div style="height:100px; margin-top: 10px">Paciente Creado: {{$pacienteCreated}} 
                  <div style="font-size: 15px">Dr. {{$doctor}}</div> 
              </div>
              
                  
              <div style="width: 18rem" class="mb-4">
                  <div class="card card-stats">
                      
                      <!-- Card body -->
                      <div class="card-body">

                      <div class="row">
                          <div class="col">
                              <h5 class="card-title text-uppercase text-muted mb-0">Proxima consulta</h5>
                              <span class="h2 font-weight-bold mb-0">{{$pacienteCreated}}</span>
                          </div>
                          <div class="col-auto">
                              <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                  <i class="ni ni-chart-pie-35"></i>
                              </div>
                          </div>
                      </div>
                      <p class="mt-3 mb-0 text-sm">
                          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 100%</span>
                          <span class="text-nowrap">Activo</span>
                      </p>
              
                      </div> 
                  </div>
              </div>


              <div style="width: 18rem" class="mb-4">
                  <div class="card card-stats">
                      
                      <!-- Card body -->
                      <div class="card-body">

                      <div class="row">
                          <div class="col">
                              <h5 class="card-title text-uppercase text-muted mb-0">Proxima consulta</h5>
                              <span class="h2 font-weight-bold mb-0">{{$pacienteCreated}}</span>
                          </div>
                          <div class="col-auto">
                              <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                  <i class="ni ni-chart-pie-35"></i>
                              </div>
                          </div>
                      </div>
                      <p class="mt-3 mb-0 text-sm">
                          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 100%</span>
                          <span class="text-nowrap">Activo</span>
                      </p>
              
                      </div> 
                  </div>
              </div>

              <div style="width: 18rem" class="mb-4">
                  <div class="card card-stats">
                      
                      <!-- Card body -->
                      <div class="card-body">

                      <div class="row">
                          <div class="col">
                              <h5 class="card-title text-uppercase text-muted mb-0">Proxima consulta</h5>
                              <span class="h2 font-weight-bold mb-0">{{$pacienteCreated}}</span>
                          </div>
                          <div class="col-auto">
                              <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                  <i class="ni ni-chart-pie-35"></i>
                              </div>
                          </div>
                      </div>
                      <p class="mt-3 mb-0 text-sm">
                          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 100%</span>
                          <span class="text-nowrap">Activo</span>
                      </p>
              
                      </div> 
                  </div>
              </div>

              <div class="mb-4">Paginación</div>

            </div>
                
          
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection
