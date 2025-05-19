<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
      <div class="container">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a></li>
            <li class="nav-item"><a href="{{ route('admin.berita.index') }}" class="nav-link">Berita</a></li>
            <li class="nav-item"><a href="{{ route('admin.paket-wisata.index') }}" class="nav-link">Paket Wisata</a></li>
            <!-- Tambah menu lain di sini -->
            <li class="nav-item">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
              </form>
              <a href="#" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Logout
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
