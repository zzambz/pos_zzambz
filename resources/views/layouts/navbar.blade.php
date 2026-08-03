<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">

    <a class="navbar-brand" href="{{ route('dashboard') }}">POS</a>

    <button class="navbar-toggler" type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        {{-- DASHBOARD --}}
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"
             href="{{ route('dashboard') }}">
             Dashboard
          </a>
        </li>

        {{-- USERS --}}
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}"
             href="{{ route('admin.users.index') }}">
             Users
          </a>
        </li>

        {{-- PRODUK --}}
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/produk*') ? 'active' : '' }}"
             href="{{ route('admin.produk.index') }}">
             Produk
          </a>
        </li>

        {{-- PENJUALAN --}}
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/penjualan*') ? 'active' : '' }}"
             href="{{ route('admin.penjualan.index') }}">
             Penjualan
          </a>
        </li>

      </ul>

      {{-- LOGOUT --}}
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">
          Logout
        </button>
      </form>

    </div>
  </div>
</nav>