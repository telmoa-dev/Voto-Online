<?php
SESSION_START();
SESSION_DESTROY();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Voto Online</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
	<link href="frontend.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/js/all.min.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tooltip.js/1.3.3/esm/tooltip.min.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>

<body class="text-center">

<div class="container">

<?php

$cod_msg = 0;
$cod_msg = $_GET["cod_msg"];
include 'funcoes.php';
cod_msg($cod_msg);

?>

    <form class="form-signin" action="recebe_login.php" method="post">
		<img class="mb-4" src="../Backend/imagens/Voto-Online.png" alt="" width="80%" height="80%">
        <h1 class="h3 mb-3 font-weight-normal text-center">Entrar</h1>    
        <div class="form-group">
			<label for="inputNIF" class="sr-only">Email address</label>
            <input type="text" class="form-control" placeholder="NIF" name="usr" id="inputNIF" value= "<?php if(isset($_COOKIE['usr'])){ echo $_COOKIE['usr']; }; ?>" required autofocus>
        </div>
        <div class="form-group">
			<label for="inputPassword" class="sr-only">Palavra-Chave</label>
            <input type="password" class="form-control" placeholder="Palavra-Chave" id="inputPassword" name="pwd" required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary btn-block">Entrar</button>
        </div>
        <div class="checkbox mb-3 clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox" name="lembrar" <?php if(isset($_COOKIE['usr'])){ echo 'checked="checked"'; }; ?>> Lembrar-me</label>
            <a href="#" class="pull-right">Recuperar Palavra-Chave?</a>
        </div>
    </form>
    <p class="text-center"><a href="registar.php?cod_msg=0">Criar uma Conta</a></p>
	
	<?php
		include 'rodape.php';
	?>

</div>
</body>
</html>                                		                            