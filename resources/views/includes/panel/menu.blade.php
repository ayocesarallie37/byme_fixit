@php
$role = Auth::user()->role;
@endphp

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        {{-- MENU PARA RESIDENTE --}}
        @if ($role === 'residente')
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-home mr-2"></i>
                <span class="menu-title">Panel de control</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-plus mr-2"></i>
                <span class="menu-title">Reportar incidencia</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-bars mr-2"></i>
                <span class="menu-title">Seguimiento incidencias</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-list-ul mr-2"></i>
                <span class="menu-title">Historial de incidencias</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-star mr-2"></i>
                <span class="menu-title">Evaluación de servicio</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-bell mr-2"></i>
                <span class="menu-title">Notificaciones</span>
            </a>
        </li>
        @endif

        {{-- MENU PARA TECNICO --}}
        @if ($role === 'tecnico')
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-home mr-2"></i>
                <span class="menu-title">Panel de control</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-check mr-2"></i>
                <span class="menu-title">Incidencias asignadas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-list mr-2"></i>
                <span class="menu-title">Actualización de estado</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-comment mr-2"></i>
                <span class="menu-title">Registro de evidencia</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-bell mr-2"></i>
                <span class="menu-title">Historial de trabajos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-bell mr-2"></i>
                <span class="menu-title">Notificaciones</span>
            </a>
        </li>
        @endif

        {{-- MENU PARA ADMINISTRADOR --}}
        @if ($role === 'administrador')
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-home mr-2"></i>
                <span class="menu-title">Panel de control</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-bars mr-2"></i>
                <span class="menu-title">Gestión de incidencias</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-plus mr-2"></i>
                <span class="menu-title">Asignar técnicos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-users mr-2"></i>
                <span class="menu-title">Gestión de usuarios</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-chart-bar mr-2"></i>
                <span class="menu-title">Reportes</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-bell mr-2"></i>
                <span class="menu-title">Notificaciones</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-tools mr-2"></i>
                <span class="menu-title">Configuración</span>
            </a>
        </li>
        @endif
        {{-- Menú para todes --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
                <i class="fas fa-sign-out-alt mr-2"></i>
                <form id="formLogout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <span class="menu-title">Cerrar Sesión</span>
            </a>
        </li>
    </ul>
</nav>