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
<ul class="navbar navbar-expand-lg bg-success">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Painel de Administração</a>
        </li>
      </ul>
      <form class="form-inline ml-auto">
          <div class="form-group has-white">
            <input type="text" class="form-control mr-5" placeholder="Pesquisar">
          </div>
      </form>
    </div>

  </ul>
  <ul class="navbar navbar-expand-lg">
  </ul>
  <ul class="navbar navbar-expand-lg">
  <li class="nav-item">
      <div class="row">
          <div class="col-12">
              <a class="navbar-brand" href="/agenda">
                  <img src="{{asset('assets/img/logo/mbaquimicalogo.png')}}" alt="Logo" height="120px">
              </a>
          </div>
      </div>
  </li>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">Início</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cadastros
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('produtos.index') }}">Produtos</a>
          <a class="dropdown-item" href="{{ route('carrossel.index') }}">Carrossel</a>
          <a class="dropdown-item" href="{{ route('categorias.index') }}">Categorias</a>
          <a class="dropdown-item" href="{{ route('company.index') }}">Dados da Empresa</a>
          <a class="dropdown-item" href="{{ route('blog.index') }}">Posts</a>
        </div>
      </li>
      <li class="nav-item">
        {{-- <a class="nav-link" href="#">Posts</a> EM DESENVOLVIMENTO --}}
        <a class="nav-link" href="{{ route('pages.index') }}">Retornar ao Site Principal</a>
      </li>
    </ul>
  </div>

</ul>


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
