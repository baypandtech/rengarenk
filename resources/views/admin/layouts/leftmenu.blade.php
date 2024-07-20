@include('admin.layouts.swapmodal')

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/public/storage/{{ $genelayarlar->favicon }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/" class="d-block">{{ $user->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
 
          @if (!$user->root)
          @php
              $totalCompanies = App\Models\Member::count();
          @endphp
          
          <li class="nav-header">Hesabı Etkinleştir</li>
         
          <li class="nav-item">
            <a href="/aktivasyon" class="nav-link {{ Request::is('aktivasyon') ? 'active' : '' }}">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Aktivasyon
              </p>
            </a>
          </li>
          @else
          <li class="nav-header">Anasayfa</li>
    
          <li class="nav-item">
            <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Anasayfa
              </p>
            </a>
          </li>
          @endif

          <li class="nav-header">Genel Ayarlar</li>
          <li class="nav-item">
            <a href="/genel-ayarlar/ayarlar" class="nav-link {{ Request::is('genel-ayarlar/ayarlar') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cog fa-lg"></i>
              <p>Ayarlar</p>
            </a>
          </li>
          <li class="nav-item">
            <form id="logout-form" action="{{ route('cikis') }}" method="POST" style="display: none;">
              @csrf
          </form>
          
          <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt fa-lg"></i>
              <p>Çıkış Yap</p>
          </a>
          
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>