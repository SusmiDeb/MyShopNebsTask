<div class="topbar">
    <!-- Mobile menu (offcanvas) -->
    <button class="btn d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mSidebar" aria-label="Open menu">
        <i class="bi bi-list fs-4"></i>
    </button>

    <!-- Walkthrough -->
    <button id="startTourBtn" class="btn btn-sm btn-primary">Start Walkthrough</button>

    <!-- Search -->
    <div class="search">
        <i class="bi bi-search"></i>
        <input id="searchInput" placeholder="Search products, tools, or messages…">
    </div>

    <div class="d-none d-md-flex gap-2 ms-auto">
        

      


        <!-- Theme toggle -->
        <button id="themeToggle" class="icon-btn" aria-label="Toggle theme" title="Toggle theme"></button>

        <!-- Notifications -->
        <button class="icon-btn"><i class="bi bi-bell"></i></button>

        <!-- Profile dropdown -->
        <div class="dropdown">
            <button class="icon-btn" id="userMenuBtn" data-bs-toggle="dropdown" aria-expanded="false"
                aria-label="Account menu">
                <i class="bi bi-person-circle"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end usermenu" aria-labelledby="userMenuBtn">
                <li class="px-3 py-2 border-bottom usermenu-header">
                    <div class="fw-semibold">{{ Auth::user()->name ?? 'User' }}</div>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="bi bi-person me-2"></i> Profile
                    </a>
                </li>
                {{-- <li>
                                <a class="dropdown-item" href="{{ route('settings.index') }}">
                                    <i class="bi bi-gear me-2"></i> Settings
                                </a>
                            </li> --}}
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i> Sign out
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
