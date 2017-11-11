<?php
include 'core/init.php';
?>
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
							<a href="/2015" target="_self"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span> Portal ILPKL</a>
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
	
	
	
	<footer class="section" id="footer">
		<!-- copyright , scrollTo Top -->
		<div class="footer-bar">
			<div class="container">
				<span class="copyright">Hakcipta Terpelihara <?php echo date("Y"); ?> © ILPKL.</span>
			</div>
		</div>
		<!-- copyright , scrollTo Top -->
		
		<!-- footer content -->
		<div class="footer-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-left">
						<h4>Penafian</h4>
						<p class="text-justify">Jabatan Tenaga Manusia dan Institut Latihan Perindustrian Kuala Lumpur
						adalah tidak bertanggungjawab bagi apa-apa kehilangan atau kerugian yang
						disebabkan oleh penggunaan mana-mana maklumat yang diperolehi dari laman
						web ini serta tidak boleh ditafsirkan sebagai ejen kepada, ataupun syarikat
						yang disyorkan oleh <?php echo ucwords(strtolower($cfg_institute)); ?>.</p>
					</div>
					<div class="col-sm-6 col-right">
						<h4 class="text-right">Pertanyaan</h4>
						<p class="text-right">Unit Peperiksaan Dan Persijilan (UPP)
						<br>Bahagian Kawalan Kualiti Latihan (BKKL),
						<br>Institut Latihan Perindustrian Kuala Lumpur
						<br>Jalan Kuchai Lama, 58200 W.P Kuala Lumpur
						<br>Tel : 03-7981 7495 / 7496 (samb : 129 / 130)
						<br>Fax : 03-7983 2987
						<br>Email : infoilpkl@jtm.gov.my</p>
					</div>
				</div>
			</div>
		</div>
		<!-- footer content -->
	</footer>
</body>
</html>