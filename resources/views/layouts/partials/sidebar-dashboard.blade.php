<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-prescription-bottle-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PDDPEG</div>
    </a>

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Charts -->
    @foreach ($menus as $menu)
        <li
            class="nav-item {{ in_array($menu['slug'], array_slice(explode('/', request()->url()), 3)) ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route($menu['url']) }}">
                {!! $menu['icon'] !!}
                <span>{{ $menu['name'] }}</span></a>
        </li>
    @endforeach

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
