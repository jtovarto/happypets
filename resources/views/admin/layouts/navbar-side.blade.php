<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="{{asset('admin/img/profile_small.jpg')}}" />
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                         </span> <span class="text-muted text-xs block">Administrador <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="" class="disabled">Perfil</a></li>
                        <li><a href="" class="disabled">Contactos</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    CX+
                </div>
            </li>
            <li>
                <a href="{{ route('dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li>
                <a><i class="fa fa-shopping-cart"></i> <span class="nav-label">Ordenes</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('orders-history') }}" >Historial de órdenes</a></li>
                    <li><a href="{{ route('orders-pending') }}">Registro de envíos</a></li>
                </ul>
            </li>
            <li>
                <a><i class="fa fa-pencil-square"></i> <span class="nav-label">Reportes</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('report-orders')}}">Reporte de órdenes</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>