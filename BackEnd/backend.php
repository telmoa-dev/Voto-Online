<?php
$cod_msg = 0;
$cod_msg = $_GET["cod_msg"];
?>

<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>

<div class="container">

<?php 
include 'funcoes.php';
cod_msg($cod_msg);
?>

<?php
include 'cabecalho.php';
?>
 
<?php
include 'menu_principal.php';
?>

<div class="jumbotron">
    <h1>Democracia e Liberdade!</h1>      
    <p>O Voto é um ato de Cidadania e de Liberdade! Exerca-o!</p>
</div>

<?php
include 'rodape.php';
?>
  
</div>

</body>

</html>