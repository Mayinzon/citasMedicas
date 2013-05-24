<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
session_start();

if(isset($_SESSION["datos"]))
{
echo '<script type="text/javascript"> alert("el usuario o password es incorrecto"); </script>';
}

?>
<body><form action="comprobarUsuario.php" method="post">
<table width="200" border="1" align="center">
  <tr>
    <td width="93">USUARIO:
      <div align="justify"></div></td>
    <td width="91"><input type="text" name="usuario" maxlength="20" size="20" /></td>
  </tr>
  <tr>
    <td>PASSWORD:</td>
    <td><div align="center">
      <input type="password" name="password" maxlength="15" size="15" />
    </div></td>
  </tr>
  <tr>
    <td><div align="center">
      <input type="submit" value="OK">
    </div></td>
    <td><input type="reset" value="LIMPIAR CAMPOS"></td>
  </tr>
</table>

</form>
</body>
</html>
