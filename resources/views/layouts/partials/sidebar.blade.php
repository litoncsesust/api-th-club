<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <li class="dashboard nav-item active">
    <a class="nav-link" href="{{ route('home') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Nav Item - User Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
      <i class="fas fa-users-cog"></i>
      <span>Brugere</span>
    </a>
    <div id="collapseUser" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('admin.index') }}">
          <i class="fas fa-list"></i> Brugerliste
        </a>
        <a class="collapse-item" href="{{ route('admin.create') }}">
          <i class="fas fa-plus"></i> Tilføj nyt brugere
        </a>   
      </div>
    </div>
  </li>
  <!-- Nav Item - Product Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">
      <i class="fas fa-luggage-cart"></i>
      <span>Produkt</span>
    </a>
    <div id="collapseProduct" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('product.index') }}">
          <i class="fas fa-list"></i> Produktliste
        </a>
        <a class="collapse-item" href="{{ route('product.create') }}">
          <i class="fas fa-plus"></i> Tilføj nyt produkt
        </a>
      </div>
    </div>
  </li>
  <!-- Nav Item - Report Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="true" aria-controls="collapseReport">
      <i class="fas fa-file-invoice-dollar"></i>
      <span>Rapport</span>
    </a>
    <div id="collapseReport" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('order.index') }}">Bestil</a>
      </div>
    </div>
  </li>
  <!-- Nav Item - Club Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClub" aria-expanded="true" aria-controls="collapseClub">
      <i class="fas fa-user-secret"></i>
      <span>Klub</span>
    </a>
    <div id="collapseClub" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('clubs.index') }}">
          <i class="fas fa-list"></i> Klubliste
        </a>
        <a class="collapse-item" href="{{ route('clubs.create') }}">
          <i class="fas fa-plus"></i> Tilføj ny klub
        </a>
      </div>
    </div>
  </li>
  <!-- Nav Item - Category Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
      <i class="fas fa-clipboard-list"></i>
      <span>Kategori</span>
    </a>
    <div id="collapseCategory" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('category.index') }}">
          <i class="fas fa-list"></i> Kategori liste
        </a>
        <a class="collapse-item" href="{{ route('category.create') }}">
          <i class="fas fa-plus"></i> Tilføj ny kategori
        </a>
      </div>
    </div>
  </li>
  <!-- Nav Item - Data Sync -->
  <li class="nav-item">
    <a class="nav-link" href="http://test.bordingvista.com/dev.th-club.com/update/?key=rvpkdpkBJGopOqO41VwF8KxfaG3zyS6w" target="_blank">
      <i class="fas fa-sync-alt"></i>
      <span>Datasynkronisering</span>
    </a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>