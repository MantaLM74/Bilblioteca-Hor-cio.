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
<title> Temas </title>
</head>
<body>
<?php if(isset ($_SESSION['admin']))
{
	require_once "includes/headmin.php";
}
else{
require_once  "includes/head.php"; 
}
	$idtemas = $_GET['idtemas'];
	$sqllivros = mysqli_query($conn, "SELECT * FROM livros WHERE id_temas = $idtemas");
	$sqltemas = mysqli_query($conn, "SELECT * FROM temas WHERE id_temas = $idtemas");
	$rsnmtema = mysqli_fetch_array($sqltemas);

	$n = mysqli_num_rows($sqllivros);
	$x=1; 
	?>
	<div class="page-top-info">
		<div class="container">
			<h4><?php echo $rsnmtema['nm_temas']?></h4>
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
					<img height="400px" src="img/<?php echo $rslivros['img_livro'];?>" alt="">
					<div class="pi-links">
							<a href="peca.php?id_livro=<?php echo $rslivros['id_livro']; ?>"class="add-card"><i>+</i><span>Saber mais</span></a>
							<div class="space"></div>
						</div>
				</div>
						<div class="pi-text">
							
							<p><?php echo $rslivros['nm_livro'];?></p>
						</div>
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
	<?php require_once"includes/js.php"; ?>
</body>
</html>
