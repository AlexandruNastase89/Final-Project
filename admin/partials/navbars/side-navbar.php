<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center my-4" href="/Final-Project/home.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <img class="logo-1-toggle-onclick" src="/Final-Project/assets/img/logo.png" alt="">
          <img class="logo-2-toggle-onclick logo-hide logo-size" src="/Final-Project/assets/img/logo-switch.png" alt="">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/Final-Project/admin/admin.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Store
    </div>

    <!-- Nav Item - Products Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
            <i class="fas fa-fw fa-store-alt"></i>
            <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/Final-Project/admin/content/list-products.php">List Products</a>
                <a class="collapse-item" href="/Final-Project/admin/content/add-products.php">Add Products</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Categories Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories" aria-expanded="true" aria-controls="collapseCategories">
            <i class="fas fa-fw fa-list"></i>
            <span>Categories</span>
        </a>
        <div id="collapseCategories" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/Final-Project/admin/content/list-categories.php">List Categories</a>
                <a class="collapse-item" href="/Final-Project/admin/content/add-categories.php">Add Category</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Media
    </div>

    <!-- Nav Item - Episodes Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEpisodes" aria-expanded="true" aria-controls="collapseEpisodes">
            <i class="fas fa-fw fa-tv"></i>
            <span>TV Series</span>
        </a>
        <div id="collapseEpisodes" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/Final-Project/admin/content/list-episodes.php">List Episodes</a>
                <a class="collapse-item" href="/Final-Project/admin/content/add-episodes.php">Add Episodes</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Soundtracks Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSoundtracks" aria-expanded="true" aria-controls="collapseSoundtracks">
            <i class="fas fa-fw fa-play-circle"></i>
            <span>Sountracks</span>
        </a>
        <div id="collapseSoundtracks" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/Final-Project/admin/content/list-soundtracks.php">List Sountracks</a>
                <a class="collapse-item" href="/Final-Project/admin/content/add-soundtracks.php">Add Sountracks</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Users
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="/Final-Project/admin/content/users.php">
            <i class="fas fa-fw fa-users"></i>
            <span>All users</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  <div class="fixed-bottom">
    <li class="nav-item">
      <a class="nav-link btn-danger" href="/Final-Project/login/logout.php">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Sign Out</span>
      </a>
    </li>
  </div>
</ul>
<!-- End of Sidebar -->
