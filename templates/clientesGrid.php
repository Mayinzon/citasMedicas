<div class="bar">
    <a id="new" class="button" href="javascript:void(0);">Agregar Nuevo Medico</a>
	<br> </br>
<table>
    <thead>
        <tr>
			
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Telefono</th>
            <th>Codigo de Especialidad</th>
			<th>Editar</th>
            <th>Borrar</th>
		</tr>
    </thead>
    <tbody>
        <?php foreach ($view->medicos as $medico):  // uso la otra sintaxis de php para templates ?>
            <tr>
                <td><?php echo $medico['Id_medico'];?></td>
                <td><?php echo $medico['Nombre'];?></td>
                <td><?php echo $medico['Apellido'];?></td>
                <td><?php echo $medico['Edad'];?></td>
                <td><?php echo $medico['Telefono'];?></td>
				<td><?php echo $medico['Id_especialidad'];?></td>
                <td><a class="edit" href="javascript:void(0);" data-id="<?php echo $medico['Id_medico'];?>">Editar</a></td>
                <td><a class="delete" href="javascript:void(0);" data-id="<?php echo $medico['Id_medico'];?>">Borrar</a></td>
			</tr>
        <?php endforeach; ?>
   
	</tbody>
</table>

