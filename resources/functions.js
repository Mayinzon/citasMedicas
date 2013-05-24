
$(document).ready(function(){ //cuando el html fue cargado iniciar

    //se añade la posibilidad de editar al presionar sobre edit
    $('.edit').live('click',function(){
        //this = es el elemento sobre el que se hizo click en este caso el link
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
        //preparo los parametros
        params={};
        params.id=id;
        params.action="editMedico";
        $('#popupbox').load('index.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })

    })

    $('.delete').live('click',function(){
        var respuesta = confirm("esta seguro que desea borrar este registro?");
		if(!respuesta){return;} //si la respuesta es cancelar, inmediatamente se sale de la funcion, de lo contrario borra el registro
		
		//obtengo el id que guardamos en data-id
		var id=$(this).attr('data-id');
        //preparo los parametros
        params={};
        params.id=id;
        params.action="deleteMedico";
        $('#popupbox').load('index.php', params,function(){
            $('#content').load('index.php',{action:"refreshGrid"});
        })

    })

    $('#new').live('click',function(){
        params={};
        params.action="newMedico";
        $('#popupbox').load('index.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
    })


    $('#medico').live('submit',function(){
        var params={};
        params.action='saveMedico';
        params.id=$('#id').val();
        params.nombre=$('#nombre').val();
        params.apellido=$('#apellido').val();
        params.edad=$('#edad').val();
        params.telefono=$('#telefono').val();
		params.id_especialidad=$('#id_especialidad').val();
        $.post('index.php',params,function(){
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').load('index.php',{action:"refreshGrid"});
        })
        return false;
    })


    // boton cancelar, uso live en lugar de bind para que tome cualquier boton
    // nuevo que pueda aparecer
    $('#cancel').live('click',function(){
        $('#block').hide();
        $('#popupbox').hide();
    })


})

NS={};
