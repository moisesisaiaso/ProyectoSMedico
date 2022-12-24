@extends('layouts.panelBasic')
@section('title', 'configuracion')


@section('content')

<div class="row">
  <div class="container mt--10 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card  shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
               @if($errors->any())
                <div class="text-center text-muted mb-2">
                    <h4>Se encontró el siguiente error.</h4>
                </div>

                <div class="alert alert-danger mb-4" role="alert">
                        {{$errors->first()}}
                </div>
               @elseif(session('message'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Success!</strong> {{session('message')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               @else
                <div class="text-center text-muted mb-4">
                    <small>Actualiza tus datos</small>
                </div>

               @endif
              <form role="form" method="POST" action="{{ route('update.user') }}" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" esto me permite mandar archivos por el formulario -->
                @csrf

                <div class="form-group image-user">
                 <!-- Avatar Form -->
                 @include('includes.panel.avatarForm')
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-secondary"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control bg-secondary" placeholder="Name" type="text" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-secondary">
                        <i class="ni ni-email-83"></i>
                      </span>
                    </div>
                    <input class="form-control bg-secondary" placeholder="Email" type="email" name="email" value="{{Auth::user()->email}}" required autocomplete="email">  <!-- {{Auth::user()->email}} esto me permite aaceder al objeto del usuario autenticado y atraves de este puedo obtener los valores de sus propiedades -->
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image_path" lang="en" name="image_path" style="cursor:pointer">
                      <label class="custom-file-label" for="customFileLang" style="cursor:pointer">Selecciona una image de Perfil</label>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-outline-success mt-4">Guardar cambios</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
