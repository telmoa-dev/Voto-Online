<html>

<head>

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
  
  <br>
  <form action=recebe_apagar_partido.php method="POST">
  <div class="form-group">
  <label for="sel1">Partido a eliminar:</label>
  <select class="form-control" id="sel1" name="sel1">
  
<?php

include 'liga_bd.php';

$sql = "SELECT cod_partido, designacao FROM partido";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
		echo "<option value=".$row["cod_partido"].">".$row["cod_partido"]." - ".$row["designacao"]."</option>";
        //echo $row["cod_partido"];
        
		}
		echo "</select>";
} else {
    echo "0 results";
}
	
$conn->close();

?>

  </ul>
</div>
  <button type="submit" class="btn btn-danger">APAGAR</button>
</form>

<?php
include 'rodape.php';
?>

 </div>

 
 
</body>

</html>