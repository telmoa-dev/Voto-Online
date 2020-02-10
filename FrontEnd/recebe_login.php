<?php

session_start();

$usr = $_POST['usr'];
$pwd = $_POST['pwd'];

$cusr = $_COOKIE['usr'];
$hash = $_COOKIE['hash'];

$lembrar = $_POST['lembrar'];

// Receber a data, e tempo.
$tempo_atual = time();
$data_atual = date("Y-m-d H:i:s", $tempo_atual);

// Por a cookie a expirar em 1 mês
$tempo_cookie_expirar = $tempo_atual + (30 * 24 * 60 * 60);

if(isset($_COOKIE['usr'])) {
    if(!isset($lembrar)){
        unset($_COOKIE['usr']);
		unset($_COOKIE['hash']);			
    }
	if ($hash == md5($cusr)) {
		$_SESSION['usr'] = $usr;
	} else {
		//destruir as cookies, foram mexidas.
		setcookie("usr", '', time() - 9999);
		setcookie("hash", '', time() - 9999);
	}
} else {
    if(isset($lembrar)){
		setcookie("usr", $usr, $tempo_cookie_expirar);
		setcookie("hash", md5($usr), $tempo_cookie_expirar);
    }
}
$pass_encripted = "";
$res = FALSE;

include 'liga_bd.php';

//$sql = "SELECT nif, pass FROM eleitor WHERE nif = '$usr' AND pass = '$pwd'";
$sql = "SELECT nif, pass FROM eleitor WHERE nif = '$usr'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		
		$pass_encripted = $row["pass"];

		}	

		$res = password_verify($pwd, $pass_encripted);

		if ($res == TRUE){
	
			$_SESSION['usr'] = $usr;
			
			header('location:home.php?cod_msg=0');
}
		else {
			unset ($_SESSION['usr']);
			unset ($_SESSION['pwd']);
			header('location:frontend.php?cod_msg=9');
		}
}

else{
  unset ($_SESSION['usr']);
  unset ($_SESSION['pwd']);
header('location:frontend.php?cod_msg=9');
   
  }
$conn->close();

?>