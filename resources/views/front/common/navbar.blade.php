<nav class="navbar navbar-expand-lg navbar-light   bg-secondary">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="./help" id="linkId" role="button" data-toggle="dropdown" aria-expanded="false" onmouseover="toggleDropdown('linkId')">
            Help
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./about">About</a> <!-- aria-disabled="true" tabindex="-1" -->
        </li>
      </ul>

      <!--
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      -->
      <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
          @auth
          <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
          @else
          <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

          @if (Route::has('register'))
          <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
          @endif
          @endauth
        </div>
        @endif

      </div>
    </div>
  </div>
</nav>

@yield('navbar')
<script>
  function toggleDropdown(id) {
    if ($(window).width() >= 768) {
      document.getElementById(id).removeAttribute('data-toggle');
    } else {
      if (element.hasAttribute('data-toggle') == 'false') {
        document.getElementById(id).setAttribute('data-toggle', 'dropdown');

      }
    }

  }
</script>