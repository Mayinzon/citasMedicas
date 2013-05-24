	
<h2 align="center"><?php echo $view->label ?></h2>
<form name ="medico" id="medico" method="POST" action="index.php">
    <input type="hidden" name="id" id="id" value="<?php print $view->medico->getId() ?>">
  <div>
      <label>Nombre</label>
        <input type="text" name="nombre" id="nombre" value = "<?php print $view->medico->getNombre() ?>">
    </div>
    <div>
        <label>Apellido</label>
        <input type="text" name="apellido" id="apellido"value = "<?php print $view->medico->getApellido() ?>">
    </div>
    <div>
        <label>Edad</label>
        <input type="text" name="edad"  id="edad" value = "<?php print $view->medico->getEdad() ?>"> 
		
	<div>
        <label>Telefono</label>
        <input type="text" name="telefono" id="telefono" value = "<?php print $view->medico->getTelefono() ?>">
    </div>
	
	 <div>
      <label>Codigo de Especialidad</label>
        <input type="text" name="id_especialidad" id="id_especialidad" value = "<?php print $view->medico->getId_especialidad() ?>">
    </div>
	
    <div class="buttonsBar">
        <input id="cancel" type="button" value ="Cancelar" />
        <input id="submit" type="submit" name="submit" value ="Guardar" />
    </div>
</form>
