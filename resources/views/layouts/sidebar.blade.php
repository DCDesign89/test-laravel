{{-- ✅ SIDEBAR --}}
<nav class="sidebar d-flex flex-column justify-content-between" style="height: 90vh;">
    <div>
        <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="/klanten" class="{{ request()->is('klanten*') ? 'active' : '' }}">Klanten</a>
        <a href="#">Instellingen</a>
    </div>

    <div class="mt-auto mb-3 px-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-light w-100">
                Uitloggen
            </button>
        </form>
    </div>
</nav>
