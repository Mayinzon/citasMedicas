<?php

include_once ("Conexion.php"); 
include_once ("Consulta.php"); 
include_once ("Medico.php");
$action='index'; 
if(isset($_POST['action']))
{$action=$_POST['action'];}

// creo una clase standard para contener la vista
$view= new stdClass(); 
$view->disableLayout=false;// marca si usa o no el layout , si no lo usa imprime directamente el template




// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que se pueda apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'index':
        $view->medicos=Medico::getMedicos(); // tree todos los sismos
        $view->contentTemplate="templates/clientesGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'refreshGrid':
        $view->disableLayout=true; // no usa el layout
        $view->medicos=Medico::getMedicos();
        $view->contentTemplate="templates/clientesGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'saveMedico':
        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $id=intval($_POST['id']);
        $nombre=cleanString($_POST['nombre']);
        $apellido=cleanString($_POST['apellido']);
        $edad=cleanString($_POST['edad']);
        $telefono=cleanString($_POST['telefono']);
		$id_especialidad=cleanString($_POST['id_especialidad']);
        $medico=new Medico($id);
        $medico->setNombre($nombre);
        $medico->setApellido($apellido);
        $medico->setEdad($edad);
        $medico->setTelefono($telefono);
		$medico->setId_especialidad($id_especialidad);
        $medico->save();
        break;
    case 'newMedico':
        $view->medico=new Medico();
        $view->label='Nuevo Medico';
        $view->disableLayout=true;
        $view->contentTemplate="templates/clientForm.php"; // seteo el template que se va a mostrar,cambiar nombre
        break;
    case 'editMedico':
        $editId=intval($_POST['id']);
        $view->label='Editar Sismo';
        $view->medico=new Medico($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/clientForm.php"; // seteo el template que se va a mostrar,cambiar nombre
        break;
	case 'deleteMedico':
        $id=intval($_POST['id']);
        $medico=new Medico($id);
        $medico->delete();
        die; // no quiero mostrar nada cuando borra , solo devuelve el control.
        break;
    default :
}

// si esta deshabilitado el layout solo imprime el template
if ($view->disableLayout==true)
{include_once ($view->contentTemplate);}
else
{include_once ('templates/layout.php');} // el layout incluye el template adentro
