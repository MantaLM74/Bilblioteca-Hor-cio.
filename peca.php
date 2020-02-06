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

<title> Livro</title>
<script>
</script>
</head>
<body>

<?php if(isset ($_SESSION['admin']))
{
	require_once "includes/headmin.php";
}
else{
require_once  "includes/head.php"; 
}?>
<?php
	$idlivro = $_GET['id_livro'];
	$sqllivros = mysqli_query($conn, "SELECT * FROM livros WHERE id_livro = $idlivro");
	$n = mysqli_num_rows($sqllivros);
	$rsnmtema = mysqli_fetch_array($sqllivros);	
	$idtema=$rsnmtema['id_temas'];
	$idautor=$rsnmtema['id_autor'];
	$sqltemas= mysqli_query($conn, "SELECT * FROM temas WHERE id_temas = $idtema");
	$rsidtema = mysqli_fetch_array($sqltemas);
 ?>
<div class="page-top-info">
		<div class="container">
			<h4><?php echo $rsnmtema['nm_livro']?></h4>
			</div>
			</div>
	
	<section class="product-section">
		<div class="container">
			<div class="back-link">
				<a href="javascript: history.go(-1);">  Voltar para o menu</a>
			</div>
			<div class="row">
				<div class="col-lg-6">
						<img onclick="small()" onclick="big()" class="product-big-img" id="big" src="img/<?php echo $rsnmtema['img_livro']?>" alt="">
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title"><?php echo $rsnmtema['nm_livro']?></h2>
					<h3 class="p-price">Tema:<?php echo $rsidtema['nm_temas']?></h3>
				
				<h4 class="p-stock">Disposição de <span><?php $sqlex= mysqli_query($conn, "SELECT * FROM exemplar WHERE id_livro = $idlivro");
				$rsex=mysqli_fetch_array($sqlex);
				echo $rsex['qnt_exemplar'];?>
				exemplares no acervo</span></h4>
				
<?php
 if(isset ($_SESSION['reserva'])==1)
{
	?><a href="confreserv.php?id_livro=<?php echo $_GET['id_livro'] ?> "class="site-btn">Reservar agora</a><?php
}	
?>
					<div class="p-rating">
					</div>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Informações</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>Sinopse:<?php echo $rsnmtema['sin_livro'];?></p>
									<p>Editora:<?php echo $rsnmtema['edit_livro'];?></p>								
									<p>Autor:<?php $sqlex= mysqli_query($conn, "SELECT * FROM autor WHERE id_autor = $idautor");
				$rsex=mysqli_fetch_array($sqlex);
				echo $rsex['nm_autor'];?></p>								
								</div>
							</div>
						</div>
						</div>
					
				</div>
			</div>
		</div>
	</section>
	
	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>Livros Relacionados</h2>
			</div>
			<div class="product-slider owl-carousel">
			<?php	
			
	$x=0;
	$sqllivros = mysqli_query($conn, "SELECT * FROM livros WHERE id_temas = $idtema ORDER BY RAND()");
	while($x<=10){
		$txtsql = mysqli_fetch_array($sqllivros);
	?>
			
	<div class="product-item">	
	<div class="pi-pic">
	<img height="350px" width="50px"src="img/<?php echo $txtsql['img_livro'];?>">
	<div class="pi-links">
	<a href="peca.php?id_livro=<?php echo $txtsql['id_livro']?>" class="add-card"><i src="img/menu.png">+</i><span>Saber mais</span></a>
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
