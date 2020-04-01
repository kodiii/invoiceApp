<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">

</head>

<body>
    <header>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <h1 class='heading has-text-weight-bold is-size-4' style="padding: 10px;">Invoice App</h1>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a href='/invoices/create' class="button is-primary ">
                                <strong>NEW INVOICE</strong>
                            </a>
                            <a href='/invoices' class="button is-light">
                                <strong>ALL</strong>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </nav>
    </header>
    
    <div class="container is-fullhd">
        @yield('content')
    </div>

</body>

</html>