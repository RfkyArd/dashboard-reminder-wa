 <!-- Sidebar -->
<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <!-- Brand logo -->
        <a class="navbar-brand" href="index.html">
            <img src="{{ asset('admin_assets/images/brand/logo/logo.svg') }}" alt="" />
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link has-arrow "
                    href="index.html">
                    <i data-feather="home" class="nav-icon icon-xs me-2"></i>User Dashboard
                </a>

            </li>


            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">Menu</div>
            </li>
            <li class="nav-item">
                <a class="nav-link "
                    href="{{ route('reminders.index') }}">
                    <i data-feather="clock" class="nav-icon icon-xs me-2">
                    </i>
                    Reminders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link "
                    href="{{ route('messagelogs.index') }}">
                    <i data-feather="archive" class="nav-icon icon-xs me-2">
                    </i>
                    Message Logs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link "
                    href="{{ route('template.index') }}">
                    <i data-feather="sidebar" class="nav-icon icon-xs me-2">
                    </i>
                    Template Message
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link "
                    href="{{ route('users.index') }}">
                    <i data-feather="user" class="nav-icon icon-xs me-2">
                    </i>
                    My Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link "
                    href="pages/layout.html">
                    <i data-feather="settings" class="nav-icon icon-xs me-2">
                    </i>
                    Settings
                </a>
            </li>
        </ul>
    </div>
</nav>
