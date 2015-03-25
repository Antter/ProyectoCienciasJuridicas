<?php

$maindir = "../";

require_once($maindir."conexion/config.inc.php");

ob_start();
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 

if(isset( $_SESSION['user_id'] ))
{
    //$message = 'Users is already logged in';
    header('Location: '.$maindir.'index.php');
    exit();
}
 
if(isset($_GET['usuario']) && isset($_GET['password']))
{  
  $LoginUsuario = $_GET['usuario'];
  $LoginPassword = $_GET['password'];
}
else
{
  header('Location: login.php?error_code=2');
  exit();
}
        
//$query = "SELECT id, username, password, salt FROM member WHERE username = '$username';";
try{

$query = $db->prepare('SELECT id_Usuario,Password,Id_Rol FROM usuario WHERE nombre = :LoginUsuario AND Estado = 1;');
$query -> bindParam(":LoginUsuario",$LoginUsuario);
$query -> execute();
 
$result = $query -> fetch();

$query = null;
$db = null;
}
catch(PDOExecption $e)
{
   header('Location: login.php?error_code=3');
   exit();
   //die("We are unable to process your request. Please try again later");
} 
 
//$result = mysql_query($query);
 
//if(mysql_num_rows($result) == 0) // User not found. So, redirect to login_form again.

if($result)
{
//$userData = mysql_fetch_array($result, MYSQL_ASSOC);
//$hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
 
//if($hash != $userData['password']) // Incorrect password. So, redirect to login_form again.

if($LoginPassword != $result['Password'])
{
    //echo "<script>alert('incorrect password')</script>";
    header('Location: login.php?error_code=1');
    exit();
}else
{ // Redirect to home page after successful login.
	session_regenerate_id();
	$_SESSION['user_id'] = $result['id_Usuario'];
	$_SESSION['user_rol'] = $result['Id_Rol'];
	$_SESSION['nombreUsuario'] = $LoginUsuario;
	$_SESSION['timeout'] = time();
	session_write_close();
	header('Location: '.$maindir.'index.php');
	exit();
}

}else
{
    //echo "<script>alert('Sorry wrong username or password')</script>";
    header('Location: login.php?error_code=1');
    exit();
}

?>