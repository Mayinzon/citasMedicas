<?php

class Consulta   // se declara una clase para poder ejecutar las consultas, esta clase llama a la clase anterior
{
/**
 * variable de instancia de la conexion con la BD
 * @var Conexion
 * @access public
 */ 
var $conexion;
/**
 * variable encargada de las consultas a la base de datos
 * @var Conexion 
 * @access public
 */ 
var $consulta;
/**
* Constructor de la clase
*
* constructor, solo crea una conexion usando la clase "Conexion", se envian los parametros nombre de la base, contraseña, usuario y servidor 
* @see Conexion
* @return void
*/	
	function Consulta()  // constructor, solo crea una conexion usando la clase "Conexion"
	{
		$this->conexion= new Conexion("localhost","root","","bd_citas_medicas");
	}
/**
* encargada de ejecutar las consultas
*
* metodo que ejecuta la consulta y guarda el resultado en el atributo de clase: $consulta
* @return sQuery retorna el resultado de la consulta
* @param string $cons consulat sql
* @throws puede arrojar una excepcion del tipo sql, si existe un problema con la consulta hacia mysql
*/	
	function ejecutarConsulta($cons)  // metodo que ejecuta una consulta y la guarda en el atributo $consulta
	{
		$this->consulta= mysql_query($cons,$this->conexion->getConexion());
		if (!$this->consulta) 
		{
          // arrojo la excepcion si hubo un problema con el query hacia mysql
          throw new Exception ("ocurri&oacute; un error al intentar acceder a la base de datos: ".mysql_error());
		  
		} 
		return $this->consulta;
	}	
/**
* encargada de obtener la consulta en forma de result
*
* @return sQuery 
*/	
	function getResults()   // retorna la consulta en forma de result.
	{return $this->consulta;}
	
/**
* encargada de cerrar la conexion a la base de datos
*
* @return void 
*/
	
	function Close()		// cierra la conexion
	{$this->conexion->Close();}
	
/**
* encargada de liberar la consulta
*
* @return void 
*/
	function Clean() // libera la consulta
	{mysql_free_result($this->consulta);}

	function getResultados() // devuelve la cantidad de registros encontrados
	{return mysql_affected_rows($this->conexion->getConexion()) ;}
/**
* encargada de devolver la cantidad de los registros encontrados
*
* metodo que devuelve la cantidad de filas afectadas con la consulta sql
* @return $Conexion retorna la cantidad de registros afectados
*/	
	function getAffect() // devuelve las cantidad de filas afectadas
	{return mysql_affected_rows($this->conexion->getConexion()) ;}
/**
* encargada de devolver todos los registros de una tabla
*
* metodo que devuelve todos los registros de una consulta (tabla)  los guarda fila por fila en el vector rows
* @return  array() $rows vector con cada una de las filas de la consulta
*/	
    function fetchAll() //devuelve todos los registros de una tabla (consulta)
    {
        $rows=array();
		if ($this->consulta)
		{
			while($row=  mysql_fetch_array($this->consulta))
			{
				$rows[]=$row;
			}
		}
       	return $rows;
    }
	
	
}
?>