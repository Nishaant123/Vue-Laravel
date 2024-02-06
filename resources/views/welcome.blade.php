<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/js/app.js', 'resources/css/app.css'])
        <title>Laravel+Vue</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div id="app">
        <!-- <example-component></example-component> -->
        <!-- <two></two> -->
        <!-- <h1>vsvas</h1> -->
        <router-view></router-view>
        <!-- <child></child> -->
        </div>  
    </body>
</html> 