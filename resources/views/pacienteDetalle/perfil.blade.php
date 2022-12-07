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
       
        <div style="display:flex">
            <div class="flex-grow-1" style="display: flex">
            

                @if($paciente->sexo == 'Masculino')

                <div class="mb-5"> 
                    <img src="{{asset('img/brand/masculino.png')}}" alt="avatar">
                </div> 
            
                @else
                <div class="mb-5"> 
                    <img src="{{asset('img/brand/femenino.png')}}" alt="avatar">
                </div> 

                @endif
            
                <span class="col" style="margin-left: 20px">
                    
                    <div class="mt-5"><h3 style="font-family:Raleway; line-height: 38px ;font-weight: 900; font-size:35px">{{$paciente->name}}</h3></div>
                    <h2>{{$paciente->historiaClinica}}</h2>
                
                </span>
            </div>
                
                
            <div style="width: 18rem" class= "pt-5">
                <div class="card card-stats">
                    
                    <!-- Card body -->
                    <div class="card-body">
                        
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Paciente Creado</h5>
                            <span class="h2 font-weight-bold mb-0">{{$paciente->created_at}}</span>
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
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
