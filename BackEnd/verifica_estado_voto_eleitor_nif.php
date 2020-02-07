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
  <form action=recebe_verifica_estado_voto_eleitor_nif.php method="POST">
  <div class="form-group">
    <label for="nif">NIF:</label>
    <input type="text" class="form-control" id="nif" name="nif" required>
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