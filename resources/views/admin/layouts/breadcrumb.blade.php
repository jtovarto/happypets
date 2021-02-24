<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>@yield('breadcrumb-title')</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            @yield('breadcrumb-links')
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>