<?php

class Medico
{
/**
 * Latitud del sismo
 * 
 * se refiere a la latitud donde ocurrio el sismo
 * @var float 
 * @access public
 */ 
	var $nombre;     //se declaran los atributos de la clase, que son los atributos del sismo
/**
 * longitud del sismo
 * 
 * se refiere a la longitud donde ocurrio el sismo
 * @var float 
 * @access public
 */ 
	var $apellido;
/**
 * fecha del sismo
 * 
 * se refiere a la fecha exacta donde ocurrio el sismo
 * @var string 
 * @access public
 */ 	
	var $edad;
/**
 * ciudad donde ocurrio el sismo
 * 
 * se refiere al epicentro del sismo (ciudad donde ocurrio el sismo)
 * @var string 
 * @access public
 */ 	
	Var $telefono;
/**
 * identificador de sismo 
 * 
 * se refiere a la primary key en la tabla de la base de datos
 * @var integer 
 * @access public
 */ 	
	Var $id;
/**
 * hora del sismo 
 * 
 * se refiere a la hora de ocurrencia del sismo
 * @var string 
 * @access public
 */ 
	var $id_especialidad;
	/**
	* Obtiene toda la lista de sismos
	*
	* @return Sismo objeto con la consulta
	* @static
	* @access public
	*/
	

    public static function getMedicos() 
		{
			$obj_medico=new Consulta();
			$obj_medico->ejecutarConsulta("select * from medico"); // ejecuta la consulta para traer los datos de los medicos

			return $obj_medico->fetchAll(); // retorna todos los medicos
		}
	/**
* Constructor de la clase
*
* @return void
* @param integer $nro identificador del sismo
*/

	function Medico($nro=0) // declara el constructor, si trae el numero de sismo lo busca , si no, trae todos los sismos
	{
		if ($nro!=0)
		{
			$obj_medico=new Consulta();
			$result=$obj_medico->ejecutarConsulta("select * from medico where Id_medico = $nro"); // ejecuta la consulta para traer al sismo 
			$row=mysql_fetch_array($result);
			$this->id=$row['Id_medico'];
			$this->nombre=$row['Nombre'];
			$this->apellido=$row['Apellido'];
			$this->edad=$row['Edad'];
			$this->telefono=$row['Telefono'];
			$this->id_especialidad=$row['Id_especialidad'];
		}
	}
		
		// metodos que devuelven valores
	/**
	* Obtiene el id del sismo
	*
	* @return integer identificador del sismo
	*/
	function getId()
	 { return $this->id;}
	 /**
	* Obtiene la latitud del sismo
	*
	* @return float latitud del sismo
	*/
	function getNombre()
	 { return $this->nombre;}
	  /**
	* Obtiene la longitud del sismo
	*
	* @return float longitd del sismo
	*/
	function getApellido()
	 { return $this->apellido;}
	  /**
	* Obtiene la fecha del sismo
	*
	* @return string fecha del sismo
	*/
	function getEdad()
	 { return $this->edad;}
	  /**
	* Obtiene la ciudad del sismo
	*
	* @return string ciudad del sismo
	*/
	function getTelefono()
	 { return $this->telefono;}
	   /**
	* Obtiene la hora del sismo
	*
	* @return string hora del sismo
	*/
	 function getId_especialidad()
	 { return $this->id_especialidad;}
	 
		// metodos que setean los valores
	/**
     * encargado de setear el valor de la latitud del sismo
     *
	 * @param float $val
     * @return void
     */
	function setNombre($val)
	 { $this->nombre=$val;}
	 /**
     * encargado de setear el valor de la longitud del sismo
     *
	 * @param float $val
     * @return void
     */
	function setApellido($val)
	 {  $this->apellido=$val;}
	 /**
     * encargado de setear el valor de la fecha del sismo
     *
	 * @param string $val
     * @return void
     */
	function setEdad($val)
	 {  $this->edad=$val;}
	 /**
     * encargado de setear la ciudad donde ocurrio el sismo
     *
	 * @param string $val
     * @return void
     */
	function setTelefono($val)
	 {  $this->telefono=$val;}
	 /**
     * encargado de setear la hora en que ocurrio el sismo
     *
	 * @param string $val
     * @return void
     */
	 function setId_especialidad($val)
	 {  $this->id_especialidad=$val;}
	/**
     * encargado de guardar el sismo (ya sea uno nuevo o uno editado)
     *
	 * si el constructor de la clase recibe un parametro (id) entonces se actualiza el sismo, sino se crea uno nuevo
	 * @return void
     */
    function save()
    {
        if($this->id)
        {$this->updateMedico();}
        else
        {$this->insertMedico();}
    }
	/**
     * encargado de actualizar  el sismo
     *
	 * @return Consulta registros afectados por la consula
	 * @access private
	 * @see  Consulta
     */
	private function updateMedico()	// actualiza el sismo cargado en los atributos
	{
			$obj_medico=new Consulta();
			$query="update medico set Nombre='$this->nombre', Apellido='$this->apellido',Edad='$this->edad',Telefono='$this->telefono',id_especialidad='$this->id_especialidad' where Id_medico = $this->id";
			$obj_medico->ejecutarConsulta($query); // ejecuta la consulta para traer al sismo 
			return $obj_medico->getAffect(); // retorna todos los registros afectados
	
	}
	/**
     * encargado de insertar un nuevo sismo
     *
	 * @access private
	 * @return Consulta
	 * @see Consulta
     */
	
	private function insertMedico()	// inserta el sismo cargado en los atributos
	{
			$obj_medico=new Consulta();
			$query="insert into medico( Nombre, Apellido, Edad, Id_especialidad, Telefono )values('$this->nombre', '$this->apellido','$this->edad','$this->id_especialidad','$this->telefono')";
			
			$obj_medico->ejecutarConsulta($query); // ejecuta la consulta para insertar el sismo 
			return $obj_medico->getAffect(); // retorna todos los registros afectados
	
	}	
	/**
     * encargado de borrar un determinado sismo
     *
	 * @return Consulta
	 * @see Consulta
     */
	function delete()	// elimina al sismo
	{
			$obj_medico=new Consulta();
			$query="delete from medico where Id_medico=$this->id";
			$obj_medico->ejecutarConsulta($query); // ejecuta la consulta para  borrar al sismo
			return $obj_medico->getAffect(); // retorna todos los registros afectados
	
	}	
	

	
}
	/**
     * encargado de limpiar los caracteres que se ingresaran a la base de datos
     * 
	 * @param string $string
	 * 
     */
function cleanString($string)
{
    $string=trim($string); //limpio espacios, tabuladores, saltos líneas, null, tab vertical
    $string=mysql_escape_string($string); //limpia la cadena para poder usarla en un query.
	$string=htmlspecialchars($string);
	
    return $string;
}
?>
