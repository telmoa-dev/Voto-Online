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
  
  <div>
  
<table class="table table-striped">
    <thead>
      <tr>
        <th><center>Código do Partido</center></th>
        <th><center>Designação</center></th>
		<th><center>Imagem</center></th>
      </tr>
    </thead>
	
	<tbody>

<?php

include 'liga_bd.php';

$sql = "SELECT cod_partido, designacao, imagem FROM partido ORDER BY cod_partido";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td class='align-middle'>";
        echo "<center>".$row["cod_partido"]."</center>";
		echo "</td>";
		echo "<td>";
        echo "<center>".$row["designacao"]."</center>";
		echo "</td>";
		echo "<td>";
        echo "<center><img src=imagens/".$row["imagem"]."></center>";
		echo "</td>";
		echo "</tr>";
		}
} else {
    echo "0 results";
}
	
$conn->close();

?>
	 
</table>  
  
  </div>

<?php
include 'rodape.php';
?>
  
 </div>

</body>

</html>