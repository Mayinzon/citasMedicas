<?php
/**
 *  
 * encargada de realizar la conexion a la base de datos 
 * 
 * clase principal encargada de gestionar la conexion con la base de datos
 * @author Maria Alejandra Castro-Mauricio Maya-Jhony Alejandro Marin 
 * @copyright creative commons
 * @version 1.0
 * @access public
 * @package base_de_datos
 */
class Conexion  // se declara una clase para hacer la conexion con la base de datos
{
/**
 * variable donde se instancia la conexion
 * @var Conexion 
 * @access public
 */ 
var $con;
	
/**
* constructor de la clase
*
* recibe como parametros los datos principales para establecer la conexion con la base de datos
* @return void
* @param string $servidor direccion ip donde se encuentra el servidor de base de datos
* @param string $usuario nombre de usuario que inicia la conexion
* @param string $password password de la base de datos
* @param string $base_de_datos nombre de la base de datos
*/	
	function Conexion($servidor,$usuario,$password,$base_de_datos)
	{
		// se definen los datos del servidor de base de datos 
		$conection['server']=$servidor;  //host
		$conection['user']=$usuario;         //  usuario
		$conection['pass']=$password;             //password
		$conection['base']=$base_de_datos;           //base de datos
		
		// crea la conexion pasandole el servidor , usuario y clave
		$conect= mysql_connect($conection['server'],$conection['user'],$conection['pass']);

		if ($conect) // si la conexion fue exitosa , selecciona la base
		{
			mysql_select_db($conection['base']);			
			$this->con=$conect;
		}
	}
/**
*obtener conexion
*
* devuelve la instancia de la conexion previamente realizada
* @return Conexion 
*/	
	function getConexion() // devuelve la conexion
	{
		return $this->con;
	}
/**
*cerrar conexion
*
* cierra una conexion previamente abierta de la base de datos
* @return void 
*/	
	function Close()  // cierra la conexion
	{
		mysql_close($this->con);
	}	

}
?>