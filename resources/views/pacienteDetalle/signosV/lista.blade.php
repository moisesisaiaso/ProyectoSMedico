@extends('layouts.panel')
@section('title', 'home')

@section('modal-delete')
<!-- bibliotecas de jquery y booststrap necesarias para el modal, deben estar ubicadas antes del contenido para que funcione -->
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
@endsection

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
                <div>Signos Vitales</div>
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
            <h3 class="mb-0">Signos V</h3>
          </div>
          <div class="col text-right">
            <a href="{{route('signosVitales.create',['signosVitales'=>$paciente->id])}}" class="btn btn-sm btn-outline-success">Crear Registro</a>  
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Presión arterial S</th>
              <th scope="col">Presión arterial D</th>
              <th scope="col">Presión arterial M</th>
              <th scope="col">Temperatura</th>
              <th scope="col">Frecuencia respiratoria</th>
              <th scope="col">Frecuencia cardiaca</th>
              <th scope="col">Saturación de oxigeno</th>
              <th scope="col">Peso</th>
              <th scope="col">Talla/estatura</th>
              <th scope="col">I.M.C</th>
              <th scope="col">Perimetro abdominal</th>
              <th scope="col">Glucosa capilar</th>
              <th scope="col">Valor hemoglobina</th>
              <th scope="col">Valor de hemoglobina corregido</th>
            </tr>
          </thead>
          <tbody>

            <!-- itera -->
          @foreach($signosV as $signoV)
            <tr height="61px">
              <th scope="row">
                {{$signoV->presionArS}} mmHg
              </th>
              <td>
                {{$signoV->presionArD}} mmHg
              </td>
              <td>
                <i class="ni ni-ungroup text-primary mr-3"></i>{{$signoV->presionArM}} mmHg
              </td>
              <td>
                {{$signoV->temperatura}} C°
              </td>
              <td>
                {{$signoV->frecuenciaRes}} resp/min
              </td>
              <td>
                {{$signoV->frecuenciaCar}} lat/min
              </td>
              <td>
                {{$signoV->saturacionOxi}} %
              </td>
              <td>
                {{$signoV->peso}} kg
              </td>
              <td>
                {{$signoV->talla}} m
              </td>
              <td>
                {{$signoV->iMC}}
              </td>
              <td>
                {{$signoV->perimetroAbdominal}} cm
              </td>
              <td>
                {{$signoV->glucosaCapilar}}
              </td>
              <td>
                {{$signoV->vHemoglobina}}
              </td>
              <td>
                {{$signoV->vHemoglobinaC}}
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
             @foreach($signosV as $i => $signoV)
             
             @if($i < 4)<!-- esta condición me permite agrandar el ultimo tr de las acciones cuando hay 5 registros, esto por que al haber mas la tabla de "lugares" se alarga mientras que en "acciones" un un descompenso, de esta forma igualamos la altura con la tabla de acciones -->
             <tr>

             @else
             <tr style="height: 78px !important">  <!-- //OPCIONAL //* estos estilos nos permiten ampliar el ultimo tr para poder alinearse con la tabla "lugares A" por el desbordamiento que se genere en el campo "grupos prioritarios" -->
             
            @endif 

               <td style="padding: 16px 10px">
                   <a href="{{route('signosVitales.show',['signosVitales'=>$signoV->id])}}" class="btn btn-sm btn-info" style="display: block">Entrar</a>
               </td>
               <td style="padding-left:0px; padding-right:0px">
                   <a href="{{route('signosVitales.edit',['signosVitales'=>$signoV->id])}}" class="btn btn-sm btn-success" style="display: block">Actualizar</a>
               </td>


               <!-- //* eliminar con modal -->
               <td style="padding: 16px 10px; width: 20px">
                  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-default" style="display: block" data-toggle="modal" data-target="#eliminarModal" data-id="{{$signoV->id}}"> <!-- data- es atributo que me permite enviar una variable al modal para poder ser accedida en ete caso envío la variable data-id -->
                      Eliminar
                    </button>
               </td>
            </tr>
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
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       
                      
                      <form action="{{route('signosVitales.destroy',1)}}"  data-action="{{route('signosVitales.destroy',1)}}" method="POST" id="form-delete">
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

           </tbody>
         </table>
       </div>
       
      </div> 
    </div> 
    <!-- Enlace vista de paginación personalizada:  https://laravel.com/docs/9.x/pagination#customizing-the-pagination-view-->
    <div class="card-body"> 
        {{$signosV->links()}}
    </div>
</div>
@endsection

