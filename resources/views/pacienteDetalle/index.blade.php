@extends('layouts.panel')
@section('title', 'paciente')

@section('content')

<!-- Array de objetos de compatibilidad del tipo de sangre -->
<?php

class TiposSangre{
  public $tipoSangre;
  public $da;
  public $recibe;
}

$compatibilidad1 = new TiposSangre();
$compatibilidad1->tipoSangre = "A+";
$compatibilidad1->da = "A+, AB+";
$compatibilidad1->recibe = "A+, A-, O+, O-";

$compatibilidad2 = new TiposSangre();
$compatibilidad2->tipoSangre = "O+";
$compatibilidad2->da = "O+, A+, B+, AB+";
$compatibilidad2->recibe = "O+, O-";

$compatibilidad3 = new TiposSangre();
$compatibilidad3->tipoSangre = "B+";
$compatibilidad3->da = "B+, AB+";
$compatibilidad3->recibe = "B+, B-, O+, O-";

$compatibilidad4 = new TiposSangre();
$compatibilidad4->tipoSangre = "AB+";
$compatibilidad4->da = "AB+";
$compatibilidad4->recibe = "Todos";

$compatibilidad5 = new TiposSangre();
$compatibilidad5->tipoSangre = "A-";
$compatibilidad5->da = "A+, A-, AB+, AB-";
$compatibilidad5->recibe = "A-, O-";

$compatibilidad6 = new TiposSangre();
$compatibilidad6->tipoSangre = "O-";
$compatibilidad6->da = "Todos";
$compatibilidad6->recibe = "O-";

$compatibilidad7 = new TiposSangre();
$compatibilidad7->tipoSangre = "B-";
$compatibilidad7->da = "B+, B-, AB+, AB-";
$compatibilidad7->recibe = "B-, O-";

$compatibilidad8 = new TiposSangre();
$compatibilidad8->tipoSangre = "AB-";
$compatibilidad8->da = "AB+, AB-";
$compatibilidad8->recibe = "AB-, A-, B-, O-";

$compatibilidades = [$compatibilidad1,$compatibilidad2,$compatibilidad3,$compatibilidad4,$compatibilidad5,$compatibilidad6,$compatibilidad7,$compatibilidad8]

?>

<div class="row">
    <div class="col-md-12 mb-5">
        <div class="card">
            
            <div class="card-body" style="display: flex; justify-content: space-between">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div> Dashboard</div>
                <a class="h4 mb-0 text-default text-uppercase d-none d-lg-inline-block" style="margin-left: 40px justify-content: end" href="{{route('home')}}">
                  <i class="fas fa-notes-medical" style="font-size: 24px"></i>
                </a>
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
            <h3 class="mb-0">Compatibilidad del tipo de sangre</h3>
          </div>
          
        </div>
      </div>
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Tipo de sangre</th>
              <th scope="col">Da</th>
              <th scope="col">Recibe</th>
            </tr>
          </thead>
          <tbody>
            @foreach($compatibilidades as $compatibilidad)
              @if($compatibilidad->tipoSangre != $paciente->grupoSanguineo )
                <tr height="50px">
                  <th scope="row">
                    {{$compatibilidad->tipoSangre}}
                  </th>
                  <td>
                  {{ $compatibilidad->da}}
                  </td>
                  <td>
                    {{$compatibilidad->recibe}}
                  </td>
                </tr>
              @else
                <tr height="50px" style="color: white; font-weight: bold" class="bg-success">
                  <th scope="row" style="font-size: 15px">
                    {{$compatibilidad->tipoSangre}}
                  </th>
                  <td style="font-size: 15px">
                  {{ $compatibilidad->da}}
                  </td>
                  <td style="font-size: 15px">
                    {{$compatibilidad->recibe}}
                  </td>
                </tr>
              @endif
              
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
             <h3 class="mb-0">Estado</h3>
           </div>
         </div>
       </div>
       <div class="table-responsive">
         <!-- Projects table -->
         <table class="table align-items-center table-flush">
           <thead class="thead-light" height="40px">
             <tr>
               <th scope="col" colspan="3"></th>
             </tr>
           </thead>
           <tbody>
             @foreach($compatibilidades as $compatibilidad)
             <tr> 
               @if($compatibilidad->tipoSangre != $paciente->grupoSanguineo )
               <td style="padding: 16px 15px; text-align: center">
                 INCOMPATIBLE
               </td>
                @else
               <td style="padding: 16px 15px; text-align: center; color: white; font-weight: bold; font-size: 15px" class="bg-success">
                 COMPATIBLE
               </td>
                @endif
             </tr>
          @endforeach
           </tbody>
         </table>
       </div>
     </div> 
   </div> 
</div>
@endsection
