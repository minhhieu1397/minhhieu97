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
		<div class="navbar navbar-expand-lg navbar-dark static-top login-title">
			<img src="https://www.designbold.com/academy/wp-content/uploads/2018/06/Trial-Logo-1.png" width="120" height="120">
			<p class="men-vintage">Men vintage</p>
		</div>
	</header>
  <!-- Page Content -->	
	<div class="container-fluid">
		@yield ('content')
	</div>
</body>

</html>