<?php

	session_start();
	
	require_once "includes/conexao.php";		
?>
<html>
<head>
	<link type="text/css" href="css/style.css" rel="stylesheet"/>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/styless.css"/>
<title> Athenas </title>
</head>
<body>
<?php if(isset ($_SESSION['admin']))
{
	require_once "includes/headmin.php";
}
else{
require_once  "includes/head.php"; 
}
	$sqllivros = mysqli_query($conn, "SELECT * FROM livros ORDER BY RAND()");
	$n = mysqli_num_rows($sqllivros);
	$x=1;
	?>
	
	<div class="page-top-info">
		<div class="container">
			<h4>Livros</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>Aleatório</h2>
			</div>
			<div class="product-slider owl-carousel">					
<?php	
	$x=0;
	$sqllivros = mysqli_query($conn, "SELECT * FROM livros ORDER BY  RAND() ");
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
<section class="top-letest-product-section">
<?php $sqltema = mysqli_query($conn, "SELECT * FROM temas ORDER BY  RAND() ");
$rstema=mysqli_fetch_array($sqltema);
$idtemas=$rstema['id_temas'];?>
		<div class="container">
			<div class="section-title">
				<h2><?php echo $rstema['nm_temas'];?></h2>
			</div>
			<div class="product-slider owl-carousel">					
<?php	
	$x=0;
	$sqllivros = mysqli_query($conn, "SELECT * FROM livros WHERE id_temas =$idtemas");
	while($x<=10){
		$txtsql = mysqli_fetch_array($sqllivros);
	?><div class="product-item">	
	<div class="pi-pic">
	<img height="400px"src="img/<?php echo $txtsql['img_livro'];?>">
	<div class="pi-links">
							<a href="peca.php?id_livro=<?php echo $txtsql['id_livro']?>" class="add-card"><i>+</i></i><span>Saber mais</span></a>
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
</section
	<?php require_once"includes/foot.php"; ?>
	<?php require_once"includes/js.php"; ?>
</body>
</html>
