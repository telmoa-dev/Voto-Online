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
	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip({trigger: "focus"});
		});
	</script>
</head>

<body class="text-center">

<div class="container">
<br><br><br><br><br><br>
<?php
$cod_msg = 0;
$cod_msg = $_GET["cod_msg"];
include 'funcoes.php';
cod_msg($cod_msg);
?>

	<form class="form-register" action="inc/recebe_registar.php?cod_msg=1" method="post">
	<img class="mb-4" src="../Backend/imagens/Voto-Online.png" alt="" width="80%" height="80%">
	<h1 class="text-center">Registar - <button data-toggle="modal" data-target="#informacao" type="button" class="btn btn-default" aria-label="Left Align"><i class="fas fa-info"></i></span></button></h1>
	<div class="modal fade" id="informacao" tabindex="-1" role="dialog" aria-labelledby="informacao" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="informacao">Informação</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<p>NIF: Número de Identificação Fiscal.</p>
					<p>Palavra-Chave: tem de conter pelo menos 8 caracteres e incluir uma letra maiúscula, um número e 1 caractere especial.</p>
					<p>Email: tem de ser válido e único para cada NIF.</p>
					<p>Data de Nascimento: a idade mínima legal para votar é de 18 anos.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<br>
		
        <div class="form-group" data-toggle="tooltip" data-placement="right" title="Número de Identificação Fiscal.">
            <input type="text" class="form-control" placeholder="NIF" name="nif" required foucus>
        </div>
        <div class="form-group" data-toggle="tooltip" data-placement="right" title="Tem de conter pelo menos 8 caracteres e incluir uma letra maiúscula, um número e 1 caractere especial.">
		    <input type="password" class="form-control" placeholder="Palavra-Chave" name="pwd" required>
        </div>
        <div class="form-group" data-toggle="tooltip" data-placement="right" title="Reintroduza a Palavra-Chave que foi usada no campo anterior.">
            <input type="password" class="form-control" placeholder="Confirmar Palavra-Chave" name="conf_pwd" required>
        </div>
        <div class="form-group" data-toggle="tooltip" data-placement="right" title="Tem de ser válido e único para cada NIF.">
            <input type="email" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="form-group" data-toggle="tooltip" data-placement="right" title="A idade mínima legal para votar é de 18 anos.">
            <input type="text" class="form-control" placeholder="Data de Nascimento" name="data_nascimento" onfocus="(this.type='date')" required>
        </div>		
        <div class="form-group" data-toggle="tooltip" data-placement="right" title="Verifique todos os campos antes de submeter.">
            <button type="submit" class="btn btn-lg btn-primary btn-block">Submeter</button>
        </div>
    </form>
    <p class="text-center"><a href="index.php">Entrar</a></p>

	<?php
		include 'rodape.php';
	?>

</div>
</body>
</html>                                		                            