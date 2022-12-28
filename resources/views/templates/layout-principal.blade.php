<!doctype html>
<html lang="pt-br">
  <head>
    <title>Mbaquimica</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">


    <!-- CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/paper-kit.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/template-principal.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/template.css')}}" rel="stylesheet" />

    @yield('header')

  </head>
  <body>



<!--    navbar come here          -->
<nav class="navbar navbar-expand-lg bg-success navbarNav1 mb-3" id="navbarNav1">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav1">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('pages.historia') }}">História</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('pages.valores') }}">Valores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('pages.contato') }}">Contato</a>
        </li>
      </ul>
      <form class="form-inline ml-auto" action="{{ route('pages.search') }}" method="GET">
          <div class="form-group has-white">
            <input type="text" name="search" class="form-control mr-5" placeholder="Pesquisar">
          </div>
      </form>
    </div>
</nav>

  <nav class="navbar navbar-expand-lg mb-3 navbarNav2" id="navbarNav2">

      <div class="row">
          <div class="col-12">
              <a class="navbar-brand" href="{{ route('pages.index') }}">
                  <img src="{{asset('assets/img/logo/mbaquimicalogo.png')}}" alt="Logo" height="120px">
              </a>
          </div>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav2" aria-controls="navbarNav2" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
  <div class="collapse navbar-collapse" id="navbarNav2">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('pages.index') }}">Início <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('pages.catalogo') }}">Catálogo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('blog.clientes') }}">Blog</a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('pages.contato') }}">Contato</a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li>
    </ul>
  </div>

</nav>



<!-- end navbar  -->

<div class="wrapper">

  <div class="content" id="content">
    <div class="container" id="container">

    @yield('content')

    </div>
  </div>

</div>

<!-- Modal Bodies come here -->

<!--   end modal -->

</body>

<!-- Core JS Files -->
<script src="{{ asset('assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
{{-- <script src="./assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script> --}}
<script src="{{ asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>

<!-- Switches -->
<script src="{{ asset('assets/js/plugins/bootstrap-switch.js') }}"></script>

<!--  Plugins for Slider -->
<script src="{{ asset('assets/js/plugins/nouislider.min.js') }}"></script>

<!--  Plugins for DateTimePicker -->
<script src="{{ asset('assets/js/plugins/moment.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<!--  Paper Kit Initialization snd functons -->
<script src="{{ asset('assets/js/paper-kit.js')}}"></script>

{{-- Icones --}}
<script src="https://kit.fontawesome.com/80b78ce4b7.js" crossorigin="anonymous"></script>

@yield('js')

</html>
