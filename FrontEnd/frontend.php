<?php

SESSION_START();
SESSION_DESTROY();

$cod_msg = 0;
$cod_msg = $_GET["cod_msg"];

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
include 'funcoes.php';
cod_msg($cod_msg);
?>

<div class="login-form">
    <form action="recebe_login.php" method="post">
        <h2 class="text-center">Entrar</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="NIF" name="usr" value= "<?php if(isset($_COOKIE['usr'])){ echo $_COOKIE['usr']; }; ?>" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Palavra-Chave" name="pwd" value="<?php if(isset($_COOKIE['pwd'])){ echo $_COOKIE['pwd']; }; ?>" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox" name="lembrar" <?php if(isset($_COOKIE['pwd'])){ echo 'checked="checked"'; }; ?>> Lembrar-me</label>
            <a href="#" class="pull-right">Recuperar Palavra-Chave?</a>
        </div>        
    </form>
    <p class="text-center"><a href="registar.php?cod_msg=0">Criar uma Conta</a></p>
</div>

</div>
</body>
</html>                                		                            