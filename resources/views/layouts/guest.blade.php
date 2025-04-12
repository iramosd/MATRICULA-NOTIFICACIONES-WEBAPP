<!DOCTYPE html>
<html lang="en" class="form-screen">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Academias y Cursos</title>

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

  <meta name="description" content="Login - Academias y Cursos">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1920">
  <meta property="og:image:height" content="960">

</head>
<body>
<div id="app">
    @yield('content');
</div>
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
@livewireScripts
</body>
</html>
