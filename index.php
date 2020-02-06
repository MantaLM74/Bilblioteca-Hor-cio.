<?php

	session_start();
	
	require_once "includes/conexao.php";		
?>
<html>
<head>
<title>Athenas</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/styless.css"/>
</head>
<body>
	<div id="preloder">
		<div class="loader"></div>
	</div>

<?php
if(isset ($_SESSION['admin']))
{
	require_once "includes/headmin.php";
}
else{
require_once  "includes/head.php"; 
}
require_once "includes/js.php";
?>
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="../tcc/img/1.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
						</div>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="../tcc/img/3.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
						</div>
					</div>
				</div>
			</div>
			</div>
			
</section>
<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>Novidades</h2>
			</div>
			<div class="product-slider owl-carousel">					
<?php	
	$x=0;
	$sqllivros = mysqli_query($conn, "SELECT * FROM livros ORDER BY  id_livro DESC ");
	while($x<=10){
		$txtsql = mysqli_fetch_array($sqllivros);
	?><div class="product-item">	
	<div class="pi-pic">
	<img height="400px"src="img/<?php echo $txtsql['img_livro'];?>">
	<div class="pi-links">
							<a href="peca.php?id_livro=<?php echo $txtsql['id_livro']?>" class="add-card"><i>+</i><span>Saber mais</span></a>
							<!--<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>-->
						</div>
	</div>	
		<div class="pi-text"><?php echo limitar($txtsql['nm_livro'],17	);?></div>

	</div>
<?php	$x++;
	}
?>
</div>
</div>
</section>
<?php 
require_once "includes/foot.php";
?>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>