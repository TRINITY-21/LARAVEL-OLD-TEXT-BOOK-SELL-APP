<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('Favicon.ico') }}">

    <link rel="shortcut icon" href="{{ asset('Favicon/Favicon1.png') }}" type="image/x-icon">
    <link rel="icon"href="{{ asset('Favicon/Favicon1.png') }}" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="{{asset ('css/bootstrap-notifications-1.0.3/dist/stylesheets/bootstrap-notifications.css')}}">

   
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', "BookWorm")}}</title>

    <!-- stylesheet for bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Icons -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- stylesheet for spinner -->
    <link href="{{ asset('css/submit.css') }}" rel="stylesheet">

    <!-- Stylesheet for font used -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
</head>
<body id="app">
    @include('inc.navbar')
    @include('inc.jumbotron')
    
    <div class="container">
            @include('inc.messages')
            @yield('content')
            @yield('scripts')
    </div>
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="{{ asset('js/app.js') }}"></script>
     <script src="{{ asset('js/Dialog.js') }}"></script>
     <script src="{{ asset('js/submit.js') }}"></script>
     <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
     <script>
         CKEDITOR.replace( 'article-ckeditor' );
     </script>
  


    <script src="https://js.pusher.com/3.1/pusher.min.js"></script>
    
</body>
</html>
