<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="min-vh-100">
    <header>
        <nav class="navbar navbar-expand align-items-center navbar-light shadow-lg" style="background: #125296;">
            <div class="container-fluid justify-content-start align-items-start ps-4">

                <a href="{{ route('home') }}" class="navbar-brand h1" style="color: white;">
                    AugusTOOL
                </a>
                <div>
                    <ul class="navbar-nav">
                        <li>
                            <a href="{{ route('funcionario.index') }}" class='nav-link' style="color: white; ">
                                Funcionários
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <main>
        @yield('content')
    </main>

    <footer class="footer mt-auto" style="width: 100%">
        <div class="text-center p-3" style="bottom: 0px; position: static; background: #1F456E; background: linear-gradient(330deg, rgba(31, 69, 110, 1) 26%, rgba(18, 82, 150, 1) 50%); color: white; width: 100%;">
            © August Tools
        </div>
    </footer>

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    </body>
</html>

{{--
    #008cb2
    #1F456E
    #508fa2
    #125296
--}}