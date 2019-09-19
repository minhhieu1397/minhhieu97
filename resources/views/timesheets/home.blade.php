@extends ('layouts.layout_timesheet')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div id="slides" class="carousel slide" data-ride="carousel">
			<ul class="carousel-indicators">
				<li data-target="#slides" data-slide-to="0" class="active">
				</li>
				<li data-target="#slides" data-slide-to="1" class="active"> 
				</li>
				<li data-target="#slides" data-slide-to="2" class="active"> 
				</li>
				<li data-target="#slides" data-slide-to="3" class="active"> 
				</li>
			</ul>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="/img/hinh11.jpg">
					<div class="carousel-caption item-inner">
						<h1 class="display-2">Company</h1>
						<h2 class="display-4">Welcome to the company</h2>
					</div>
				</div>
				<div class="carousel-item">
					<img src="/img/hinh13.jpg">
					<div class="carousel-caption">
						<h1 class="display-2">Company</h1>
						<h2 class="display-4">Welcome to the company</h2>
					</div>
				</div>
				<div class="carousel-item">
					<img src="/img/anh1.jpg">
					<div class="carousel-caption">
						<h1 class="display-2">Company</h1>
						<h2 class="display-4">Welcome to the company</h2>
					</div>
				</div>
				<div class="carousel-item">
					<img src="/img/anh1.jpg">
					<div class="carousel-caption">
						<h1 class="display-2">Company</h1>
						<h2 class="display-4">Welcome to the company</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>
		<!-- p -->
<div class="row">
	<div class="col-md-5 offset-md-1">
		<div>
			<p class="timsheet-p">Quê nội của em đẹp bởi có con sông chảy qua làng. Quanh năm cần mẫn, dòng sông chở nặng phù sa bồi đắp cho ruộng lúa. Buổi sớm tinh mơ, dòng nước mờ mờ phẳng lặng chảy. Giữa trưa, mặt sông nhấp nhô ánh bạc lẫn màu xanh nước biếc. Chiều tà, dòng nước trở thành màu khói trong, hơi tối âm âm. Hai bên bờ sông, luỹ tre làng nối vai nhau che rợp bóng mát cho đôi bờ. Sông đẹp nhất vào những đêm trăng. Bóng trăng lồng vào nước, luỹ tre làng in bóng trên dòng sông, vài chiếc thuyền neo trên bờ cát. Cảnh vật hữu tình đẹp như tranh vẽ.</p>
		</div>
	</div>
	<div class="col-md-6">
		<div>
			<img src="/img/images22.jfif" height="200px" width="100%">
		</div>
	</div>
</div>
@stop()