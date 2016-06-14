<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="description" content="">
		<meta name="author" content="">

		<title></title>

		<!-- Bootstrap core CSS -->
		<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="bower_components/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="assets/css/quran.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

		<nav class="navbar navbar-default" id="header">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle Navigation</span>
						<span class="fa fa-bars"></span>
					</button>
					<a class="navbar-brand" href="#">Quran</a>
				</div>
				<div class="collapse navbar-collapse navbar-left">

				</div>
				<!-- nav-collapse -->
				
			</div>
			<!-- container -->
		</nav>
		<!-- header -->


		<nav class="navbar navbar-default" id="subheader">
			<div class="container">
				<h2 class="navbar-text">Surah Al-Fatihah</h2>
			</div>
			<!-- container -->
		</nav>
		<!-- subheader -->

		<div id="content">
			<div class="container">
				<?php 
					$rows = array(
								'Dengan menyebut nama Allah Yang Maha Pemurah lagi Maha Penyayang.',
								'Segala puji bagi Allah, Tuhan semesta alam.',
								'Maha Pemurah lagi Maha Penyayang.',
								'Yang menguasai di Hari Pembalasan.',
								'Hanya Engkaulah yang kami sembah, dan hanya kepada Engkaulah kami meminta pertolongan.',
								'Tunjukilah kami jalan yang lurus,',
								'(yaitu) Jalan orang-orang yang telah Engkau beri nikmat kepada mereka; bukan (jalan) mereka yang dimurkai dan bukan (pula jalan) mereka yang sesat.'
							);
				?>
				<table class="table">
					<?php $i=1; foreach($rows as $row): ?>
						<tr>
							<td class="col-num col-sm"><?php echo $i ?></td>
							<td><?php echo '<p>'.$row.'</p>' ?></td>
						</tr>
					<?php $i++; endforeach; ?>
				</table>



				<?php 
					$rows = array(
								'Al-Fatiha',
								'Al-Baqara',
								'Ali Imran',
								'An-Nisa',
							);
				?>
				<table class="table table-index">
					<thead>
						<tr>
							<td class="col-sound col-sm">S</td>
							<td class="col-bookmark col-sm">B</td>
							<td class="col-title">Title</td>
							<td class="col-juz col-sm">J</td>
							<td class="col-sajadah col-sm">SH</td>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach($rows as $row): ?>
							<tr>
								<td class="col-sound col-sm">S</td>
								<td class="col-bookmark col-sm"></td>
								<td class="col-title"><?php echo $row ?></td>
								<td class="col-juz col-sm"></td>
								<td class="col-sajadah col-sm"></td>
							</tr>
						<?php $i++; endforeach; ?>
					</tbody>
				</table>				
			</div>
			<!-- container -->
		</div>
		<!-- content -->

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="bower_components/bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
		

	</body>
</html>
