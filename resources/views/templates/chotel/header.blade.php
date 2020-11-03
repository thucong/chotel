<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>CHotel | VinaEnter Edu</title>
<link rel="stylesheet" href="{{$publicUrl}}/css/style.css" type="text/css">
</head>
<body>
	<div class="page">
		<div class="header">
			<a href="index.php" id="logo"><img src="{{$publicUrl}}/images/logo.png" alt="logo"></a>
			<div>
				<div>
					<a href="http://vinaenter.edu.vn">Một dự án PHP tại VinaEnter Edu</a>
				</div>
				<div>
					<ul>
						<li class="selected">
						<a href="{{route('chotel.index.index')}}"><span>Trang chủ</span></a>
						</li>
						<li>
							<a href="{{route('chotel.about.about')}}"><span>Giới thiệu</span></a>
						</li>
						<li>
							<a href="{{route('chotel.room.index')}}"><span>Các phòng</span></a>
						</li>
						<li>
							<a href="{{route('chotel.contact.contact')}}"><span>Liên hệ</span></a>
						</li>
					</ul>
					<form action="{{route('chotel.index.search')}}" method="get">
						<input type="text" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Tìm phòng':this.value;" value="Tìm phòng" name="tukhoa">
						<input type="submit" value="">
					</form>
				</div>
			</div>
		</div>
		<div class="body">