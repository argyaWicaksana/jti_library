<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <div class="me-3">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
    </div>
    <div class="logo">
      <h1><a href="/admin-dashboard" class="navbar-brand brand-logo" ><span>JTI E-Library</span></a></h1>
      <a class="navbar-brand brand-logo-mini" href="/dashboard">
        <img src="assets/img/logo.png" alt="logo" />
      </a>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-top text-end justify-content-end">
    <ul class="navbar-nav">
      <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
        
        
        <h1 class="welcome-text">Hello, <span class="text-black fw-bold">
            @php
             use App\Models\User;
             use Illuminate\Support\Facades\Auth;
             $admin = User::find(Auth::user()->id);
            @endphp
            @foreach(compact('admin') as $admin)
              {{ $admin->name }}
            @endforeach
        </span></h1>
       
        <h3 class="welcome-sub-text"></h3>
      </li>
      <li class="nav-item dropdown d-none d-lg-block user-dropdown">
        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          @php
          $pathImage = '';
          $admin->profile_picture ? ($pathImage = 'storage/' . $admin->profile_picture) : ($pathImage = 'picture/empty.png');
          @endphp
          <img class="img-xs rounded-circle"  src="{{ asset('' . $pathImage . '') }}" width="100" alt="Profile image">

        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            @php
              $pathImage = '';
              $admin->profile_picture ? ($pathImage = 'storage/' . $admin->profile_picture) : ($pathImage = 'picture/empty.png');
            @endphp
              <img class="img-xs rounded-circle"  src="{{ asset('' . $pathImage . '') }}" width="100" alt="Profile image">
            <p class="mb-1 mt-3 font-weight-semibold">
              @foreach(compact('admin') as $admin)
                {{ $admin->name }}
              @endforeach
            </p>
            <p class="fw-light text-muted mb-0"></p>
          </div>
            <a class="dropdown-item" href="{{ route('/logout') }}"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>{{ __('Logout') }}</a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>