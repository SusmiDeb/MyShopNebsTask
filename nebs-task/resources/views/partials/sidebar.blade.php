<style>
    .nav-link.active {
        background: color-mix(in oklab, var(--brand) 16%, transparent);
        border: 1px solid var(--brand);
        color: var(--text);
        border-radius: 10px;
    }

    .subnav .nav-sublink.active {
        color: var(--text);
        font-weight: 600;
    }
</style>
@php
    // tiny helpers
    $is = fn($pattern) => request()->routeIs($pattern);
    $active = fn($pattern) => $is($pattern) ? 'active' : '';

    // submenu open state (extend these patterns as you add routes)
    $userMenuOpen = $is('profile.*') || $is('users.*');
@endphp

<aside class="sidebar d-none d-lg-flex flex-column" id="sidebar">
   

    <nav class="nav flex-column gap-1 mt-2 sidebar-menu">
        <a class="nav-link {{ $active('dashboard') }}" href="{{ route('dashboard') }}">
            <span class="nav-ico"><i class="bi bi-speedometer2"></i></span>
            <span>Dashboard</span>
        </a>

        <a class="nav-link {{ $active('earnings.*') }}" href="{{ route('orders.index') }}">
            <span class="nav-ico"><i class="bi bi-cash-coin"></i></span>
            <span>Orders</span>
        </a>

        <a class="nav-link {{ $active('messages.*') }}" href="#">
            <span class="nav-ico"><i class="bi bi-chat-left-text"></i></span>
            <span>Messages</span>
        </a>

        <a class="nav-link {{ $active('copilot.*') }}" href="{{ route('products.index') }}">
            <span class="nav-ico"><i class="bi bi-stars"></i></span>
            <span>Products</span>
        </a>

        

        {{-- Users (Admin) – collapsible --}}
        <a class="nav-link d-flex justify-content-between align-items-center {{ $userMenuOpen ? 'active' : '' }}"
            data-bs-toggle="collapse" href="#userMenu" role="button"
            aria-expanded="{{ $userMenuOpen ? 'true' : 'false' }}" aria-controls="userMenu">
            <span class="d-flex align-items-center gap-2">
                <span class="nav-ico"><i class="bi bi-people"></i></span>
                <span>Users {{ Auth::user()->name ?? 'User' }}</span>
            </span>
            <i class="bi bi-chevron-down small chevron"></i>
        </a>

        <div id="userMenu" class="collapse {{ $userMenuOpen ? 'show' : '' }}" data-bs-parent=".sidebar-menu">
            <nav class="nav flex-column ms-4 mt-1 subnav">
                <a class="nav-sublink {{ $active('profile.*') }}" href="{{ route('profile.edit') }}">
                    <i class="bi bi-person-circle me-2"></i> Profile
                </a>
                <hr class="my-2 border-0" style="border-top:1px solid var(--border)!important;">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-sublink w-100 text-start">
                        <i class="bi bi-box-arrow-right me-2"></i> Sign out
                    </button>
                </form>
            </nav>
        </div>

       
    </nav>

    <div class="mt-auto">
        <button class="btn btn-primary w-100 mt-3"><i class="bi bi-magic me-1"></i> New Project</button>
    </div>
</aside>
