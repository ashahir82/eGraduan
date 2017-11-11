<html lang="ms">
	<head>
	<title>Sistem Semakan Graduan - ILPKL</title>
	<meta name="keywords" content="">
	<meta name="description" content="Sistem Semakan Graduan (eGraduan) adalah aplikasi secara talian untuk orang awam menyemak maklumat graduan yang menamatkan latihan di Institut Latihan Perindustrian Kuala Lumpur (ILPKL)">
	<link rel="icon" href="favicon.ico">
	<meta name="robot" content="index,nofollow">
	<meta name="copyright" content="Hak Milik Terpelihara© 2017 ILPKL">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/custom.css" rel="stylesheet" type="text/css">
</head>
<body>
	<!-- As a heading -->
	<nav class="navbar navbar-inverse navbar-default navbar-static-top">
		<h1 class="v4-tease">Sistem Semakan Graduan - ILPKL</h1>
		<div class="navbar navbar-default navbar-inverse navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand"><img height="25" alt="Brand" src="images/logo.png"></a>
				</div>
				<div class="collapse navbar-collapse" id="navbar-ex-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="" target="_self"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span> Portal ILPKL</a>
						</li>
						<li class="active">
							<a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Utama</a>
						</li>
						<li>
							<?php
							if (logged_in() === true) {
								echo '<a href="index.php?p=logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Keluar</a>';
							} else {
								echo '<a href="index.php?p=login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Log Masuk</a>';
							}
							?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
</body>
</html>