<?php
$nif = $_POST["nif"];

session_start();
 
$estado_voto = 0;
$data_time_out = 0;
$data_voto = 0;
$tipo_voto = 0;

include 'liga_bd.php';

$sql = "SELECT estado_voto, data_voto, data_time_out, tipo_voto FROM eleitor WHERE nif=".$nif;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
		$estado_voto = $row["estado_voto"];
		$data_voto = $row["data_voto"];		
		$data_time_out = $row["data_time_out"];	
		$tipo_voto = $row["tipo_voto"];		
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
include 'cabecalho.php';
?>  
  
<?php
include 'menu_principal.php';
?>

<div class="jumbotron">

          <p>Estado: 
		<?php 
		if (($estado_voto == 1) || ($estado_voto == 2)){ echo "<b> <font color='red'> Indisponível </font> </b>"; } 
		else { echo "<b> <font color='green'> Voto disponível -> Clica para registar o voto: </font> </b>"; 
		       echo "<a href=regista_voto_mesa.php?nif=".$nif."><span class='glyphicon glyphicon-plus-sign'></span></a>";
		}
		?>
		<p>Data:
		<?php
		if ($data_voto == 0 ) { echo "<b> <font color='blue'> ##-##-####</font> </b>"; } 
		else { echo "<b> <font color='blue'> ".$data_voto."</font> </b>"; }		
		?>	
		<p>Expirou:
		<?php
		if ($data_time_out == 0 ) { echo "<b> <font color='green'> NÃO </font> </b>"; } 
		else { echo "<b> <font color='red'> ".$data_time_out."</font> </b>"; }		
		?>	
		<p>Tipo de Voto:
		<?php
		if ($tipo_voto == 1 ) { echo "<b> <font color='blue'> on-line (Urna Virtual) </font> </b>"; } 
		else if ($tipo_voto == 2 ) { echo "<b> <font color='blue'> Urna Física </font> </b>"; }		
		else { echo "<b> <font color='blue'> Disponível </font> </b>"; }
		?>	
		
</div>
<?php
include 'rodape.php';
?>  
  
</div>

</body>

</html>