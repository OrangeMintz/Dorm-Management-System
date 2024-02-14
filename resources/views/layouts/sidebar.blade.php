<aside id="sidebar" class="sidebar">
    <i class="bi bi-x-lg toggle-sidebar-btn d-block d-sm-block d-md-block d-lg-block d-xl-none"></i>

    <div class="sidebar-header">
        <a href="#">
            <img src="/assets/img/logo.png" class="sidebar-logo" alt="" />
        </a>
    </div>

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">HOME</li>


        @if (Auth::user()->position == 'super admin')
            {{-- Display all menu items for super admin --}}
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
                <a class="nav-link {{ request()->is('employees') ? '' : 'collapsed' }}" href="{{ url('/employees') }}">
                    <i class="bi bi-person"></i>
                    <span>Employees</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('boarders') ? '' : 'collapsed' }}" href="{{ url('/boarders') }}">
                    <i class="bi bi-people"></i>
                    <span>Boarders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('tenants') ? '' : 'collapsed' }}" href="{{ url('/tenants') }}">
                    <i class="bi bi-house"></i>
                    <span>Tenants Management</span>
                </a>
            </li>
        @elseif(Auth::user()->position == 'tenant admin')
            {{-- Display only specific menu items for tenant admin --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->is('employees') ? '' : 'collapsed' }}"
                    href="{{ url('/employees') }}">
                    <i class="bi bi-person"></i>
                    <span>Employees</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('boarders') ? '' : 'collapsed' }}" href="{{ url('/boarders') }}">
                    <i class="bi bi-people"></i>
                    <span>Boarders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dormitories') ? '' : 'collapsed' }}"
                    href="{{ url('/dormitories') }}">
                    <i class="bi bi-house"></i>
                    <span>Dorm Management</span>
                </a>
            </li>
        @endif

        <li class="nav-heading">USER</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('profile') ? '' : 'collapsed' }}" href="{{ url('/profile') }}">
                <i class="bi bi-person-gear"></i>
                <span>Profile</span>
            </a>
        </li>

        {{-- Conditional rendering for subscription section --}}
        @if (Auth::user()->position != 'tenant admin')
            <li class="nav-item">
                <a class="nav-link {{ request()->is('subscription') ? '' : 'collapsed' }}"
                    href="{{ url('/subscription') }}">
                    <i class="bi bi-credit-card-2-back"></i>
                    <span>Subscription</span>
                </a>
            </li>
        @endif

        {{-- Conditional rendering for archives submenu --}}
        @if (Auth::user()->position != 'tenant admin')
            <li class="nav-heading">SETTINGS</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#"
                    aria-expanded="false">
                    <i class="bi bi-bag"></i><span>Archives</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="icons-nav" class="nav-content collapse {{ Request::is('users/archived*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('/users/archived') }}">
                            <i class="bi bi-circle"></i><span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/tenants/archived') }}">
                            <i class="bi bi-circle"></i><span>Tenants</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/dormitories/archived') }}">
                            <i class="bi bi-circle"></i><span>Dormitories</span>
                        </a>
                    </li>
                </ul>
        @endif
        </li>
    </ul>
</aside>
