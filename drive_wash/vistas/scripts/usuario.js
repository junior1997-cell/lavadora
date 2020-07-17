var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);

	})

	$("#imagenmuestra").hide();
	//Mostramos los permisos
	$.post("../ajax/usuario.php?op=permisos&id=",function(r){
	        $("#permisos").html(r);
	});
	$('#mAcceso').addClass("treeview active");
    $('#lUsuarios').addClass("active");

    //Cargamos los items al select distrito
	$.post("../ajax/usuario.php?op=select_distrito", function(r){

	            $("#id_distrito").html(r);
	            $('#id_distrito').selectpicker('refresh');

	});

	 //Cargamos los items al select cargo
	$.post("../ajax/usuario.php?op=select_cargo", function(r){

	            $("#id_cargo").html(r);
	            $('#id_cargo').selectpicker('refresh');

	});

	 //Cargamos los items al select tipo documento
	$.post("../ajax/usuario.php?op=select_tipo_doc", function(r){

	            $("#tipo_documento").html(r);
	            $('#tipo_documento').selectpicker('refresh');

	});
	 //Cargamos los items al select tipo documento
	$.post("../ajax/usuario.php?op=select_sexo", function(r){

	            $("#sexo").html(r);
	            $('#sexo').selectpicker('refresh');

	});
	 
}


//Función limpiar
function limpiar()
{
	$("#dni").val("");
	$("#nombres").val("");
	$("#apellidoMatPat").val("");
	$("#razonsocial").val("");
	$("#option_sexo").val("");
	$("#login").val("");
	$("#clave").val("");
	$("#celular").val("");
	$("#id_cargo").val("");
	$("#id_distrito").val("");
	$("#direccion").val("");
	$("#imagenmuestra").hide();
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#idusuario").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{	 
		$("#div_sexo").show();
	 	$("#btnareniec").prop("disabled",true);
	 	$("#btnsunat").hide();
	 	$("#dni").prop("disabled",true);
		$("#mos_no_select").show();
		$("#mos_ruc").hide();
	    $("#mos_dni").hide();
	    $("#mos_carnet").hide();
	    $("#mos_pasaporte").hide();
	    $("#label_oculto").show();	    	    
	    $("#habilitar_razon_social").hide();
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		$("#nuevo_cargo").hide();
		$("#nueva_clave").hide();
		$("#nuevo_tipo_doc").hide();
		$("#nuevo_mos_no_select").hide();
		$("#nuevo_distrito").hide();
		$("#ocultar_div_nombre").show();
		$("#ocultar_div_apellidos").show();
	}
	else
	{
		 
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnGuardar").show();
		$("#btnagregar").show();
	}
}


$('.selectpicker').on('changed.bs.select', function (e) {
    	var selected = e.target.value;
    	console.log(selected);

    	// NO SELECT
    if(selected == "20"){
    	$("#mos_dni").hide();
    	$("#mos_ruc").hide();
        $("#mos_carnet").hide();
        $("#mos_pasaporte").hide();     
        $("#mos_ruc").hide();
        $("#dni").prop("disabled",true);
        $("#btnareniec").prop("disabled",true);
        $("#btnsunat").prop("disabled",true);
        $("#razonsocial").prop("disabled",true);
        $("#habilitar_razon_social").hide();
        $("#mos_no_select").show(); 
        $("#ocultar_div_nombre").show();
        $("#ocultar_div_apellidos").show();
        $("#dni").val("");
        $("#div_sexo").show();
        $("#nuevo_mos_no_select").hide();
         $("#antiguo_tipo_doc").show();
         $("#nuevo_tipo_doc").hide();
    
    }

    // DNI
    if ( selected == "21" ){
    	$('.selectpicker').selectpicker('refresh')
        $("#mos_dni").show();
        $("#mos_ruc").hide();
        $("#mos_carnet").hide();
        $("#mos_pasaporte").hide();
        $("#mos_no_select").hide();    
        $("#btnareniec").prop("disabled",false);
        $("#razonsocial").prop("disabled",true);
        $("#nombres").prop("disabled",false);
        $("#btnareniec").show();
        $("#btnsunat").hide();
        $("#habilitar_razon_social").hide();
        $("#ocultar_div_nombre").show();
        $("#ocultar_div_apellidos").show();
        $("#dni").prop("disabled",false);
        $("#dni").val("");
        $("#div_sexo").show();
        $("#nuevo_mos_no_select").hide();
        $("#antiguo_tipo_doc").show();
        $("#nuevo_tipo_doc").hide();

    }

    // RUC
    if(selected == "22"){
    	$("#mos_dni").hide();
    	$("#mos_ruc").show();
        $("#mos_carnet").hide();
        $("#mos_pasaporte").hide();
        $("#mos_no_select").hide();        
        $("#btnareniec").hide();  
        $("#btnsunat").show();
        $("#div_sexo").hide();
        $("#dni").prop("disabled",false);
        $("#btnsunat").prop("disabled",false);
        $("#razonsocial").prop("disabled",false);
        $("#nombres").prop("disabled",true);
        $("#habilitar_razon_social").show();
        $("#ocultar_div_nombre").hide()
        $("#ocultar_div_apellidos").hide();
        $("#dni").val("");   
        $("#nuevo_mos_no_select").hide(); 
        $("#antiguo_tipo_doc").show(); 
        $("#nuevo_tipo_doc").hide();    
    }


    // CARNET DE EXTRANJERIA
    if(selected == "23"){
    	$("#mos_dni").hide();
    	$("#mos_ruc").hide();
    	$("#mos_carnet").show();
    	$("#mos_pasaporte").hide();
        $("#mos_no_select").hide();        
        $("#btnareniec").prop("disabled",true);
        $("#btnsunat").prop("disabled",true);
        $("#dni").prop("disabled",false);
        $("#nombres").prop("disabled",false);
        $("#habilitar_razon_social").hide();
        $("#ocultar_div_nombre").show();
        $("#ocultar_div_apellidos").show();
        $("#dni").val("");
        $("#div_sexo").show();
        $("#nuevo_mos_no_select").hide();
        $("#antiguo_tipo_doc").show();
        $("#nuevo_tipo_doc").hide();
    }

    // PASAPORTE
    if(selected == "24"){
    	$("#mos_dni").hide();
    	$("#mos_ruc").hide();
    	$("#mos_carnet").hide();
    	$("#mos_pasaporte").show();
        $("#mos_no_select").hide();       
        $("#dni").prop("disabled",false);
        $("#btnareniec").prop("disabled",true);
        $("#btnsunat").prop("disabled",true);
        $("#nombres").prop("disabled",false);
        $("#habilitar_razon_social").hide();
        $("#ocultar_div_nombre").show();
        $("#ocultar_div_apellidos").show();
        $("#dni").val("");
        $("#div_sexo").show();
        $("#nuevo_mos_no_select").hide();
        $("#antiguo_tipo_doc").show();
        $("#nuevo_tipo_doc").hide(); 


    }
});

function tipo_doc_select_ruc_dni()
{
	 // var zone = document.getElementById("tipo_documento");

	
	 console.log(selected);

    if ( text == "1" ){

        $("#1").show();
        $("#mos_ruc").hide();
        $("#mos_carnet").hide();
        $("#mos_pasaporte").hide();
        $("#mos_no_select").hide();    
        $("#btnareniec").prop("disabled",false);
        $("#btnareniec").show();
         $("#btnsunat").hide();
        $("#habilitar_razon_social").hide();
        $("#ocultar_div_nombre").show();
        $("#ocultar_div_apellidos").show();
        $("#dni").prop("disabled",false);
        $("#dni").val("");
        $("#div_sexo").show();

    }

    if(zone.value == "no_select"){
    	$("#mos_dni").hide();
    	$("#mos_ruc").hide();
        $("#mos_carnet").hide();
        $("#mos_pasaporte").hide();     
        $("#mos_ruc").hide();
        $("#dni").prop("disabled",true);
        $("#btnareniec").prop("disabled",true);
        $("#btnsunat").prop("disabled",true);
        $("#habilitar_razon_social").hide();
        $("#mos_no_select").show(); 
        $("#ocultar_div_nombre").show();
        $("#ocultar_div_apellidos").show();
        $("#dni").val("");
        $("#div_sexo").show();
        
    
    }

    if(zone.value == "ruc"){
    	$("#mos_dni").hide();
    	$("#mos_ruc").show();
        $("#mos_carnet").hide();
        $("#mos_pasaporte").hide();
        $("#mos_no_select").hide();        
        $("#btnareniec").hide();  
        $("#btnsunat").show();
        $("#div_sexo").hide();
        $("#dni").prop("disabled",false);
        $("#btnsunat").prop("disabled",false);
        $("#habilitar_razon_social").show();
         $("#ocultar_div_nombre").hide();
        $("#ocultar_div_apellidos").hide();
        $("#dni").val("");

         
    }

    if(zone.value == "carnet"){
    	$("#mos_dni").hide();
    	$("#mos_ruc").hide();
    	$("#mos_carnet").show();
    	$("#mos_pasaporte").hide();
        $("#mos_no_select").hide();        
        $("#btnareniec").prop("disabled",true);
        $("#btnsunat").prop("disabled",true);
        $("#btnareniec").show();
        $("#dni").prop("disabled",false);
        $("#habilitar_razon_social").hide();
         $("#ocultar_div_nombre").show();
        $("#ocultar_div_apellidos").show();
        $("#dni").val("");
        $("#div_sexo").show();
       


    }

    if(zone.value == "pasaporte"){
    	$("#mos_dni").hide();
    	$("#mos_ruc").hide();
    	$("#mos_carnet").hide();
    	$("#mos_pasaporte").show();
        $("#mos_no_select").hide();       
        $("#dni").prop("disabled",false);
       $("#btnareniec").prop("disabled",true);
        $("#btnsunat").prop("disabled",true);
        $("#habilitar_razon_social").hide();
        $("#ocultar_div_nombre").show();
        $("#ocultar_div_apellidos").show();
        $("#dni").val("");
        $("#div_sexo").show();


    }
	
		
		 
	
}



//Función cancelarform
function cancelarform()
{
	 $("#antiguo_tipo_doc").show();
	 $("#antigua_clave").show();
	 $("#antiguo_cargo").show();
	 $("#btnareniec").show();
	 $("#tipo_documento").val("");
	 $("#option_sexo").val("");
	 $("#tipo_documento").selectpicker('refresh');
	 $("#antiguo_distrito").show();
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/usuario.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"language": {
            "lengthMenu": "Mostrar : _MENU_ registros",
            "buttons": {
            "copyTitle": "Tabla Copiada",
            "copySuccess": {
                    _: '%d líneas copiadas',
                    1: '1 línea copiada'
                }
            }
        },
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);
	console.log(formData);
	$.ajax({
		url: "../ajax/usuario.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	 
	          console.log(datos);         
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}
function sexo(sas){

}

function mostrar(id)
{
	sexo(id);
	console.log(id);
	$.post("../ajax/usuario.php?op=mostrar",{id : id}, function(data, status)
	{
		mostrarform(true);

		data = JSON.parse(data);	
		tipo = typeof data;
		console.log(tipo);
		console.log(data);

		
		$("#antigua_clave").hide();
		$("#nueva_clave").show();
		

		
		
		
		$("#id").val(data['Detalle']['id']);
		$("#dni").val(data['Detalle']['num_doc']);
		$("#actual_tipo_doc").val(data['Detalle']['num_doc']);

		if(data['Detalle']['apellidospatmat']==""){
			// mostramos datos de sunat
			$("#ocultar_div_nombre").hide();
			$("#ocultar_div_apellidos").hide();
			$("#habilitar_razon_social").show();
			$("#razonsocial").val(data['Detalle']['cliente']);
			$("#razonsocial").prop("disabled",false);
			$("#nombres").prop("disabled",true);
			$("#dni").prop("disabled",false);
			$("#btnareniec").prop("disabled",true);
			$("#btnareniec").hide();
       		$("#btnsunat").prop("disabled",false);
       		$("#btnsunat").show();
       		$("#div_sexo").hide();
		}else{
			// mostramos datos de reniec
			$("#nombres").show();
			$("#apellidoMatPat").show();
			$("#nombres").val(data['Detalle']['cliente']);
			$("#apellidoMatPat").val(data['Detalle']['apellidospatmat']);		
			$("#razonsocial").prop("disabled",true);
			$("#nombres").prop("disabled",false);
			$("#dni").prop("disabled",false);
			$("#btnareniec").prop("disabled",false);
			$("#btnareniec").show();
       		$("#btnsunat").prop("disabled",true);
       		$("#btnsunat").hide();
       		$("#div_sexo").show();
		}
				
		$("#tipo_documento").val(data['Detalle']['id_tipo_doc']);
		$("#tipo_documento").selectpicker('refresh');
		$("#option_sexo").html(data['Detalle']['sexo']);
		$("#sexo").val(data['Detalle']['id_sexo']);
		$("#sexo").selectpicker('refresh');
		$("#login").val(data['Detalle']['email']);
		$("#clave_actual").val(data['Detalle']['clave']);
		$("#celular").val(data['Detalle']['celular']);
		$("#id_cargo").val(data['Detalle']['id_cargo']);
		$("#id_cargo").selectpicker('refresh');
		// $("#cargo_actual").val(data['Detalle']['id_cargo']);
		$("#id_distrito").val(data['Detalle']['id_distrito']);
		$("#id_distrito").selectpicker('refresh');
		$("#direccion").val(data['Detalle']['direccion']);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/usuarios/"+data['Detalle']['imagen']);
		$("#imagenactual").val(data['Detalle']['imagen']);
		$("#idusuario").val(data['Detalle']['id']);

 	});

 	$.post("../ajax/usuario.php?op=permisos&id="+id,function(r){
	        $("#permisos").html(r);
	});
}

//Función para desactivar registros
function desactivar(id)
{
	console.log(id);
	bootbox.confirm("¿Está Seguro de desactivar el usuario?", function(result){
		if(result)
        {
        	$.post("../ajax/usuario.php?op=desactivar", {id : id}, function(e){

        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id)
{
	bootbox.confirm("¿Está Seguro de activar el Usuario?", function(result){
		if(result)
        {
        	$.post("../ajax/usuario.php?op=activar", {id : id}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

function mostrar_datos_sunat2()
{
	var dni=document.getElementsByName("dni")[0].value;
	console.log(dni);
	mostrar_datos_sunat(dni);
	
}
function mostrar_datos_sunat(dni)
{

	$.post("../ajax/usuario.php?op=sunat",{dni : dni}, function(data, status)
	{
		data = JSON.parse(data);
		var valor = typeof data;
		console.log(data);
		if(data[0][0] !== null){
			$("#dni").val(data[0][0]);
			$("#razonsocial").val(data[0][1]);
			$("#direccion").val(data[0][2]);
		}else{
			//$("#dni").val("");
			$("#razonsocial").val("dato no existe o sin conexion de red");
			$("#direccion").val("dato no existe o sin conexion de red");
		}
 	})
}


function mostrar_datos_reniec2()
{
	var dni=document.getElementsByName("dni")[0].value;
	console.log(dni);
	mostrar_datos_reniec(dni);
	
}

function mostrar_datos_reniec(dni)
{

	$.post("../ajax/usuario.php?op=reniec",{dni : dni}, function(data, status)
	{
		data = JSON.parse(data);
		 
		console.log(data);
		if(data[0][0] !== null){
			$("#dni").val(data[0][0]);
			$("#nombres").val(data[0][1]);
			$("#apellidoMatPat").val(data[0][2]);
		}else{
			// $("#dni").val(data[0][0]);
			$("#nombres").val('dato no existe o sin conexion de red');
			$("#apellidoMatPat").val('dato no existe o sin conexion de red');
		}
 	})
}

init();