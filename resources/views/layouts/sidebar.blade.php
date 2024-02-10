<aside id="sidebar" class="sidebar">

    <i class="bi bi-x-lg toggle-sidebar-btn d-block d-sm-block d-md-block d-lg-block d-xl-none"></i>

    <div class="sidebar-header">
        <a href="#">
            <img src="/assets/img/logo.png" class="sidebar-logo" alt="" />
        </a>
    </div>

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">HOME</li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard') ? '' : 'collapsed' }}" href="{{ url('/dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>


        <li class="nav-heading">MENU</li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('users') ? '' : 'collapsed' }}" href="{{ url('/users') }}">
                <i class="bi bi-person"></i>
                <span>User Management</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('tenants') ? '' : 'collapsed' }}" href="{{ url('/tenants') }}">
                <i class="bi bi-house"></i>
                <span>Tenants Management</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('dormitories') ? '' : 'collapsed' }}" href="{{ url('/dormitories') }}">
                <i class="bi bi-house"></i>
                <span>Dorm Management</span>
            </a>
        </li>

        <li class="nav-heading">USER</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('profile') ? '' : 'collapsed' }}" href="{{ url('/profile') }}">
                <i class="bi bi-person-gear"></i>
                <span>Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('subscription') ? '' : 'collapsed' }}" href="{{ url('/subscription') }}">
                <i class="bi bi-credit-card-2-back"></i>
                <span>Subscription</span>
            </a>
        </li>
    </ul>

</aside>
