<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">Library</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{route('indexx')}}">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::is('books') ? 'active' : '' }}" href="{{route('books')}}">Katalog Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::is('categories') ? 'active' : '' }}" href="{{route('categories')}}">Kategori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::is('developers') ? 'active' : '' }}" href="{{route('developer')}}">Developers</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome back, {{ auth()->user()->username }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               <!--  <li><a class="dropdown-item" href="/dashboard/profile/index"><i class="bi bi-dash-square-dotted"></i> Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li> -->

                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    
                    <button type="submit" class="dropdown-item">
                      <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                  </form>
                </li>
              </ul>
            </li>
          @else
          <li class="nav-item">
            <a href="/login" class="nav-link {{ Route::is("login") ? 'active' : '' }}">
              <i class="bi bi-person-plus"></i>  
              LOGIN/REGISTER
            </a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
</nav>