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
	$sqllivros = mysqli_query($conn, "SELECT * FROM livros ORDER BY id_livro DESC");
	$n = mysqli_num_rows($sqllivros);
	$x=1;
	?>
	
	<div class="page-top-info">
		<div class="container">
			<h4>Adicionados Recentemente</h4>
			<div class="site-pagination">
				<a href="index.php">Home</a>
			</div>
		</div>
	</div>
	<div class="master">
	<section class="category-section spad">
	<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
	<div class="row">
		<?php while($x<=$n){
			$rslivros = mysqli_fetch_array($sqllivros);?>
			<div class="col-lg-4 col-sm-6">
		<div class="product-item">
					<div class="pi-pic">
	<img height="400px"src="img/<?php echo $rslivros['img_livro'];?>" alt="">
	<div class="pi-links">
							<a href="peca.php?id_livro=<?php echo $rslivros['id_livro']; ?>"class="add-card"><i>+</i><span>Saber mais</span></a>
							<div class="space"></div>
							<!--<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>-->
						</div>
					</div>	
		<div class="pi-text"><?php echo limitar($rslivros['nm_livro'],17	);?></div>
				
		</div>
		</div>
	<?php
	$x++; }
	?>
	</div>
	</div>
	</section>
	</div>
	<?php require_once"includes/foot.php"; ?>
</body>
</html>
