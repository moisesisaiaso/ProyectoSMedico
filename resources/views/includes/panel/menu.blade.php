<!-- Heading -->
<h6 class="navbar-heading text-muted">Gestión</h6>
<ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="{{route('paciente.show',['paciente'=>$paciente->id])}}">
              <i class="ni ni-tv-2 text-danger"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{route('lugarAtencion.create',['lugarAtencion'=>$paciente->id])}}">
              <i class="ni ni-pin-3 text-blue"></i> Lugar de atención
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{route('motivoConsulta.create',['motivoConsulta'=>$paciente->id])}}">
              <i class="fas fa-bed text-warning"></i> Motivo de consulta
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{route('paciente.perfil',['paciente'=>$paciente->id])}}">
              <i class="ni ni-badge text-yellow"></i> Perfil del Paciente
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./examples/tables.html">
              <i class="ni ni-calendar-grid-58 text-red"></i> Antecedentes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('signosVitales.create',['signosVitales'=>$paciente->id])}}">
              <i class="ni ni-sound-wave text-info"></i> Signos vitales
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-bulb-61 text-success"></i> Diagnóstico
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-ruler-pencil text-default"></i> Tratamiento
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
              <i class="fas fa-sign-in-alt"></i> Cerrar sesión
            </a>
            <form action="{{route('logout')}}" method="POST" style="display: none;" id="formLogout">
            @csrf
            </form>
          </li>
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Documentación</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="ni ni-favourite-28"></i>Examen físico
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="ni ni-folder-17"></i> Resultado Examenes
    </a>
  </li>
</ul>
        