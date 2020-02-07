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
  
  <br>
  
<?php

include 'liga_bd.php';

$sql = "SELECT cod_partido, designacao FROM partido";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
		echo $row["cod_partido"]." - ".$row["designacao"];
		echo "<a href='recebe_atualizar_partido_link.php?cod_partido=".$row["cod_partido"]."'><span class='glyphicon glyphicon-cog'></span></a>";
		echo "<br>";
      
		}
		
} else {
    echo "0 results";
}
	
$conn->close();

?>


<?php
include 'rodape.php';
?>

 </div>

 
 
</body>

</html>