<html>
<head>
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!--
     <style>
         div {
             border: 2px solid blue;
         }
     </style>
     -->
</head>
<body>
<h1 class="jumbotron text-center">@yield('headline')</h1>

<div class="container-fluid">
    <div class=" ">
        @yield('content')
        {{-- <div  class="col-md-2">@yield('dashboard')</div>
         <div  class="col-md-8">@yield('content')</div> --}}
    </div>
</div>

</body>

</html>
