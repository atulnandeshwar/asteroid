<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Asteroid</title>
        <script></script>
        <!-- <script> window.Laravel = { csrfToken: {{csrf_token()}} }</script> -->
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href = {{ asset("css/bootstrap.min.css") }} rel="stylesheet" />


    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-danger mb-3 py-0">
          <div class="container">
                    <a href="/" class="navbar-brand">
                      Asteroid
                  </a>
                  <div>
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                          
                        </li>
                        <li>
                          
                        </li>
                        <li>
                          
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="app">

            <div class="container">
                <div class="row">
                    <asteroids></asteroids>   
                </div>
            </div>
        </div>
        <script src={{asset('js/app.js')}}></script>
    </body>
</html>
