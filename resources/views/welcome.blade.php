<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        
            <div class="content">
                <div id="app">
                    <div class="container">
                        <calculator-component></calculator-component>
                        

                    </div>
                </div>    
            </div>
        <script src="{{ asset('js/app.js')}}"></script>
    </body>
</html>
