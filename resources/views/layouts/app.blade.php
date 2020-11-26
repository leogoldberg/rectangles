<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <title>{{config('app.name', 'RectanglesApp')}}</title>
        <style type="text/css"> 
            .btn-circle { 
                width: 50px; 
                height: 50px; 
                padding: 7px 10px; 
                border-radius: 25px; 
                text-align: center; 
            }
        </style> 
        @stack('styles')
        @stack('scripts')
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
