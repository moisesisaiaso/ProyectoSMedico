@extends('layouts.panel')
@section('title', 'paciente')

@section('content')

<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header">{{ __('Bienvenido !') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
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
            <h3 class="mb-0">Paciente</h3>
          </div>
          <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-outline-success">Crear</a>  
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
            </tr>
          </thead>
          <tbody>
            <tr height="61px">
              <th scope="row">
                /argon/
              </th>
              <td>
                4,569
              </td>
              <td>
                340
              </td>
              <td>
                <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
              </td>
              <td>
                23
              </td>
            </tr>
            <tr height="61px">
              <th scope="row">
                /argon/index.html
              </th>
              <td>
                3,985
              </td>
              <td>
                319
              </td>
              <td>
                <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
              </td>
              <td>
                29
              </td>
            </tr>
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
             <tr> 
               <td style="padding: 16px 15px">
                   <a href="#!" class="btn btn-sm btn-info" style="display: block">Ver</a>
               </td>
               <td style="padding-left:0px; padding-right:0px">
                   <a href="#!" class="btn btn-sm btn-success" style="display: block">Actualizar</a>
               </td>
               <td style="padding: 16px 15px">
                   <a href="#!" class="btn btn-sm btn-default" style="display: block">Eliminar</a>
               </td>
       
             </tr>
             <tr> 
               <td style="padding: 16px 15px">
                   <a href="#!" class="btn btn-sm btn-info" style="display: block">Ver</a>
               </td>
               <td style="padding-left:0px; padding-right:0px">
                   <a href="#!" class="btn btn-sm btn-success" style="display: block">Actualizar</a>
               </td>
               <td style="padding: 16px 15px">
                   <a href="#!" class="btn btn-sm btn-default" style="display: block">Eliminar</a>
               </td>
              
             </tr>
           </tbody>
         </table>
       </div>
     </div> 
   </div> 
</div>
@endsection
