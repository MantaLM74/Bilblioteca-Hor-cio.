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
?>
<div class="davi">
<h1 class="titulx">Quem somos?</h1>
<p></p>
</div>
<?php
require_once "includes/foot.php";
?>
</body>
</html>