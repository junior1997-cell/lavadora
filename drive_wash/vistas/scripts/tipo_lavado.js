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
	$('#mAlmacen').addClass("treeview active");
    $('#lArticulos').addClass("active");
}

//Función limpiar
function limpiar()
{

	$("#nombre").val("");
	$("#descripcion").val("");
	$("#stock").val("");
	$("#precio").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#imagen").val("");
	$("#id").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
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
					url: '../ajax/tipo_lavado.php?op=listar',
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
//console.log(formData);
	$.ajax({
		url: "../ajax/tipo_lavado.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(id)
{

	//console.log(id);
	$.post("../ajax/tipo_lavado.php?op=mostrar",{id : id}, function(data, status)
	{
		mostrarform(true);
		data = JSON.parse(data);	
		//alert(data);	
		console.log(data);

		$("#id").val(data["Detalle"][0]["idtipo_lavado"]);
		$("#nombre").val(data["Detalle"][0]["nombre_tipo_lavado"]);
		$("#precio").val(data["Detalle"][0]["precio_tipo_lavado"]);
 		

 	})
}

//Función para desactivar registros
function desactivar(id)
{
	console.log(id);
	bootbox.confirm("¿Está Seguro de desactivar el insumo?", function(result){
		if(result)
        {
        	$.post("../ajax/tipo_lavado.php?op=desactivar", {id : id}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id)
{
	bootbox.confirm("¿Está Seguro de activar el insumos?", function(result){
		if(result)
        {
        	$.post("../ajax/tipo_lavado.php?op=activar", {id : id}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

init();