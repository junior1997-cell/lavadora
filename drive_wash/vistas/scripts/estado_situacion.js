
//Función que se ejecuta al inicio
function init(){
	suma_debe_haber10();
	suma_debe_haber12();
	suma_debe_haber14();
	suma_debe_haber20();
	suma_debe_haber33();
	suma_debe_haber40();
	suma_debe_haber41();
	suma_debe_haber42();
	suma_debe_haber45();
	suma_debe_haber50();
	//suma_debe_haber59();
	totalestadosituacionfinanciera();

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


function suma_debe_haber10(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c10", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);

			document.getElementById("activo10").innerHTML = x;

		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("activo10").innerHTML = 0;


		}

 	});
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

			document.getElementById("activo12").innerHTML = x;

		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("activo12").innerHTML = 0;
		}

 	});
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

			document.getElementById("activo14").innerHTML = x;

		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("activo14").innerHTML = 0;

		}

 	});
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

			document.getElementById("activo20").innerHTML = x;

		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("activo20").innerHTML = 0;
		}

 	});
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
			var pa=0;
			document.getElementById("activo33").innerHTML = x;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("activo33").innerHTML = 0;
		}

 	});
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

			document.getElementById("paspat40").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("paspat40").innerHTML = y;
		}

 	});
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

			document.getElementById("paspat41").innerHTML = x;

		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("paspat41").innerHTML = 0;
		}

 	});
}

function suma_debe_haber42(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c42", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);

			document.getElementById("paspat42").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("paspat42").innerHTML = y;
			
		}

 	});
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

			document.getElementById("paspat45").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("paspat45").innerHTML = y;

		}

 	});
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

			document.getElementById("paspat50").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("paspat50").innerHTML = y;
		}

 	});
}
/*function suma_debe_haber59(){

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

			document.getElementById("paspat59").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("paspat59").innerHTML = y;

		}

 	});
}*/

/*Funciones para sumar los totales*/

function totalestadosituacionfinanciera(){
	$.post("../ajax/balance.php?op=totaldebehabercuentas", function(data){

		data = JSON.parse(data);

		/*Estado de Situacion Financiera Cuentas Solo Para el TOTAL ACTIVO CORRIENTE*/
		d10= data['Detalle10'][0]['debe'];
		h10= data['Detalle10'][0]['haber'];
		
		d12= data['Detalle12'][0]['debe'];
		h12= data['Detalle12'][0]['haber'];
		
		d14= data['Detalle14'][0]['debe'];
		h14= data['Detalle14'][0]['haber'];
		
		d20= data['Detalle20'][0]['debe'];
		h20= data['Detalle20'][0]['haber'];

		/*Estados Situción Financiera Cuentas Solo Para el TOTAL ACTIVO NO CORRIENTE*/
		d33= data['Detalle33'][0]['debe'];
		h33= data['Detalle33'][0]['haber'];
		
		/*Estados Situción Financiera Cuentas Solo Para el TOTAL PASIVO CORRIENTE*/
		d40= data['Detalle40'][0]['debe'];
		h40= data['Detalle40'][0]['haber'];
		
		d41= data['Detalle41'][0]['debe'];
		h41= data['Detalle41'][0]['haber'];
		
		d42= data['Detalle42'][0]['debe'];
		h42= data['Detalle42'][0]['haber'];
		
		/*Estados Situción Financiera Cuentas Solo Para el TOTAL PASIVO NO CORRIENTE*/
		d45= data['Detalle45'][0]['debe'];
		h45= data['Detalle45'][0]['haber'];
		
		/*Estados Situción Financiera Cuentas Solo Para el TOTAL PASIVO Y PATRIMONIO*/
		d50= data['Detalle50'][0]['debe'];
		h50= data['Detalle50'][0]['haber'];
		
		d59= data['Detalle59'][0]['debe'];
		h59= data['Detalle59'][0]['haber'];

		d60= data['Detalle60'][0]['debe'];
		h60= data['Detalle60'][0]['haber'];

		d61= data['Detalle61'][0]['debe'];
		h62= data['Detalle61'][0]['haber'];

		d63= data['Detalle63'][0]['debe'];
		h63= data['Detalle63'][0]['haber'];

		d69= data['Detalle69'][0]['debe'];
		h69= data['Detalle69'][0]['haber'];

		d70= data['Detalle70'][0]['debe'];
		h70= data['Detalle70'][0]['haber'];

		d94= data['Detalle94'][0]['debe'];
		h94= data['Detalle94'][0]['haber'];

		d95= data['Detalle95'][0]['debe'];
		h95= data['Detalle95'][0]['haber'];

		//if(d10>h10 || d12>h12 || d14>h14 || d20>h20 || d33>h33 || d40>h40 || d41>h41 || d42>h42 || d45>h45 || d46>h46 || d50>h50 ||d59>h59){
			
			/*Suma Total del Activo Corriente*/
			var s10 = d10-h10;
			var s12 = d12-h12;
			var s14 = d14-h14;
			var s20 = d20-h20;
			
			var a=s10+s12+s14+s20;
			var sumaTAC =roundNumber(a, 3);
			document.getElementById("totalAC").innerHTML = sumaTAC;

			/*Suma del total Activo No Corriente*/
			var s33 = d33-h33;

			var b=s33;
			var sumaTANC =roundNumber(b, 3);
			document.getElementById("totalANC").innerHTML = sumaTANC;

			/*Suma Total del ACTIVO*/
			var c=sumaTAC+sumaTANC;
			var sumaTA =roundNumber(c, 3);
			document.getElementById("totalA").innerHTML = sumaTA;

			/*Suma Total del Pasivo Corriente*/
			var s40 = d40-h40;
			var s41 = d41-h41;
			var s42 = d42-h42;

			var d=(-s40+s41-s42);
			console.log(d);
			var sumaTPC =roundNumber(d, 3);
			document.getElementById("totalPC").innerHTML = sumaTPC;

			/*Total del Pasivo No Corriente*/
			var s45 = h45-d45;

			var e=s45;
			var sumaTPNC =roundNumber(e, 3);
			document.getElementById("totalPNC").innerHTML = sumaTPNC;
			///---------------------
			resultados=parseFloat(d69)+parseFloat(d94)+parseFloat(d95);

			setent=parseFloat(h70);
			restaaa=resultados-setent;
			console.log(restaaa);

			console.log('aaaaaaaaaaa',resultados);
			console.log('a',setent);
			////--------------------
			if (d59>h59) {

			var resta=d59-h59;
			var x= roundNumber(resta,3);

			document.getElementById("paspat59").innerHTML = 0;
			}else{
			var restb=h59-d59;
			var y= roundNumber(restb,3);
			var abs=y-restaaa;

			document.getElementById("paspat59").innerHTML = abs;

			}


			//var s46 = d46-h46;
			/*Suma Total del PASIVO y PATRIMONIO*/
			var s50 = h50-d50;
			var s59 = h59-d59;

			var f=sumaTPC+sumaTPNC+s50+abs;
			var sumaTPSPT =roundNumber(f, 3);
			document.getElementById("totalPSPT").innerHTML = sumaTPSPT;


	});
}





/*unction sumaAC (){

	var rpta = "activo10" + "activo12";


	document.getElementById("TAC").innerHTML = rpta;
}*/

init();