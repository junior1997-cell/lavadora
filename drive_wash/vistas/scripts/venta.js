var tabla;
 var delivey;

//Función que se ejecuta al inicio
function init(){
	hora_fecha();	
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
	 
		//Cargamos los items al select delivery
	$.post("../ajax/venta.php?op=listardelivey", function(r){
        $("#delivery").html(r);
        $('#delivery').selectpicker('refresh');
	});
			//Cargamos los items al select delivery
	$.post("../ajax/venta.php?op=listartipolavado", function(r){
        $("#id_tipo_servicio").html(r);
        $('#id_tipo_servicio').selectpicker('refresh');
	});
		//Cargamos los items al select tipo pedido
	$.post("../ajax/venta.php?op=listartipopedido", function(r){
        $("#id_tipo_pedido").html(r);
        $('#id_tipo_pedido').selectpicker('refresh');
	});
	//Cargamos los items al select clientes
	$.post("../ajax/venta.php?op=listar_clientes", function(r){
        $("#id_cliente").html(r);
        $('#id_cliente').selectpicker('refresh');
	});


	$('#mVentas').addClass("treeview active");
    $('#lVentas').addClass("active");

    
}

//Función limpiar
function limpiar()
{
	$("#idcliente").val("");
	$("#cliente").val("");
	$("#serie_comprobante").val("");
	$("#num_comprobante").val("");
	$("#impuesto").val("0");

	$("#total_venta").val("");
	$(".filas").remove();
	$("#total").html("0");

	//Obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day);
    $('#fecha_hora').val(today);
    //oconsole.log(today);
   // -----------------


//alert(today);
    //Marcamos el primer tipo_documento
    $("#tipo_comprobante").val("Boleta");
	$("#tipo_comprobante").selectpicker('refresh');
}




function mostrarform(flag)
{
	hora_fecha();	
	//limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		//$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		listarArticulos();

		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").show();
		$("#btnAgregartipolav").show();
		detalles=0;
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

function hora_fecha(){
	// HORA Y FECHA
    var todayDate = new Date();
	var getTodayDate = todayDate.getDate();
	var getTodayMonth =  todayDate.getMonth()+1;
	var getTodayFullYear = todayDate.getFullYear();
	var getCurrentHours = todayDate.getHours();
	var getCurrentMinutes = todayDate.getMinutes();
	var getCurrentSeconds=todayDate.getSeconds();
	var getCurrentAmPm = getCurrentHours >= 12 ? 'PM' : 'AM';
	getCurrentHours = getCurrentHours % 12;
	getCurrentHours = getCurrentHours ? getCurrentHours : 12; 
	getCurrentMinutes = getCurrentMinutes < 10 ? '0'+getCurrentMinutes : getCurrentMinutes;
	var getCurrentDateTime = getTodayDate + '/' + getTodayMonth + '/' + getTodayFullYear + ' ' + getCurrentHours + ':' + getCurrentMinutes + ':' +getCurrentSeconds+ ' ' + getCurrentAmPm;
	$("#hora_recojo").val(getCurrentDateTime);

	var n_pedido=getTodayDate+''+getTodayMonth+''+getTodayFullYear+''+getCurrentHours+''+getCurrentMinutes+''+getCurrentSeconds;
	console.log(n_pedido);
	$("#numero_pedido").val(n_pedido);

	console.log(getCurrentHours,getCurrentMinutes)
	console.log(getCurrentHours)
	console.log(getCurrentDateTime);
}

//Función cancelarform
function cancelarform()
{
	hora_fecha();	
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
					url: '../ajax/venta.php?op=listar',
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


//Función ListarArticulos
function listarArticulos()
{
	tabla=$('#tblPrendas').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		        ],
		"ajax":
				{
					url: '../ajax/venta.php?op=listarprendaslavado',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 4,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función Listartipopedido
function listartipopedido()
{
	tabla=$('#tblPidopedido').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		        ],
		"ajax":
				{
					url: '../ajax/venta.php?op=listartipolavado',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 4,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/venta.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          listar();
	    }

	});
	limpiar();
}

function mostrar(idventa)
{
	$.post("../ajax/venta.php?op=mostrar",{idventa : idventa}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idcliente").val(data.idcliente);
		$("#idcliente").selectpicker('refresh');
		$("#tipo_comprobante").val(data.tipo_comprobante);
		$("#tipo_comprobante").selectpicker('refresh');
		$("#serie_comprobante").val(data.serie_comprobante);
		$("#num_comprobante").val(data.num_comprobante);
		$("#fecha_hora").val(data.fecha);
		$("#impuesto").val(data.impuesto);
		$("#idventa").val(data.idventa);

		//Ocultar y mostrar los botones
		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").hide();
		$("#btnAgregartipolav").hide();
 	});

 	$.post("../ajax/venta.php?op=listarDetalle&id="+idventa,function(r){
	        $("#detalles").html(r);
	});	
}

//Función para anular registros
function anular(idventa)
{
	bootbox.confirm("¿Está Seguro de anular la venta?", function(result){
		if(result)
        {
        	$.post("../ajax/venta.php?op=anular", {idventa : idventa}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Declaración de variables necesarias para trabajar con las compras y
//sus detalles
var impuesto=18;
var cont=0;
var detalles=0;
//$("#guardar").hide();
$("#btnGuardar").hide();
$("#tipo_comprobante").change(marcarImpuesto);

function marcarImpuesto()
  {
  	var tipo_comprobante=$("#tipo_comprobante option:selected").text();
  	if (tipo_comprobante=='Factura')
    {
        $("#impuesto").val(impuesto); 
    }
    else
    {
        $("#impuesto").val("0"); 
    }
  }

$('.selectpicker').on('changed.bs.select', function (e) {
    	var selected = e.target.value;
    	console.log(selected);

    	// NO SELECT
    if(selected == "1"){

    	$("#delivery").hide();
    	 delivey=0;
       $("#deliv").val("deliv"); 
       modificarSubototales();
       calcularTotales();
    }
    if(selected == "2"){
    	 delivey=0.15;
    	
    	 $("#deliv").val("deliv"); 
    	 modificarSubototales();
    	 calcularTotales();
    }
    if(selected == "3"){
    	 delivey=0.15;
    	$("#deliv").val("deliv"); 
    	modificarSubototales();
    	calcularTotales();
    }
     if(selected == "4"){
    	 delivey=0.15;
    	$("#deliv").val("deliv");
    	modificarSubototales();
    	calcularTotales(); 
    }

});



function agregarDetalle(idarticulo,articulo,precio_venta)
  {
  	var cantidad=1;
    var descuento=0;
   

    if (idarticulo!="")
    {
    	var subtotal=cantidad*precio_venta;
    	//var porcentaje=subtotal*0.15;
    	var fila='<tr class="filas" id="fila'+cont+'">'+
    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
    	'<td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td>'+
    	'<td><input type="number" name="cantidad[]" id="cantidad[]" value="'+cantidad+'"></td>'+
    	'<td><input type="number" name="precio_venta[]" id="precio_venta[]" value="'+precio_venta+'"></td>'+
    	'<td><input type="number" name="descuento[]" value="'+descuento+'"></td>'+
    	'<td><input type="number" id="deliv" name="descuento[]" value="'+delivey+'"></td>'+
    	'<td><span name="subtotal" id="subtotal'+cont+'">'+subtotal+'</span></td>'+
    	'<td><button type="button" onclick="modificarSubototales()" class="btn btn-info"><i class="fa fa-refresh"></i></button></td>'+
    	'</tr>';
    	cont++;
    	detalles=detalles+1;
    	$('#detalles').append(fila);
    	modificarSubototales();
    }
    else
    {
    	alert("Error al ingresar el detalle, revisar los datos del artículo");
    }
  }

  function modificarSubototales()
  {
  	var cant = document.getElementsByName("cantidad[]");
    var prec = document.getElementsByName("precio_venta[]");
    var desc = document.getElementsByName("descuento[]");
    var sub = document.getElementsByName("subtotal");

    for (var i = 0; i <cant.length; i++) {
    	var inpC=cant[i];
    	var inpP=prec[i];
    	var inpD=desc[i];
    	var inpS=sub[i];

    	inpS.value=(inpC.value * inpP.value)-inpD.value;
    	document.getElementsByName("subtotal")[i].innerHTML = inpS.value;
    }
    calcularTotales(); 
  }
    function ShowSelected(){
		/* Para obtener el valor */
		var cod = document.getElementById("delivery").value;
		 if (cod == "2" || cod == "3" || cod == "4") {
			    
		}else{}
	}
 
  function calcularTotales(){
  	var sub = document.getElementsByName("subtotal");
  	var total = 0.0;
  	var delivey = 1.0;
  	var porcentaje=0.15;
  	for (var i = 0; i <sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;
	}
	x=total*porcentaje;
	//var numb = 123.23454;
	suma = x.toFixed(1);

	tipo=typeof suma;
	console.log(suma,tipo);
	//y=parsefloat(suma);
	y=parseFloat(suma, 10);
	tipoy=typeof y;
	console.log(tipoy, y);
	totall=y+total;
	//x = (totall);
	$("#total").html("S/. " + totall);
    $("#total_venta").val(totall);
    evaluar();
  }

  function evaluar(){
  	if (detalles>0)
    {
      $("#btnGuardar").show();
    }
    else
    {
      $("#btnGuardar").hide(); 
      cont=0;
    }
  }

  function eliminarDetalle(indice){
  	$("#fila" + indice).remove();
  	calcularTotales();
  	detalles=detalles-1;
  	evaluar()
  }

init();