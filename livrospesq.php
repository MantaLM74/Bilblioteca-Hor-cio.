<?php

	session_start();
	
	require_once "includes/conexao.php";		
?>
<html>
<head>
<title>Athenas</title>
<link type="text/css" href="css/style.css" rel="stylesheet"/>
</head>	
<body>
<?php
if(isset ($_SESSION['admin']))
{
	require_once "includes/headmin.php";
}
else{
require_once  "includes/head.php"; 
}
require_once "includes/search.php";
?>


<div class="luiz">
<?php 
	$nmlivro = $_GET['search'];
	$sqllivros = mysqli_query($conn, "SELECT * FROM livros WHERE nm_livro LIKE '%$nmlivro%'");
	$n = mysqli_num_rows($sqllivros);
	$x=1; 
	while($x<=$n){
		$rsnmtema = mysqli_fetch_array($sqllivros);
		 ?>
		<div class="contest">
		<div class="imglivro">
	<img height="190px" width="160px" src="img/<?php echo $rsnmtema['img_livro'];?>">
	</div>
	<div class="contindex">
<?php
	echo limitar($rsnmtema['nm_livro'],17);
	$x++;
?>
	</div>
	<div class="butt">
	<a href="peca.php?id_livro=<?php echo $rsnmtema['id_livro']; ?>"><img src="img/butt.png"></a>
	</div>
	</div>
	<?php }
	?>
	</div>
	<?php require_once "includes/foot.php" ?>
</body>
</html>


