@extends('layouts.panelBasic')
@section('title', '')


@section('content')
<div class="row">
    <div class="col-md-12 mb-1 mt-4">
        <div class="card">

          <div class="card-body">
            <h1>My Perfil</h1>
          </div>
        </div>

    </div>
</div>
        
  
<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Info</h3>
          </div>
          <div class="col text-right">
            <a href="{{route('config.user')}}" class="btn btn-outline-default">Editar Datos<a>  
          </div>
      </div>
    </div>
    <div class="card-body" style="padding: 0px 80px; overflow: hidden">
      
      <div class="pt-0" style="display: flex; flex-wrap: wrap; align-items: center; height:100%">
    
        <div>
           <?php
            $user = \Auth::user();
            ?>

            @if(Auth::user()->image)
            <div class= "image" style="width: 200px; height: 200px;border-radius: 900px; overflow: hidden"> 
                <img src="{{route('getImage.user',['filename'=> $user->image])}}" alt="avatar" style="height: 100%">
            </div> <!-- $user->image  $user me devuelve el objeto de usuario autenticado, lo obtengo del controlador y encadeno su propiedad ->image para obtener la imagen que en este campo se almaceda como string ya que solo hace referencia al nombre de la imagen almacenada en el storage de users --> <!-- esto tambien se puede hacer con  Auth::user()->image que devuelve lo mismo (el nombre la imagen)-->
            @else
                <span style="width: 200px; height: 200px;border-radius: 900px; overflow: hidden"> 
                  <i class="ni ni-circle-08" style="font-size: 200px; display: block;"></i>
                </span>

            @endif
        </div>
        <div style="margin-left: 20px">
          
                  <h3 style="font-family:Raleway ;font-weight: 900; font-size:35px; margin-bottom: 0px">
                  Dr. {{$user->name}}
                  </h3>
                  <h2>{{$user->email}}</h2>
          
        </div>
      </div>
      <div class="pt-0" style="display: flex; flex-wrap: wrap; justify-content: center">
          <div class="mr-5">
            <img src="{{asset('img/brand/favicon.png')}}" style="min-width: 690px; height: 621px"/>
          </div>
          
          <div class="pt-0 col" style="display: flex; flex-wrap: wrap; justify-content: center">

              <div style="min-width: 18rem" class="mb-5 mr-4 ml-2">
                <div class="card card-stats">
                  
                  <!-- Card body -->
                  <div class="card-body">
                        
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Atender a Pablo</h5>
                            <span class="h2 font-weight-bold mb-0">17/11/2022</span>
                        </div>
                        <div class="col-auto">
                          <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                              <i class="ni ni-chart-pie-35"></i>
                          </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 100%</span>
                        <span class="text-nowrap">Creado hace un día</span>
                    </p>
                
                  </div> 
                </div>
              </div>

              <div style="min-width: 18rem" class="mb-5 mr-4 ml-2">
                <div class="card card-stats">
                  
                  <!-- Card body -->
                  <div class="card-body">
                        
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Atender a Pablo</h5>
                            <span class="h2 font-weight-bold mb-0">17/11/2022</span>
                        </div>
                        <div class="col-auto">
                          <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                              <i class="ni ni-chart-pie-35"></i>
                          </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 100%</span>
                        <span class="text-nowrap">Creado hace un día</span>
                    </p>
                
                  </div> 
                </div>
              </div>

              <div style="min-width: 18rem" class="mb-5 mr-4 ml-2">
                <div class="card card-stats">
                  
                  <!-- Card body -->
                  <div class="card-body">
                        
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Atender a Pablo</h5>
                            <span class="h2 font-weight-bold mb-0">17/11/2022</span>
                        </div>
                        <div class="col-auto">
                          <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                              <i class="ni ni-chart-pie-35"></i>
                          </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 100%</span>
                        <span class="text-nowrap">Creado hace un día</span>
                    </p>
                
                  </div> 
                </div>
              </div>

              <div class="mb-5 mr-4 ml-2">Paginación</div>   
          </div>

      </div>
        
    </div>
</div>

@endsection
