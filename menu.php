<?php

	session_start();
	
	require_once "includes/conexao.php";	
if($_SESSION['admin']==0){
 ini_set('display_errors', 0 );
    error_reporting(0);
header("location:index.php");	
}	
?>
<html>
<head>
<title>Athenas</title>
<link type="text/css" href="css/style.css" rel="stylesheet"/>
</head>
<body>
<?php
require_once  "includes/headmin.php"; 
?>
<div class="gui">
<a  href="cadlivros.php"><h1>Cadastrar Livros</h1></a>
<p> Cadastre os livros da biblioteca para que os alunos possam ver</p>


</div>
<?php 
require_once "includes/foot.php";
?>
</body>
</html>