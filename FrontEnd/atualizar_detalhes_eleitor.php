<?php

session_start();
if((!isset ($_SESSION['usr']) == true) and (!isset ($_SESSION['pwd']) == true))
{
  unset($_SESSION['usr']);
  unset($_SESSION['pwd']);
  header('location:index.php');
  }
 
$usr = $_SESSION['usr'];

include 'liga_bd.php';

$nif;
$email;
$data_nascimento;

$sql = "SELECT nif, email, data_nascimento FROM eleitor where nif = ".$usr;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
		$nif = $row["nif"];		
		$email = $row["email"];
		$data_nascimento = $row["data_nascimento"];
      
		}
		
} else {
    echo "0 results";
}
	
$conn->close();

?>




<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Voto Online</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">

	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
	
</style>
</head>
<body>

<div class="container">

<?php
include 'cabecalho.php';
?>

<?php
include 'menu_principal.php';
?>

<div class="login-form">
    <form action="recebe_atualizar_detalhes_eleitor.php" method="post">
        <h2 class="text-center">Atualizar Dados</h2>       
        <div class="form-group">
			<label for="nif">NIF:</label>
            <input type="text" class="form-control" placeholder="NIF" name="nif" value="<?php echo $nif?>" required="required" disabled>
        </div>
        <div class="form-group">
			<label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email?>" required="required">
        </div>
        <div class="form-group">
			<label for="data_nascimento">Data de Nascimento:</label>
            <input type="text" class="form-control" placeholder="Data de Nascimento" name="data_nascimento" value="<?php echo $data_nascimento?>" onfocus="(this.type='date')" required="required">
        </div>		
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Submeter</button>
        </div>
    </form> 
</div>

<?php
include 'rodape.php';
?>

</div>

</body>
</html>                                		                            