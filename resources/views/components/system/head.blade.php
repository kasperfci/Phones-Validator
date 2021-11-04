<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jumia - @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('/assets/system/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/assets/system/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->

  <link rel="stylesheet" href="{{asset('/assets/system/custom.css')}}">

     @yield('pagecss')
</head>
