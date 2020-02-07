<?php
$nif = $_POST["nif"];
$pwd = $_POST["pwd"];
$conf_pwd = $_POST["conf_pwd"];
$email = $_POST["email"];
$data_nascimento = $_POST["data_nascimento"];

$hashed_password = password_hash($pwd, PASSWORD_ARGON2I);

//Valida NIF
include 'funcoes.php';
$res_binif = FALSE;
$res_binif = binif_isvalid($nif);

$res_valida_idade = FALSE;
$res_valida_idade = valida_idade($data_nascimento);

if ($res_binif == FALSE){
	header('location:registar.php?cod_msg=4');
}

else if ($pwd != $conf_pwd){
	header('location:registar.php?cod_msg=5');
}

else if ($res_valida_idade == FALSE){
	//echo $res_valida_idade; 
	header('location:registar.php?cod_msg=6');
}

else {

$estado_voto = 0;
$data_time_out = '0000-00-00 00:00:00';
$data_voto = '0000-00-00 00:00:00';
$tipo_voto = 0;

include 'liga_bd.php';

$sql = "INSERT INTO eleitor (nif, pass, email, data_nascimento, estado_voto, data_voto, data_time_out, tipo_voto)
VALUES ($nif, '$hashed_password', '$email', '$data_nascimento', $estado_voto, '$data_voto', '$data_time_out', $tipo_voto)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	$conn->close();
	header('location:frontend.php?cod_msg=1');
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}

?>