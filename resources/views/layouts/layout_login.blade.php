<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Timesheet</title>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"> 
</head>

<body>
	<header class="st-navbar">
		<div class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
			<h1 class="Timesheet hero-title">Timesheet</h1>
		</div>
	</header>
  <!-- Page Content -->	
	<div class="container">
		@yield ('content')
	</div>
</body>

</html>