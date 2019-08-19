<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"> 
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center">Good morning {{$user->name}}</h1>
				<div>
					<p>It's time to create Timesheet. You need go to go Timesheet, crate Timesheet</p>
					<div> Thank you</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>