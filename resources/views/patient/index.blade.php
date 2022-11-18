@extends('layouts.panel')
@section('title', 'paciente')

@section('content')

<div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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

        
      <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
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
                    <th scope="col">Page name</th>
                    <th scope="col">Visitors</th>
                    <th scope="col">Unique users</th>
                    <th scope="col">Bounce rate</th>
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
                  </tr>
                  <tr height="61px">
                    <th scope="row">
                      /argon/charts.html
                    </th>
                    <td>
                      3,513
                    </td>
                    <td>
                      294
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                    </td>
                  </tr>
                  <tr height="61px">
                    <th scope="row">
                      /argon/tables.html
                    </th>
                    <td>
                      2,050
                    </td>
                    <td>
                      147
                    </td>
                    <td>
                      <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                    </td>
                  </tr>
                  <tr height="61px">
                    <th scope="row">
                      /argon/profile.html
                    </th>
                    <td>
                      1,795
                    </td>
                    <td>
                      190
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>


       

        <div class="col-xl-4.7">
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
                <thead class="thead-light">
                  <tr>
                    <th scope="col" colspan="3" height="42px"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr> 
                    <td>
                        <a href="#!" class="btn btn-sm btn-info">Ver</a>
                    </td>
                    <td>
                        <a href="#!" class="btn btn-sm btn-success">Actualizar</a>
                    </td>
                    <td>
                        <a href="#!" class="btn btn-sm btn-default">Eliminar</a>
                    </td>
                   
                  </tr>
                  <tr> 
                    <td>
                        <a href="#!" class="btn btn-sm btn-info">Ver</a>
                    </td>
                    <td>
                        <a href="#!" class="btn btn-sm btn-success">Actualizar</a>
                    </td>
                    <td>
                        <a href="#!" class="btn btn-sm btn-default">Eliminar</a>
                    </td>
                   
                  </tr><tr> 
                    <td>
                        <a href="#!" class="btn btn-sm btn-info">Ver</a>
                    </td>
                    <td>
                        <a href="#!" class="btn btn-sm btn-success">Actualizar</a>
                    </td>
                    <td>
                        <a href="#!" class="btn btn-sm btn-default">Eliminar</a>
                    </td>
                   
                  </tr><tr> 
                    <td>
                        <a href="#!" class="btn btn-sm btn-info">Ver</a>
                    </td>
                    <td>
                        <a href="#!" class="btn btn-sm btn-success">Actualizar</a>
                    </td>
                    <td>
                        <a href="#!" class="btn btn-sm btn-default">Eliminar</a>
                    </td>
                   
                  </tr><tr> 
                    <td>
                        <a href="#!" class="btn btn-sm btn-info">Ver</a>
                    </td>
                    <td>
                        <a href="#!" class="btn btn-sm btn-success">Actualizar</a>
                    </td>
                    <td>
                        <a href="#!" class="btn btn-sm btn-default">Eliminar</a>
                    </td>
                   
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </>
@endsection
