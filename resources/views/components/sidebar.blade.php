<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky">
        <h6 class="sidebar-heading text-muted mt-sm-4 px-3">{{ __('Overall') }}</h6>
        <ul class="nav flex-column mb-4">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customers.index') }}">{{ __('Customers') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('projects.index') }}">{{ __('Projects') }}</a>
            </li>
        </ul>

        <h6 class="sidebar-heading text-muted px-3">{{ __('Settings') }}</h6>
        <ul class="nav flex-column mb-4">
            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link">{{ __('Logout') }}</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
