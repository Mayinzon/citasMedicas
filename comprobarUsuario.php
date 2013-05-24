<?php
include("Conexion.php");
include("Consulta.php");

session_start();
$_SESSION["DATOS"]=Array();
$usuario=$_POST['usuario'];
$password=$_POST['password'];

try
{
$obj_consulta=new Consulta();
//$cadena="select Tipo_Usuario from usuario where Nombre_Usuario=";
$obj_consulta->ejecutarConsulta("select Tipo_Usuario from usuario where Nombre_Usuario='$usuario' and Contrasena='$password'");
$consulta=$obj_consulta->fetchAll();
}
catch(Exception $excepcion)
{
//echo '<script type="text/javascript"> alert("el usuario o password es incorrecto"); </script>';
$mensaje_error="error al intentar conectarse con la base de datos: ERROR: ".mysql_error();
$_SESSION["datos"]["error"]=$mensaje_error;
header("Location: login.php");
exit;
}
//si no hay error en la consulta
//session_destroy();
foreach ($consulta as $query)
	{
	$tipo=$query[Tipo_Usuario];
	$nombreUsuario=$query[Nombre_Usuario];
	}


if($tipo=="U")
{
header("Location: MenuPrincipalUsuario.php");
}
if($tipo=="A")
{
header("Location: MenuPrincipalAdministrador.php");

}
if($tipo=="")
{
$mensaje_error="el usuario o password es incorrecto";
$_SESSION["datos"]["error"]=$mensaje_error;
header("Location: login.php");
echo "error";
}
?>