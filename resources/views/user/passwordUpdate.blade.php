@extends('layouts.panelBasic')
@section('title', 'password')

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
              <form role="form" method="POST" action="{{ route('updatePassword.user') }}">
                @csrf
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password" required autocomplete="new-password" value="{{Auth::user()->password}}">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Repeat Password" type="password" name="password_confirmation" required autocomplete="new-password" value="{{Auth::user()->password_confirmation}}">
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
