<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>@yield('title') || Exam</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      @stack('css')
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body class="hold-transition sidebar-mini">
      <div class="wrapper">
         @include('shared.header')
         @include('shared.sidebar')
         <div class="content-wrapper">
            @yield('content')
         </div>
         @include('shared.footer')
         <aside class="control-sidebar control-sidebar-dark"></aside>
      </div>
      <script src="{{asset('js/app.js')}}"></script>
      <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
      @stack('js')
   </body>
</html>
