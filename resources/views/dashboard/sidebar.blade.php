<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.dashboard') }}">
      <i class="icon-grid menu-icon"></i>
    <span class="menu-title">Dashboard</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.pengaduan.index') }}">
     <i class="mdi mdi-message-alert menu-icon"></i>
    <span class="menu-title">Pengaduan</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.users.index') }}">
        <i class="mdi mdi-account-group menu-icon"></i>
    <span class="menu-title">User</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.laporan.pengaduan') }}">
    <i class="mdi mdi-file-chart menu-icon"></i>
    <span class="menu-title">Laporan Pengaduan</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('logout') }}"
     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="mdi mdi-logout menu-icon"></i>
      <span class="menu-title">Logout</span>
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
</li>
