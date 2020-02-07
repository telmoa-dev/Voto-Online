<?php

session_start();
if((!isset ($_SESSION['usr']) == true) and (!isset ($_SESSION['pwd']) == true))
{
  unset($_SESSION['usr']);
  unset($_SESSION['pwd']);
  header('location:index.php');
  }
 
$usr = $_SESSION['usr'];

$cod_msg = 0;
$cod_msg = $_GET["cod_msg"];

include 'liga_bd.php';

$sql = "SELECT estado_voto FROM eleitor where nif = ".$usr;

$estado_voto = 0;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
        $estado_voto = $row["estado_voto"];
		}
} else {
    echo "0 results";
}
	
$conn->close();

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

if ($estado_voto == 0) {

echo "<button type='button' class='btn btn-success btn-block btn-lg' onclick = window.location.href='votar.php'>VOTAR</button>";

}

else {
	
echo "<button type='button' class='btn btn-success btn-block btn-lg' onclick = window.location.href = 'votar.php' disabled>VOTAR</button>";	
	
}

?>

<?php
include 'rodape.php';
?>
 
</div>

</body>

</html>