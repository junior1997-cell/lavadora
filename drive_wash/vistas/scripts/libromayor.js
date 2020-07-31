var tabla;

//Función que se ejecuta al inicio
function init(){

	mostrarform(false);
	suma_debe_haber10();
	suma_debe_haber12();
	suma_debe_haber14();
	suma_debe_haber20();
	suma_debe_haber33();
	suma_debe_haber40();
	suma_debe_haber41();
	suma_debe_haber42();
	suma_debe_haber45();
	suma_debe_haber46();
	suma_debe_haber50();
	suma_debe_haber59();
	suma_debe_haber60();
	suma_debe_haber61();
	suma_debe_haber62();
	suma_debe_haber63();
	suma_debe_haber69();
	suma_debe_haber70();
	suma_debe_haber79();
	suma_debe_haber94();
	suma_debe_haber95();
	listar10();
	listar12();
	listar14();
	listar20();
	listar33();
	listar40();
	listar41();
	listar42();
	listar45();
	listar46();
	listar50();
	listar59();
	listar60();
	listar61();
	listar62();
	listar63();
	listar69();
	listar70();
	listar79();
	listar94();
	listar95();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
	//Cargamos los items al select proveedor
	$.post("../ajax/ingreso.php?op=selectProveedor", function(r){
	            $("#idproveedor").html(r);
	            $('#idproveedor').selectpicker('refresh');
	});

	$.post("../ajax/libromayor.php?op=SelecLibroContable", function(r){
	            $("#id_libroC").html(r);
	            //$('#id_libroC').selectpicker('refresh');
	});

	$('#mCompras').addClass("treeview active");
    $('#lIngresos').addClass("active");	
}
//Función para listar detalles del registro en el modal 
function Listar_detalle_unico_reg(iddetalle){
	
	$.post("../ajax/libromayor.php?op=listarDetalleuniq", {iddetalle : iddetalle}, function(r){
		$("#iddetalle").html(r);
	});	
}

function hora_fecha(){
	// HORA Y FECHA
    var todayDate = new Date();
	var getTodayDate = todayDate.getDate();
	var getTodayMonth =  todayDate.getMonth()+1;
	var getTodayFullYear = todayDate.getFullYear();
	//var getCurrentHours = todayDate.getHours();
	//var getCurrentMinutes = todayDate.getMinutes();
	//var getCurrentSeconds=todayDate.getSeconds();
	//var getCurrentAmPm = getCurrentHours >= 12 ? 'PM' : 'AM';
	//getCurrentHours = getCurrentHours % 12;
	//getCurrentHours = getCurrentHours ? getCurrentHours : 12; 
	//getCurrentMinutes = getCurrentMinutes < 10 ? '0'+getCurrentMinutes : getCurrentMinutes;
	var getCurrentDateTime = getTodayDate + '/' + getTodayMonth + '/' + getTodayFullYear;
	$("#fechald").val(getCurrentDateTime);

	//var n_pedido=getTodayDate+''+getTodayMonth+''+getTodayFullYear+''+getCurrentHours+''+getCurrentMinutes+''+getCurrentSeconds;
	//console.log(n_pedido);
	//$("#numero_pedido").val(n_pedido);

	//console.log(getCurrentHours,getCurrentMinutes)
	//console.log(getCurrentHours)
	console.log(getCurrentDateTime);
}

//Función limpiar
function limpiar(){
	$("#idproveedor").val("");
	$("#proveedor").val("");
	$("#serie_comprobante").val("");
	$("#num_comprobante").val("");
	$("#impuesto").val("0");

	$("#total_compra").val("");
	$(".filas").remove();
	$("#total").html("0");
	
	//Obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#fecha_hora').val(today);

    //Marcamos el primer tipo_documento
    $("#tipo_comprobante").val("Boleta");
	$("#tipo_comprobante").selectpicker('refresh');
}

//Función mostrar formulario
function mostrarform(flag){
	//limpiar();
	if (flag)
	{
		$("#listadoregistros10").hide();
		$("#listadoregistros14").hide();
		$("#listadoregistros20").hide();
		$("#listadoregistros33").hide();
		$("#listadoregistros40").hide();
		$("#listadoregistros41").hide();
		$("#listadoregistros42").hide();
		$("#listadoregistros45").hide();
		$("#listadoregistros46").hide();
		$("#listadoregistros50").hide();
		$("#listadoregistros59").hide();
		$("#listadoregistros60").hide();
		$("#listadoregistros61").hide();
		$("#listadoregistros62").hide();
		$("#listadoregistros63").hide();
		$("#listadoregistros69").hide();
		$("#listadoregistros70").hide();
		$("#listadoregistros79").hide();
		$("#listadoregistros94").hide();
		$("#listadoregistros95").hide();

		$("#formularioregistros").show();
		//$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		listarArticulos();

		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		detalles=0;
		$("#btnAgregarArt").show();
		$("#btnAgregarfila").show();
	}
	else
	{
		$("#listadoregistros10").show();
		$("#listadoregistros14").show();
		$("#listadoregistros20").show();
		$("#listadoregistros33").show();
		$("#listadoregistros40").show();
		$("#listadoregistros41").show();
		$("#listadoregistros42").show();
		$("#listadoregistros45").show();
		$("#listadoregistros46").show();
		$("#listadoregistros50").show();
		$("#listadoregistros59").show();
		$("#listadoregistros60").show();
		$("#listadoregistros61").show();
		$("#listadoregistros62").show();
		$("#listadoregistros63").show();
		$("#listadoregistros69").show();
		$("#listadoregistros70").show();
		$("#listadoregistros79").show();
		$("#listadoregistros94").show();
		$("#listadoregistros95").show();

		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}

}

//Función cancelarform
function cancelarform(){
	limpiar();
	mostrarform(false);
}

//Funcion para redondear
function roundNumber(num, scale) {
  if(!("" + num).includes("e")) {
    return +(Math.round(num + "e+" + scale)  + "e-" + scale);
  } else {
    var arr = ("" + num).split("e");
    var sig = ""
    if(+arr[1] + scale > 0) {
      sig = "+";
    }
    return +(Math.round(+arr[0] + "e" + sig + (+arr[1] + scale)) + "e-" + scale);
  }
}

//Función Listar
function listar10(){

	tabla=$('#tbllistado10').dataTable(
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
					url: '../ajax/libromayor.php?op=listar10',
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

function suma_debe_haber10(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c10", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe").val(total);
		$("#haber").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber").val(x);

			$("#saldo_debe").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe").val(y);
			$("#saldo_haber").val('0');
		}

 	});
}

function listar12(){

	tabla=$('#tbllistado12').dataTable(
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
					url: '../ajax/libromayor.php?op=listar12',
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

function suma_debe_haber12(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c12", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe12").val(total);
		$("#haber12").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber12").val(x);

			$("#saldo_debe12").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe12").val(y);
			$("#saldo_haber12").val('0');
		}

 	});
}

function listar14(){

	tabla=$('#tbllistado14').dataTable(
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
					url: '../ajax/libromayor.php?op=listar14',
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

function suma_debe_haber14(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c14", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe14").val(total);
		$("#haber14").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber14").val(x);

			$("#saldo_debe14").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe14").val(y);
			$("#saldo_haber14").val('0');
		}

 	});
}

//Función Listar
function listar20(){

	tabla=$('#tbllistado20').dataTable(
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
					url: '../ajax/libromayor.php?op=listar20',
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

function suma_debe_haber20(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c20", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe20").val(total);
		$("#haber20").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber20").val(x);

			$("#saldo_debe20").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe20").val(y);
			$("#saldo_haber20").val('0');
		}

 	});
}

function listar33(){

	tabla=$('#tbllistado33').dataTable(
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
					url: '../ajax/libromayor.php?op=listar33',
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

function suma_debe_haber33(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c33", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe33").val(total);
		$("#haber33").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber33").val(x);

			$("#saldo_debe33").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe33").val(y);
			$("#saldo_haber33").val('0');
		}

 	});
}

function listar40(){

	tabla=$('#tbllistado40').dataTable(
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
					url: '../ajax/libromayor.php?op=listar40',
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

function suma_debe_haber40(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c40", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe40").val(total);
		$("#haber40").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber40").val(x);

			$("#saldo_debe40").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe40").val(y);
			$("#saldo_haber40").val('0');
		}

 	});
}

function listar41(){

	tabla=$('#tbllistado41').dataTable(
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
					url: '../ajax/libromayor.php?op=listar41',
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

function suma_debe_haber41(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c41", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe41").val(total);
		$("#haber41").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber41").val(x);

			$("#saldo_debe41").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe41").val(y);
			$("#saldo_haber41").val('0');
		}

 	});
}

function listar42(){

	tabla=$('#tbllistado42').dataTable(
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
					url: '../ajax/libromayor.php?op=listar42',
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

function suma_debe_haber42(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c42", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe42").val(total);
		$("#haber42").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber42").val(x);

			$("#saldo_debe42").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe42").val(y);
			$("#saldo_haber42").val('0');
		}

 	});
}

function listar45(){

	tabla=$('#tbllistado45').dataTable(
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
					url: '../ajax/libromayor.php?op=listar45',
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

function suma_debe_haber45(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c45", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe45").val(total);
		$("#haber45").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber45").val(x);

			$("#saldo_debe45").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe45").val(y);
			$("#saldo_haber45").val('0');
		}

 	});
}

function listar46(){

	tabla=$('#tbllistado46').dataTable(
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
					url: '../ajax/libromayor.php?op=listar46',
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

function suma_debe_haber46(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c46", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe46").val(total);
		$("#haber46").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber46").val(x);

			$("#saldo_debe46").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe46").val(y);
			$("#saldo_haber46").val('0');
		}

 	});
}

function listar50(){

	tabla=$('#tbllistado50').dataTable(
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
					url: '../ajax/libromayor.php?op=listar50',
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

function suma_debe_haber50(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c50", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe50").val(total);
		$("#haber50").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber50").val(x);

			$("#saldo_debe50").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe50").val(y);
			$("#saldo_haber50").val('0');
		}

 	});
}

function listar59(){

	tabla=$('#tbllistado59').dataTable(
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
					url: '../ajax/libromayor.php?op=listar59',
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

function suma_debe_haber59(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c59", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe59").val(total);
		$("#haber59").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber59").val(x);

			$("#saldo_debe59").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe59").val(y);
			$("#saldo_haber59").val('0');
		}

 	});
}

function listar60(){

	tabla=$('#tbllistado60').dataTable(
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
					url: '../ajax/libromayor.php?op=listar60',
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

function suma_debe_haber60(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c60", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe60").val(total);
		$("#haber60").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber60").val(x);

			$("#saldo_debe60").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe60").val(y);
			$("#saldo_haber60").val('0');
		}

 	});
}

function listar61(){

	tabla=$('#tbllistado61').dataTable(
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
					url: '../ajax/libromayor.php?op=listar61',
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

function suma_debe_haber61(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c61", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe61").val(total);
		$("#haber61").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber61").val(x);

			$("#saldo_debe61").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe61").val(y);
			$("#saldo_haber61").val('0');
		}

 	});
}

function listar62(){

	tabla=$('#tbllistado62').dataTable(
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
					url: '../ajax/libromayor.php?op=listar62',
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

function suma_debe_haber62(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c62", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe62").val(total);
		$("#haber62").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber62").val(x);

			$("#saldo_debe62").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe62").val(y);
			$("#saldo_haber62").val('0');
		}

 	});
}

function listar63(){

	tabla=$('#tbllistado63').dataTable(
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
					url: '../ajax/libromayor.php?op=listar63',
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

function suma_debe_haber63(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c63", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe63").val(total);
		$("#haber63").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber63").val(x);

			$("#saldo_debe63").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe63").val(y);
			$("#saldo_haber63").val('0');
		}

 	});
}

function listar69(){

	tabla=$('#tbllistado69').dataTable(
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
					url: '../ajax/libromayor.php?op=listar69',
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

function suma_debe_haber69(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c69", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe69").val(total);
		$("#haber69").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber69").val(x);

			$("#saldo_debe69").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe69").val(y);
			$("#saldo_haber69").val('0');
		}

 	});
}

function listar70(){

	tabla=$('#tbllistado70').dataTable(
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
					url: '../ajax/libromayor.php?op=listar70',
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

function suma_debe_haber70(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c70", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe70").val(total);
		$("#haber70").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber70").val(x);

			$("#saldo_debe70").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe70").val(y);
			$("#saldo_haber70").val('0');
		}

 	});
}

function listar79(){

	tabla=$('#tbllistado79').dataTable(
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
					url: '../ajax/libromayor.php?op=listar79',
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

function suma_debe_haber79(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c79", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe79").val(total);
		$("#haber79").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber79").val(x);

			$("#saldo_debe79").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe79").val(y);
			$("#saldo_haber79").val('0');
		}

 	});
}

function listar94(){

	tabla=$('#tbllistado94').dataTable(
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
					url: '../ajax/libromayor.php?op=listar94',
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

function suma_debe_haber94(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c94", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe94").val(total);
		$("#haber94").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber94").val(x);

			$("#saldo_debe94").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe94").val(y);
			$("#saldo_haber94").val('0');
		}

 	});
}

function listar95(){

	tabla=$('#tbllistado95').dataTable(
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
					url: '../ajax/libromayor.php?op=listar95',
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

function suma_debe_haber95(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c95", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		$("#debe95").val(total);
		$("#haber95").val(totall);
		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			//console.log(x);
			$("#saldo_haber95").val(x);

			$("#saldo_debe95").val('0');
			//$("#saldo_haber").val('0');
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			$("#saldo_debe95").val(y);
			$("#saldo_haber95").val('0');
		}

 	});
}


//funcion para la suma del debe y el haber
//var diez=10;

//Función ListarArticulos
/*function listarArticulos(){
	tabla=$('#tblarticulos').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		        ],
		"ajax":
				{
					url: '../ajax/libromayor.php?op=listarPedido_venta',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función ListarArticulos
function listarDetalleuniq(){
		tabla=$('#detallesuniq').dataTable(
		{
			"aProcessing": true,//Activamos el procesamiento del datatables
		    "aServerSide": true,//Paginación y filtrado realizados por el servidor
		    dom: 'Bfrtip',//Definimos los elementos del control de tabla
		    buttons: [		          
			            
			        ],
			"ajax":
					{
						url: '../ajax/libromayor.php?op=listarDetalleuniq',
						type : "get",
						dataType : "json",						
						error: function(e){
							console.log(e.responseText);	
						}
					},
			"bDestroy": true,
			"iDisplayLength": 5,//Paginación
		    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
		}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e){
	e.preventDefault(); //No se activará la acción predeterminada del evento
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/ingreso.php?op=guardaryeditar",
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

function mostrar(idingreso){
	$.post("../ajax/ingreso.php?op=mostrar",{idingreso : idingreso}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idproveedor").val(data.idproveedor);
		$("#idproveedor").selectpicker('refresh');
		$("#tipo_comprobante").val(data.tipo_comprobante);
		$("#tipo_comprobante").selectpicker('refresh');
		$("#serie_comprobante").val(data.serie_comprobante);
		$("#num_comprobante").val(data.num_comprobante);
		$("#fecha_hora").val(data.fecha);
		$("#impuesto").val(data.impuesto);
		$("#idingreso").val(data.idingreso);

		//Ocultar y mostrar los botones
		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		$("#btnAgregarArt").hide();
		$("#btnAgregarfila").show();
 	});

 	$.post("../ajax/ingreso.php?op=listarDetalle&id="+idingreso,function(r){
	        $("#detalles").html(r);
	});
}

//Función para anular registros
function anular(idingreso){
	bootbox.confirm("¿Está Seguro de anular el ingreso?", function(result){
		if(result)
        {
        	$.post("../ajax/ingreso.php?op=anular", {idingreso : idingreso}, function(e){
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

function marcarImpuesto(){
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
/*function total_pedido_ld(total){
	console.log(total)
	var totalll;

	$.post("../ajax/libromayor.php?op=total_pedido_ld",{total : total}, function(data, status)
	{
		data = JSON.parse(data);		
		//console.log(data);
		totalll= data['Detalle'][0]['total_pedido'];
		console.log(totalll);
 	});
}
function agregarfila(){
	//total_pedido_ld(idarticulo);
  	var cantidad=1;
    var precio_compra=1;
    var precio_venta=1;
    var denominacion='Denominación';
  	//var totall=totalll;

	var subtotal=cantidad*precio_compra;
	var fila='<tr class="filas" id="fila'+cont+'">'+
	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
	'<td><input type="text" style="width: 50px" name="n_operacion[]" id="n_operacion[]" value="'+cantidad+'"></td>'+
	'<td><input type="Date" style="width: 118px" name="fecha[]" id="fecha[]" value="" required></td>'+
	'<td><textarea type="text" cols="15" rows="2" style="resize: both;" name="glosa[]" id="glosa[]" value="" placeholder="Escribe la glosa de la operacion"></textarea></td>'+
	'<td><select id="id_libroC[]" name="id_libroC[]" style="width: 90px" class="form-control" required>'+
    	'<option value="33">select</option>'+
    	'<option value="1"> 1 Libro Caja y Bancos</option>'+
		'<option value="2"> 2 Libro Ingresos y Gastos</option>'+
		'<option value="3"> 3 Libro de Inventarios y Balances</option>'+
		'<option value="4"> 4 Libro de Retenciones Incisos E) y F) del Articulo</option>'+
		'<option value="5"> 5 Libro Diario</option>'+
		'<option value="6"> 5-A Libro Diario de Formato Simplificado</option>'+
		'<option value="7"> 6 Libro Mayor</option>'+
		'<option value="8"> 7 Registro de Activos Fijos</option>'+
		'<option value="9"> 8 Registro de Compras</option>'+
		'<option value="10">9 Registro de Consignaciones</option>'+
		'<option value="11">10 Registro de Costos</option>'+
		'<option value="12">11 Registro de Huéspedes</option>'+
		'<option value="13">12 Registro de Inventario Permanente Unidades Físicas</option>'+
		'<option value="14">13 Registro de Inventario Permanente Valorizado</option>'+
		'<option value="15">14 Registro de Ventas e Ingresos</option>'+
		'<option value="16">15 Registro de Ventas e Ingresos-Artículo 23° Res. de Superintendencia N° 266-2004/SUNAT</option>'+
	  	'<option value="17">16 Registro del Régimen de Percepciones</option>'+
	 	'<option value="18">17 Registro del Régimen de Retenciones</option>'+
	  	'<option value="19">18 Registro IVAP</option>'+
	  	'<option value="20">19 Registro(s) Auxiliar(es) de Adquisiciones-Articulo 8° Resolución de Superintendencia N° 022-98/SUNAT</option>'+
	  	'<option value="21">20 Registro(s) Auxiliar(es) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 021-99/SUNAT</option>'+
	  	'<option value="22">21 Registro(s) Auxiliar(es) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 142-2001/SUNAT</option>'+
	  	'<option value="23">22 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Resolución de Superintendencia N° 256-2004/SUNAT</option>'+
	  	'<option value="24">23 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 257-2004/SUNAT</option>'+
	  	'<option value="25">24 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 258-2004/SUNAT</option>'+
	  	'<option value="26">25 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 259-2004/SUNAT</option>'+
	  	'<option value="27">26 Registro de Retenciones Artículo 77-A de la Ley de Impuesto a la Renta</option>'+
	  	'<option value="28">27 Libro de Actas de la Empresa Individual de Responsabilidad Limitada</option>'+
	  	'<option value="29">28 Libro de Actas de la Junta General de Accionistas</option>'+
	  	'<option value="30">29 Libro de Actas del Directorio</option>'+
	  	'<option value="31">30 Libro de Matrícula de Acciones</option>'+
	  	'<option value="32">31 Libro de Planillas</option>'+'</select>'+'</td>'+
	'<td><input type="text" style="width: 40px" name="idarticulo[]" value="">'+'</td>'+
	'<td><input type="text" readonly style="width: 70px" name="idarticulo[]" value="">'+'</td>'+
	'<td><input type="number"  style="width: 70px" name="idarticulo[]" min="10" value="">'+'</td>'+
	'<td><input type="text" name="precio_compra[]" id="precio_compra[]" value=""></td>'+
	'<td><input type="number" style="width: 70px" name="precio_compra[]" id="total_ld[]" value=""></td>'+
	'<td><input type="number" style="width: 70px" name="precio_compra[]"  value=""></td>'+
	'<td><button type="button" onclick="modificarSubototales()" class="btn btn-info"><i class="fa fa-refresh"></i></button></td>'+
	'</tr>';
	cont++;
	detalles=detalles+1;
	$('#detalles').append(fila);
	//$('#fila').append(fila);
	modificarSubototales();
}

function agregarDatellepedido(idarticulo,articulo,totall){
	//total_pedido_ld(idarticulo);
  	var cantidad=1;
    var precio_compra=1;
    var precio_venta=1;
    var denominacion='Denominación';
  	//var totall=totalll;

    if (idarticulo!="")
    {
    	var subtotal=cantidad*precio_compra;
    	var fila='<tr class="filas" id="fila'+cont+'">'+
    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
    	'<td><input type="text" style="width: 50px" name="n_operacion[]" id="n_operacion[]" value="'+cantidad+'"></td>'+
    	'<td><input type="Date" style="width: 118px" name="fecha[]" id="fecha[]" value="" required></td>'+
    	'<td><textarea type="text" cols="15" rows="2" style="resize: both;" name="glosa[]" id="glosa[]" value="" placeholder="Escribe la glosa de la operacion"></textarea></td>'+
    	'<td><select id="id_libroC[]" name="id_libroC[]" style="width: 90px" class="form-control" required>'+
    	'<option value="33">select</option>'+
    	'<option value="1"> 1 Libro Caja y Bancos</option>'+
		'<option value="2"> 2 Libro Ingresos y Gastos</option>'+
		'<option value="3"> 3 Libro de Inventarios y Balances</option>'+
		'<option value="4"> 4 Libro de Retenciones Incisos E) y F) del Articulo</option>'+
		'<option value="5"> 5 Libro Diario</option>'+
		'<option value="6"> 5-A Libro Diario de Formato Simplificado</option>'+
		'<option value="7"> 6 Libro Mayor</option>'+
		'<option value="8"> 7 Registro de Activos Fijos</option>'+
		'<option value="9"> 8 Registro de Compras</option>'+
		'<option value="10">9 Registro de Consignaciones</option>'+
		'<option value="11">10 Registro de Costos</option>'+
		'<option value="12">11 Registro de Huéspedes</option>'+
		'<option value="13">12 Registro de Inventario Permanente Unidades Físicas</option>'+
		'<option value="14">13 Registro de Inventario Permanente Valorizado</option>'+
		'<option value="15">14 Registro de Ventas e Ingresos</option>'+
		'<option value="16">15 Registro de Ventas e Ingresos-Artículo 23° Res. de Superintendencia N° 266-2004/SUNAT</option>'+
	  	'<option value="17">16 Registro del Régimen de Percepciones</option>'+
	 	'<option value="18">17 Registro del Régimen de Retenciones</option>'+
	  	'<option value="19">18 Registro IVAP</option>'+
	  	'<option value="20">19 Registro(s) Auxiliar(es) de Adquisiciones-Articulo 8° Resolución de Superintendencia N° 022-98/SUNAT</option>'+
	  	'<option value="21">20 Registro(s) Auxiliar(es) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 021-99/SUNAT</option>'+
	  	'<option value="22">21 Registro(s) Auxiliar(es) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 142-2001/SUNAT</option>'+
	  	'<option value="23">22 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Resolución de Superintendencia N° 256-2004/SUNAT</option>'+
	  	'<option value="24">23 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 257-2004/SUNAT</option>'+
	  	'<option value="25">24 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 258-2004/SUNAT</option>'+
	  	'<option value="26">25 Registro(s) Auxiliar(s) de Adquisiciones-Insiso A) Primer Párrafo Artículo 5° Res. de Superintendencia N° 259-2004/SUNAT</option>'+
	  	'<option value="27">26 Registro de Retenciones Artículo 77-A de la Ley de Impuesto a la Renta</option>'+
	  	'<option value="28">27 Libro de Actas de la Empresa Individual de Responsabilidad Limitada</option>'+
	  	'<option value="29">28 Libro de Actas de la Junta General de Accionistas</option>'+
	  	'<option value="30">29 Libro de Actas del Directorio</option>'+
	  	'<option value="31">30 Libro de Matrícula de Acciones</option>'+
	  	'<option value="32">31 Libro de Planillas</option>'+'</select>'+'</td>'+
    	'<td><input type="text" style="width: 40px" name="idarticulo[]" value="">'+'</td>'+
    	'<td><input type="text" readonly style="width: 70px" name="idarticulo[]" value="'+articulo+'">'+'</td>'+
    	'<td><input type="number"  style="width: 70px" name="idarticulo[]" min="10" value="'+idarticulo+'">'+'</td>'+
    	'<td><input type="text" name="precio_compra[]" id="precio_compra[]" value="'+denominacion+'"></td>'+
    	'<td><input type="number" style="width: 70px" name="precio_compra[]" id="total_ld[]" value="'+totall+'"></td>'+
    	'<td><input type="number" style="width: 70px" name="precio_compra[]"  value="'+totall+'"></td>'+
    	'<td><button type="button" onclick="modificarSubototales()" class="btn btn-info"><i class="fa fa-refresh"></i></button></td>'+
    	'</tr>';
    	cont++;
    	detalles=detalles+1;
    	$('#detalles').append(fila);
    	//$('#fila').append(fila);
    	modificarSubototales();
    }
    else
    {
    	alert("Error al ingresar el detalle, revisar los datos del artículo");
    }
}


function modificarSubototales(){
  	var cant = document.getElementsByName("cantidad[]");
    var prec = document.getElementsByName("precio_compra[]");
    var sub = document.getElementsByName("subtotal");

    for (var i = 0; i <cant.length; i++) {
    	var inpC=cant[i];
    	var inpP=prec[i];
    	var inpS=sub[i];

    	inpS.value=inpC.value * inpP.value;
    	document.getElementsByName("subtotal")[i].innerHTML = inpS.value;
    }
    calcularTotales();

}
function calcularTotales(){
  	var sub = document.getElementsByName("subtotal");
  	var total = 0.0;

  	for (var i = 0; i <sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;
	}
	$("#total").html("S/. " + total);
    $("#total_compra").val(total);
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
  	evaluar();
  }*/

init();