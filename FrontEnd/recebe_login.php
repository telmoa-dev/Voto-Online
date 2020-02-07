<?php

session_start();

$usr = $_POST['usr'];
$pwd = $_POST['pwd'];

$lembrar = $_POST['lembrar'];

if(isset($_COOKIE['pwd'])){
        
            if(!isset($lembrar)){
                unset($_COOKIE['usr']);				
                unset($_COOKIE['pwd']);
            }
        
        }else{
        
            if(isset($lembrar)){
				setcookie("usr", $usr);
                setcookie("pwd", $pwd);
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