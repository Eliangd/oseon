<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Oseon</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="colorHome">
    <!-- Importando JavaScritp -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>    
    <div>
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm navbarfade">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Oseon - Ordem de Serviço Online
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <!-- Botão do WhatsApp na Navbar -->
                        <li class="nav-item mr-3">
                            <a href="https://web.whatsapp.com/send?phone=5546988007697" class="btn btn-success" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                        </li>
                        <li class="nav-item">                            
                            <a class="nav-link" href="{{ url('home') }}">Acesso Restrito <i class="fas fa-sign-in-alt"></i></a>
                        </li>
                   </ul>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main class="py-4"> 
        <div class="text-white text-center" style="width: 100%; height: 40px; position: relative; bottom: 0; left: 0;">
            Todos os direitos reservados &copy; 2022
        </div>
    </div>
    
</body>
</html>

