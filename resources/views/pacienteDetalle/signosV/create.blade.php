@extends('layouts.panel')
@section('title', 'paciente')

@section('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')


<div class="row">
    <div class="col-md-12 mb-1 mt-4">
        <div class="card">

            <div class="card-body" style="display: flex; justify-content: space-between">
              @if(isset($signoV) && is_object($signoV))
                <h1 style="display:inline">EDITAR REGISTRO</h1>
        
              
              @else
                <h1 style="display:inline">CREAR REGISTRO</h1>
                
              @endif
              
              <a class="h4 mb-0 text-default text-uppercase d-none d-lg-inline-block" style="margin-left: 40px justify-content: end" href="{{route('home')}}">
                  <i class="fas fa-notes-medical" style="font-size: 24px"></i>
              </a>
            </div>
            @if($errors->any())
              @foreach($errors->all() as $error)
                
                <div class="alert alert-danger ml-4 mr-4" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> <strong> Error!</strong> {{$error}}
                </div>
                  
              @endforeach
    
            @endif
        </div>

    </div>
</div>
        
<div class="row mt-2" >
  <div class="col-xl-12 mb-5 mb-xl-0">
    <div class="card shadow">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">SIGNOS VITALES</h3>
          </div>
          <div class="col text-right">
              <a href="{{route('signosVitales.index',['signosVitales'=>$paciente->id])}}" class="btn btn-outline-default">
                <span class="btn-inner--icon mr-2"><i class="ni ni-book-bookmark"></i></span>
                Historial
            </a>  
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{isset($signoV)? route('signosVitales.update',['signosVitales'=>$signoV->id]) : route('signosVitales.store')}}" method="POST"> <!-- Ojo ['paciente'=>$signoV->id]) en el array asociativo su nombre debe ser igual al nombre del parametro que se establece en la ruta-->
        
        <!--metodo POST está dando problemas ya que no es aceptado por la ruta de paciente.update , seguramente se necesita un metodo PUT o PACH pero hay que ver como hacer la condición por si es actualizar o crear -->
          @csrf
          @if(isset($signoV) && is_object($signoV))
                
                  @method('PUT')
        
          @endif
            <div class="row mt-2 flex-grow-1">
                 
                <input type="hidden" name="paciente_id" value="{{$paciente->id}}" />
                
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="presionArS">Presión arterial sistólica</label>
                    <input type="text" name="presionArS" class="form-control" value="{{$signoV->presionArS ?? old('presionArS')}}" placeholder="mmHg"> 
                </div>
    
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="presionArD">Presión arterial diastólica</label>
                    <input type="text" name="presionArD" class="form-control" value="{{$signoV->presionArD ?? old('presionArD')}}" placeholder="mmHg">
                </div>

                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="presionArM">Presión arterial media</label>
                    <input type="text" name="presionArM" class="form-control" value="{{$signoV->presionArM?? old('presionArM')}}" placeholder="mmHg"> 
                </div>
    
                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="temperatura">Temperatura</label>
                    <input type="text" name="temperatura" class="form-control" value="{{$signoV->temperatura ?? old('temperatura')}}" placeholder="C°">
                </div>

                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="frecuenciaRes">Frecuencia respiratoria</label>
                    <input type="text" name="frecuenciaRes" class="form-control" value="{{$signoV->frecuenciaRes ?? old('frecuenciaRes')}}" placeholder="resp/min">
                </div>

                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="frecuenciaCar">Frecuencia cardiaca</label>
                    <input type="text" name="frecuenciaCar" class="form-control" value="{{$signoV->frecuenciaCar ?? old('frecuenciaCar')}}" placeholder="lat/min">
                </div>

                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="saturacionOxi">Saturación de oxigeno</label>
                    <input type="text" name="saturacionOxi" class="form-control" value="{{$signoV->saturacionOxi ?? old('saturacionOxi')}}" placeholder="%">
                </div>
            </div>

            <div class="mt-3 mb-4">
              <h3 class="mb-0">DATOS ANTROPOMETRICOS</h3>
            </div>

            <div class="row mt-2 flex-grow-1">

                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="peso">Peso</label>
                    <input type="text" name="peso" class="form-control" value="{{$paciente->peso ?? old('peso')}}" placeholder="kg">
                </div>

                <div class="form-group flex-grow-1 ml-2 mr-2">
                    <label for="talla">Talla/estatura</label>
                    <input type="text" name="talla" class="form-control" value="{{$paciente->talla ?? old('talla')}}" placeholder="m">
                </div>

                <div class="form-group flex-grow-1 ml-2 mr-2">
                      <label for="iMC">I.M.C</label>
                      <input type="text" name="iMC" class="form-control" value="{{$signoV->iMC ?? old('iMC')}}" placeholder="0.0">
                </div>

                <div class="form-group flex-grow-1 ml-2 mr-2">
                      <label for="perimetroAbdominal">Perimetro abdominal</label>
                      <input type="text" name="perimetroAbdominal" class="form-control" value="{{$signoV->perimetroAbdominal ?? old('perimetroAbdominal')}}" placeholder="cm">
                </div>

            </div>

            <div class="mt-3 mb-4">
              <h3 class="mb-0">MEDICIONES CAPILARES</h3>
            </div>
            <div class="row mt-2 flex-grow-1">

                <div class="form-group flex-grow-1 ml-2 mr-2">
                      <label for="glucosaCapilar">Glucosa capilar</label>
                      <input type="text" name="glucosaCapilar" class="form-control" value="{{$signoV->glucosaCapilar ?? old('glucosaCapilar')}}" placeholder="">
                </div>

                <div class="form-group flex-grow-1 ml-2 mr-2">
                      <label for="vHemoglobina">Valor hemoglobina</label>
                      <input type="text" name="vHemoglobina" class="form-control" value="{{$signoV->vHemoglobina ?? old('vHemoglobina')}}" placeholder="">
                </div>

                <div class="form-group flex-grow-1 ml-2 mr-2">
                      <label for="vHemoglobinaC">Valor de hemoglobina corregido</label>
                      <input type="text" name="vHemoglobinaC" class="form-control" value="{{$signoV->vHemoglobinaC ?? old('vHemoglobinaC')}}" placeholder="">
                </div>
            </div>


            <button type="submit" class="btn  btn-lg btn-block" style="background-color: #2dcebd; color: white"><i class="ni ni-send"></i>{{isset($signoV) && is_object($signoV)? ' Editar registro':' Crear registro'}}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <!-- script para campo select multiple de create lugarA -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection