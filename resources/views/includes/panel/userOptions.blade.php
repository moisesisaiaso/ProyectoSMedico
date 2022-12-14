<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class=" dropdown-header noti-title">
        <h6 class="text-overflow m-0">Welcome!</h6>
    </div>
    <a href="{{route('perfil.user')}}" class="dropdown-item">
        <i class="ni ni-single-02"></i>
        <span>Mi perfil</span>
    </a>
    <a href="{{route('config.user')}}" class="dropdown-item">
        <i class="ni ni-settings-gear-65"></i>
        <span>Configuración</span>
    </a>
    <a href="{{route('password.user')}}" class="dropdown-item">
        <i class="ni ni-key-25"></i>
        <span>Password</span>
    </a>
    <a href="#" class="dropdown-item" data-container="body" data-toggle="popover" data-placement="left" data-content="Por favor diríjase con el administrador.">
        <i class="ni ni-support-16"></i>
        <span>Ayuda</span>
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
        <i class="ni ni-user-run"></i>
        <span>Cerrar sesión</span>
        <form action="{{route('logout')}}" method="POST" style="display: none;" id="formLogout">
            @csrf
         </form>
    </a>
</div>