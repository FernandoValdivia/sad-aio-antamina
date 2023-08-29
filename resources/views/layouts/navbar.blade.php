<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-lg-0 position-fixed">
    {{-- Logo --}}
    <a id="sadlogo" class="navbar-brand" href="/"></a>
    {{-- End Logo --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Inicio</a>
            <a href="/resumen" class="nav-item nav-link {{ Request::is('resumen*') ? 'active' : '' }}">Resumen</a>
            <div class="dropwdown-container">
                <a href="/brechas" class="nav-item nav-link {{ Request::is('brechas*') ? 'active' : '' }}" onclick="onLoad()">Brechas</a>
                <div class="drop-menu">
                    <a href="/reduccion" class="nav-item nav-link drop-item {{ Request::is('reduccion*') ? 'active' : '' }}" onclick="onLoad()">Reducción</a>
                </div>
            </div>
            <a href="/proyectos" class="nav-item nav-link {{ Request::is('proyectos*') ? 'active' : '' }}">Proyectos</a>
            <a href="/recursos" class="nav-item nav-link {{ Request::is('recursos*') ? 'active' : '' }}">Recursos</a>
            <a href="/potencialidades" class="nav-item nav-link {{ Request::is('potencialidades*') ? 'active' : '' }}">Potencialidades</a>
            <div class="dropwdown-container">
                <a href="#reportes" class="nav-item nav-link {{ Request::is('reporte*') ? 'active' : '' }}">Reportes</a>
                <div class="drop-menu">
                    <a href="#coyuntura" class="nav-item nav-link drop-item {{ Request::is('coyuntura*') ? 'active' : '' }}">Coyuntura</a>
                    <a href="#general" class="nav-item nav-link drop-item {{ Request::is('general*') ? 'active' : '' }}">Desarrollo</a>
                    <a href="/reporte" class="nav-item nav-link drop-item {{ Request::is('reporte*') ? 'active' : '' }}">Brechas</a>
                </div>
            </div>
            <button class="nav-item nav-link nav-modal" onclick="abrirModal2()">Simulación</button>
            {{-- Dark/Light Mode --}}
            <div class="btn-switch">
                <button class="switch" id="switch">
                    <span><i class="fas fa-sun"></i></span>
                    <span><i class="fas fa-moon"></i></span>
                </button>
            </div>
        </div>
    </div> 
</nav>
<!-- Navbar End -->
{{-- Switch Dark/Light Mode --}}
<script src="{{ asset('js/switch.js') }}"></script>