@extends('layouts.form')

@section('title','Regístrate')

@section('content')
<div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
               @if($errors->any())
                <div class="text-center text-muted mb-2">
                    <h4>Se encontró el siguiente error.</h4>
                </div>

                <div class="alert alert-danger mb-4" role="alert">
                        {{$errors->first()}}
                </div>
               @else
                <div class="text-center text-muted mb-4">
                    <small>Ingresa tus datos</small>
                </div>

               @endif
              <form role="form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password" required autocomplete="new-password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Repeat Password" type="password" name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>

                <div class="text-center">
                <button type="submit" class="btn  btn-lg btn-block my-4" style="background-color: #525f7f; color: white">
                  <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                  <span class="btn-inner--text">Crear cuenta</span>
                  
                </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
