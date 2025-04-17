<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard - Academias y Cursos</title>

  @env(['staging', 'production'])
    @php
        $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
    @endphp
      <script type="module" src="/build/{{ $manifest['resources/js/app.js']['file'] }}"></script>
      <link rel="stylesheet" href="/build/{{ $manifest['resources/css/app.css']['file'] }}">
  @else
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endenv

  <link rel="stylesheet" href="css/main.css?v=1652870200386">
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>

  @livewireStyles

  <meta name="description" content="Dashboard - Academias y Cursos">
  <meta property="og:image:width" content="1920">
  <meta property="og:image:height" content="960">

</head>
<body>

<div id="app">

<nav id="navbar-main" class="navbar is-fixed-top">
  <div class="navbar-brand">
    <a class="navbar-item mobile-aside-button">
      <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
    </a>
    <div class="navbar-item">
      <div class="control"><input placeholder="Search everywhere..." class="input"></div>
    </div>
  </div>
  <div class="navbar-brand is-right">
    <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
      <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
    </a>
  </div>
  <div class="navbar-menu" id="navbar-menu">
    <div class="navbar-end">
      <div class="navbar-item dropdown has-divider has-user-avatar">
      @auth('guardian')
        <a class="navbar-link">
            <div class="user-avatar">
              <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="{{ Auth::guard('guardian')?->user()->name ?? 'Usuario' }}" class="rounded-full">
            </div>
          <div class="is-user-name"><span>{{ Auth::guard('guardian')?->user()->name ?? 'Usuario' }}</span></div>
        </a>
      @else 
        <a class="navbar-link" href="{{route('login')}}">
        <div class="is-user-name">Ingresar</div>
        </a>
      @endauth
      </div>
      @auth('guardian')
      <a title="Salir" class="navbar-item desktop-icon-only" href="{{route('logout')}}">
        <span class="icon"><i class="mdi mdi-logout"></i></span>
        <span>Salir</span>
      </a>
      @endauth
    </div>
  </div>
</nav>

<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      Academias y Cursos
    </div>
  </div>
  <div class="menu is-menu-main">
    <p class="menu-label">General</p>
    <ul class="menu-list">
      <li class="active">
        <a href="{{route('dashboard')}}">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Cursos</span>
        </a>
      </li>
    </ul>
    <ul class="menu-list">
      <li class="--set-active-tables-html">
        <a href="{{route('dashboard')}}">
          <span class="icon"><i class="mdi mdi-table"></i></span>
          <span class="menu-item-label">Academias</span>
        </a>
      </li>
      @auth('guardian')
      <li class="--set-active-forms-html">
        <a href="{{route('dashboard')}}">
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          <span class="menu-item-label">Matriculas</span>
        </a>
      </li>
      @endauth
    </ul>
  </div>
</aside>

  <section class="section main-section">
    @yield('content')
  </section>

  <footer class="footer">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
      <div class="flex items-center justify-start space-x-3">
        <div>
          © 2025, Copyright
        </div>
      </div>
    </div>
  </footer>

</div>

<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
@livewireScripts
</body>
</html>
