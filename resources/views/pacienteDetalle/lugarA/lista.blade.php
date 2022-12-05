@extends('layouts.panel')
@section('title', 'home')

@section('content')
<div class="row">
    <div class="col-md-12 mb-5">
        <div class="card">
            
            
            @if((session('status')))
            <div class="card-body">

                <div class="alert alert-success m-0" role="alert">
                    <span class="alert-icon">
                        <i class="ni ni-like-2"></i>
                    </span>
                    <span class="alert-text">
                        <strong>Éxito! </strong>{{ session('status') }}
                    </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              @else
            <div class= "card-body" style="display: flex; justify-content: space-between">
                <div>Lugar de Atención</div>
                <a class="h4 mb-0 text-default text-uppercase d-none d-lg-inline-block" style="margin-left: 40px justify-content: end" href="{{route('home')}}">
                    <i class="fas fa-notes-medical" style="font-size: 24px"></i>
                </a>

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
            <h3 class="mb-0">Lugares A</h3>
          </div>
          <div class="col text-right">
            <a href="{{route('lugarAtencion.create',['lugarAtencion'=>$paciente->id])}}" class="btn btn-sm btn-outline-success">Crear Registro</a>  
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Tipo de atención</th>
              <th scope="col">Lugar de atención</th>
              <th scope="col">Grupos prioritarios</th>
            </tr>
          </thead>
          <tbody>

            <!-- itera -->
          @foreach($lugaresA as $lugarA)
            <tr height="61px">
              <th scope="row">
                {{$lugarA->tipo_atencion}}
              </th>
              <td>
                {{$lugarA->lugar_atencion}}
              </td>
              <td>
                <i class="fas fa-burn text-danger mr-3"></i>{{$lugarA->grupo_prioritario}}
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
           @foreach($lugaresA as $i => $lugarA)
             
            @if($i < 4)<!-- esta condición me permite agrandar el ultimo tr de las acciones cuando hay 5 registros, esto por que al haber mas la tabla de "lugares" se alarga mientras que en "acciones" un un descompenso, de esta forma igualamos la altura con la tabla de acciones -->
            
            <tr> 
               <td style="padding: 16px 10px">
                   <a href="" class="btn btn-sm btn-info" style="display: block">Entrar</a>
               </td>
               <td style="padding-left:0px; padding-right:0px">
                   <a href="{{route('lugarAtencion.edit',['lugarAtencion'=>$lugarA->id])}}" class="btn btn-sm btn-success" style="display: block">Actualizar</a>
               </td>

               <td style="padding: 16px 10px; width: 20px">
                  <form action="{{route('lugarAtencion.destroy',['lugarAtencion'=>$lugarA->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                      
                      <button type="submit" class="btn btn-sm btn-default" style="display: block">Eliminar</button>
                  </form>
                </td>
            </tr>
            @else
            <tr style="height: 78px !important">  <!-- //OPCIONAL //* estos estilos son permiten ampliar el ultimo tr para poder alinearse con la tabla "lugares A" por el desbordamiento que se genere en el campo "grupos prioritarios" -->
               <td style="padding: 16px 10px">
                   <a href="" class="btn btn-sm btn-info" style="display: block">Entrar</a>
               </td>
               <td style="padding-left:0px; padding-right:0px">
                   <a href="{{route('lugarAtencion.edit',['lugarAtencion'=>$lugarA->id])}}" class="btn btn-sm btn-success" style="display: block">Actualizar</a>
               </td>

               <td style="padding: 16px 10px; width: 20px">
                  <form action="{{route('lugarAtencion.destroy',['lugarAtencion'=>$lugarA->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                      
                      <button type="submit" class="btn btn-sm btn-default" style="display: block">Eliminar</button>
                  </form>
                </td>
            </tr>
            @endif

          @endforeach


           </tbody>
         </table>
       </div>
       
      </div> 
    </div> 
    <!-- Enlace vista de paginación personalizada:  https://laravel.com/docs/9.x/pagination#customizing-the-pagination-view-->
    <div class="card-body"> 
        {{$lugaresA->links()}}
    </div>
</div>
@endsection
