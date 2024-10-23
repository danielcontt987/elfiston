<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html{
                font-family: "Montserrat" !important;
            }
       </style>

        <style>
            body {
                font-family: "Montserrat" !important;
                background-color: #f7f7f7 !important;
            }
            .v-card {
                border-radius: 0.8rem !important;
                margin-top: 0.5rem !important;
                margin-bottom: 0.5rem !important;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <v-app>
                <app></app>
            </v-app>
        </div>
        <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>
