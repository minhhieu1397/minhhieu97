<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"> 
</head>

<body>
  <!-- Navigation -->
  	<div class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  		  <h1 class="Timesheet">Timesheet	</h1>
  	</div>
    @include('partial/admin_nav')
<!-- Page Content -->	
  	<div class="container-fluid contentTimesheet">
  		  @yield('content')
  	</div>
</body>

</html>