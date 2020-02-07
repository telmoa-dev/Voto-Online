<?php
$cod_partido = $_GET["cod_partido"];
?>

<?php
include 'liga_bd.php';

$sql = "SELECT designacao, imagem FROM partido where cod_partido='".$cod_partido."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $designacao = $row["designacao"];
		$imagem = $row["imagem"];
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
  
  <div>
  <form action=recebe_atualizar_partido_link_update.php method="POST">
  <div class="form-group">
    <label for="Código do Partido">Código do Partido:</label>
    <input type="number" class="form-control" id="cod_partido" name="cod_partido" value="<?php echo $cod_partido;?>" required>
  </div>
  <div class="form-group">
    <label for="dsg">Designação:</label>
    <input type="text" class="form-control" id="designacao" name="designacao" value="<?php echo $designacao;?>" required>
  </div>
    <div class="form-group">
    <label for="img">Imagem:</label>
    <input type="text" class="form-control" id="imagem" name="imagem" value="<?php echo $imagem;?>" required>
  </div>

  <button type="submit" class="btn btn-default">Submeter</button>
</form>
  </div>
  
<?php
include 'rodape.php';
?>  
  
</div>

</body>

</html>