<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Dark Déco</title>

  @include('partials/headmaster');

  @yield('head');

</head>
<body>

  <header>
    @include('partials.header');
  </header>

  @yield('contenidoBody')

  <footer>
    @include('partials.footer');
  </footer>

  <!-- Scripts -->
  @include('partials.scripts')

</body>
</html>
