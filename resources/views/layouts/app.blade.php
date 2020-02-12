<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!--Import Google Icon Font [Fonte: https://materializecss.com/getting-started.html] -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- configuração do Materialize [ ver no rodapé da página configurações jQuery ] -->
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/materialize/dist/css/materialize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"><!-- CTRL + SHIFT + D duplica linha -->

    <!-- ** O layout do Laravel vem com estilização do Bootstrap por padrão ** -->

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>-->
</head>
<body id="app-layout">
    <nav>
        <div class="nav-wrapper green">
            <div class="container">
              <a href="#!" class="brand-logo">Logo</a>
              <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                <li><a href="#">Home</a></li>
            </ul>
        </div>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li><a href="#">Home</a></li>
</ul>

@yield('content')

<script src="{{ asset('lib/jquery/dist/jquery.js') }}"></script>
<script src="{{ asset('lib/materialize/dist/js/materialize.js') }}"></script>
<script src="{{ asset('js/init.js') }}"></script><!-- CTRL + SHIFT + D duplica linha -->

<!-- JavaScripts padrão do Laravel -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}-->
</body>
</html>
