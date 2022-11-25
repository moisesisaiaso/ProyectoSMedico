@extends('layouts.panelBasic')
@section('title', 'MI PERFIL')

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
        
<div class="row mt-2" >
  <div class="col-xl-12 mb-5 mb-xl-0">
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Info</h3>
          </div>
          <div class="col text-right">
            <a href="{{route('paciente.index')}}" class="btn btn-outline-default">Regresar</a>  
          </div>
        </div>
      </div>
      <div class="card-body">
        
        <div style="text-align: center">
           <?php
            $user = \Auth::user();
            ?>

            @if(Auth::user()->image)
            <div  style="width: 200px !important; height: 200px !important;border-radius: 900px !important; overflow: hidden !important; display: flex"> 
                <img src="{{route('getImage.user',['filename'=> $user->image])}}" alt="avatar" style="height: 100%; justify-content: center">
            </div> <!-- $user->image  $user me devuelve el objeto de usuario autenticado, lo obtengo del controlador y encadeno su propiedad ->image para obtener la imagen que en este campo se almaceda como string ya que solo hace referencia al nombre de la imagen almacenada en el storage de users --> <!-- esto tambien se puede hacer con  Auth::user()->image que devuelve lo mismo (el nombre la imagen)-->
            @else
                <span class="container-avatar"> <i class="ni ni-circle-08 form-Avatar-i"></i></span>

            @endif
        
            <div class="col">
                <h3 class="mb-0">Dra. {{$user->name}}</h3>
            </div>
        </div>
        
        <div>
            <img src="{{asset('img/brand/favicon.png')}}"></img>
        </div>
        
        
      </div>
    </div>
  </div>
</div>
@endsection
