var tabla;

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
	tdfilas();
	//total();
	total_debe();
	//aportes();
	totaldebehabercuentas();
	
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

function totaldebehabercuentas(){
	$.post("../ajax/balance.php?op=totaldebehabercuentas", function(data){

		data = JSON.parse(data);

		d10= data['Detalle10'][0]['debe'];
		h10= data['Detalle10'][0]['haber'];
		
		d12= data['Detalle12'][0]['debe'];
		h12= data['Detalle12'][0]['haber'];
		
		d14= data['Detalle14'][0]['debe'];
		h14= data['Detalle14'][0]['haber'];
		
		d20= data['Detalle20'][0]['debe'];
		h20= data['Detalle20'][0]['haber'];
		
		d33= data['Detalle33'][0]['debe'];
		h33= data['Detalle33'][0]['haber'];
		
		d40= data['Detalle40'][0]['debe'];
		h40= data['Detalle40'][0]['haber'];
		
		d41= data['Detalle41'][0]['debe'];
		h41= data['Detalle41'][0]['haber'];
		
		d42= data['Detalle42'][0]['debe'];
		h42= data['Detalle42'][0]['haber'];
		
		d45= data['Detalle45'][0]['debe'];
		h45= data['Detalle45'][0]['haber'];
		
		d46= data['Detalle46'][0]['debe'];
		h46= data['Detalle46'][0]['haber'];
		
		d50= data['Detalle50'][0]['debe'];
		h50= data['Detalle50'][0]['haber'];
		
		d59= data['Detalle59'][0]['debe'];
		h59= data['Detalle59'][0]['haber'];
		
		d60= data['Detalle60'][0]['debe'];
		h60= data['Detalle60'][0]['haber'];
		
		d61= data['Detalle61'][0]['debe'];
		h61= data['Detalle61'][0]['haber'];
		
		d62= data['Detalle62'][0]['debe'];
		h62= data['Detalle62'][0]['haber'];
		
		d63= data['Detalle63'][0]['debe'];
		h63= data['Detalle63'][0]['haber'];
		
		d69= data['Detalle69'][0]['debe'];
		h69= data['Detalle69'][0]['haber'];
		
		d70= data['Detalle70'][0]['debe'];
		h70= data['Detalle70'][0]['haber'];

		d79= data['Detalle79'][0]['debe'];
		h79= data['Detalle79'][0]['haber'];
		
		d94= data['Detalle94'][0]['debe'];
		h94= data['Detalle94'][0]['haber'];
		
		d95= data['Detalle95'][0]['debe'];
		h95= data['Detalle95'][0]['haber'];

		//if(d10>h10 || d12>h12 || d14>h14 || d20>h20 || d33>h33 || d40>h40 || d41>h41 || d42>h42 || d45>h45 || d46>h46 || d50>h50 ||d59>h59){
			var s10 = d10-h10;
			console.log(s10);
			var s12 = d12-h12;
			var s14 = d14-h14;
			var s20 = d20-h20;
			var s33 = d33-h33;
			var s40 = d40-h40;
			var s41 = d41-h41;
			var s42 = d42-h42;
			var s45 = d45-h45;
			var s46 = d46-h46;
			var s50 = d50-h50;
			var s59 = d59-h59;
			var s60 = d60-h60;
			var s61 = d61-h61;
			//console.log(s61);
			var s62 = d62-h62;
			var s63 = d63-h63;
			var s69 = d69-h69;
			var s70 = d70-h70;
			console.log(s70);
			var s79 = d79-h79;
			//console.log(s79);

			var s94 = d94-h94;
			var s95 = d95-h95;
				//eeff --activo
			var aaa=s10+s12+s14+s20+s33+s41;
			var sumat =roundNumber(aaa, 3);
			document.getElementById("totalactivo").innerHTML = sumat;
				//saldos --pasivo y patrimonio
			var subtotalpastp=-(+s40+s42+s45+s50+s59);
			var totalpastp =roundNumber(subtotalpastp, 2);
			document.getElementById("totalpastp").innerHTML = totalpastp;
				//saldos --Acreedor
			var totalacreedor =subtotalpastp-s61-s70-s79;
			var totalacreedorr =roundNumber(totalacreedor, 3);
			document.getElementById("totalacreedor").innerHTML = totalacreedorr;
			//saldos ---Deudor
			var aa=s10+s12+s14+s20+s33+s41;
			var totaldeudor =aa+s60+s62+s63+s69+s94+s95;
			var totaldeudorr =roundNumber(totaldeudor, 1);
			document.getElementById("totaldeudor").innerHTML = totaldeudorr;		
			//perdida
			var subperdida = s69+s94+s95;
			var perdidatotal =roundNumber(subperdida, 3);
			document.getElementById("perdidatotal").innerHTML = perdidatotal;
			//ganacias
			var ganacias =-(s70+subperdida);
			var perdidatotal =roundNumber(ganacias, 1);
			var xxx= Math.round(perdidatotal);
			document.getElementById("ganacias").innerHTML = xxx;
			//resta EEFF
			var actpatr =aaa-subtotalpastp;
			/*console.log('act',sumat);
			console.log('patr',totalpastp);*/
			document.getElementById("actpatr").innerHTML = actpatr;
			//---------ultimo------
			document.getElementById("rest70").innerHTML = -s70;
			document.getElementById("rest700").innerHTML = -s70;

			document.getElementById("restact").innerHTML = sumat;
			document.getElementById("restactt").innerHTML = sumat;



	});
}


function suma_debe_haber10(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c10", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);
		document.getElementById("bcDiezd").innerHTML = tdebe;
		document.getElementById("bcDiezh").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);

			document.getElementById("bcDeudordd10").innerHTML = x;
			document.getElementById("bcacreedordd10").innerHTML = 0;
			$("#aaaa").val(x);

			document.getElementById("activo10").innerHTML = x;
			document.getElementById("paspat10").innerHTML = 0;

		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);
			
			document.getElementById("bcacreedordd10").innerHTML = y;
			document.getElementById("bcDeudordd10").innerHTML = 0;
			
			document.getElementById("paspat10").innerHTML = y;
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

		//
		document.getElementById("bcdoced").innerHTML = tdebe;
		document.getElementById("bcdoceh").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd12").innerHTML = x;
			document.getElementById("bcacreedordd12").innerHTML = acre;

			document.getElementById("activo12").innerHTML = x;
			document.getElementById("paspat12").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd12").innerHTML = 0;
			document.getElementById("bcacreedordd12").innerHTML = y;

			document.getElementById("paspat12").innerHTML = y;
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

		document.getElementById("bccatod").innerHTML = tdebe;
		document.getElementById("bccatoh").innerHTML = thaber;


		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd14").innerHTML = x;
			document.getElementById("bcacreedordd14").innerHTML = acre;

			document.getElementById("activo14").innerHTML = x;
			document.getElementById("paspat14").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd14").innerHTML = 0;
			document.getElementById("bcacreedordd14").innerHTML = y;

			document.getElementById("paspat14").innerHTML = y;
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
		//
		document.getElementById("bcventd").innerHTML = tdebe;
		document.getElementById("bcventh").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd20").innerHTML = x;
			document.getElementById("bcacreedordd20").innerHTML = acre;

			document.getElementById("activo20").innerHTML = x;
			document.getElementById("paspat20").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd20").innerHTML = 0;
			document.getElementById("bcacreedordd20").innerHTML = y;

			document.getElementById("paspat20").innerHTML = y;
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
		document.getElementById("cbtresd").innerHTML = tdebe;
		document.getElementById("cbtresh").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd33").innerHTML = x;
			document.getElementById("bcacreedordd33").innerHTML = acre;

			document.getElementById("activo33").innerHTML = x;
			document.getElementById("paspat33").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd33").innerHTML = 0;
			document.getElementById("bcacreedordd33").innerHTML = y;

			document.getElementById("paspat33").innerHTML = y;
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
		//
		document.getElementById("cbcuarentd").innerHTML = tdebe;cbcuarentdosd
		document.getElementById("cbcuarenth").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd40").innerHTML = x;
			document.getElementById("bcacreedordd40").innerHTML = acre;

			document.getElementById("activo40").innerHTML = x;
			document.getElementById("paspat40").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd40").innerHTML = 0;
			document.getElementById("bcacreedordd40").innerHTML = y;

			document.getElementById("paspat40").innerHTML = y;
			document.getElementById("activo40").innerHTML = 0;
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
		//
		document.getElementById("cbcuarentunod").innerHTML = tdebe;
		document.getElementById("cbcuarentunoh").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd41").innerHTML = x;
			document.getElementById("bcacreedordd41").innerHTML = acre;

			document.getElementById("activo41").innerHTML = x;
			document.getElementById("paspat41").innerHTML = 0;

		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd41").innerHTML = 0;
			document.getElementById("bcacreedordd41").innerHTML = y;

			document.getElementById("paspat41").innerHTML = y;
			document.getElementById("activo41").innerHTML = 0;
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
		//
		document.getElementById("cbcuarentdosd").innerHTML = tdebe;
		document.getElementById("cbcuarentdosh").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd42").innerHTML = x;
			document.getElementById("bcacreedordd42").innerHTML = acre;

			document.getElementById("activo42").innerHTML = x;
			document.getElementById("paspat42").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd42").innerHTML = 0;
			document.getElementById("bcacreedordd42").innerHTML = y;

			document.getElementById("paspat42").innerHTML = y;
			document.getElementById("activo42").innerHTML = 0;
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
		//
		document.getElementById("cbcuarentcincod").innerHTML = tdebe;
		document.getElementById("cbcuarentcincoh").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd45").innerHTML = x;
			document.getElementById("bcacreedordd45").innerHTML = acre;

			document.getElementById("activo45").innerHTML = x;
			document.getElementById("paspat45").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd45").innerHTML = 0;
			document.getElementById("bcacreedordd45").innerHTML = y;

			document.getElementById("paspat45").innerHTML = y;
			document.getElementById("activo45").innerHTML = 0;
		}

 	});
}

function suma_debe_haber46(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c46", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);
				//
		document.getElementById("cbcuarentseisd").innerHTML = tdebe;
		document.getElementById("cbcuarentseish").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd46").innerHTML = x;
			document.getElementById("bcacreedordd46").innerHTML = acre;

			document.getElementById("activo46").innerHTML = x;
			document.getElementById("paspat46").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd46").innerHTML = 0;
			document.getElementById("bcacreedordd46").innerHTML = y;

			document.getElementById("paspat46").innerHTML = y;
			document.getElementById("activo46").innerHTML = 0;
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

		//
		document.getElementById("cbcincuentcerod").innerHTML = tdebe;
		document.getElementById("cbcincuentceroh").innerHTML = thaber;

		if (tdebe>thaber) {

			var cont_deudor=0;
			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd50").innerHTML = x;
			document.getElementById("bcacreedordd50").innerHTML = acre;

			document.getElementById("activo50").innerHTML = x;
			document.getElementById("paspat50").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd50").innerHTML = 0;
			document.getElementById("bcacreedordd50").innerHTML = y;

			document.getElementById("paspat50").innerHTML = y;
			document.getElementById("activo50").innerHTML = 0;

			$("#saldo_debe12").val(y);
			$("#saldo_haber12").val('0');
		}

 	});
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
		//
		document.getElementById("cbcinconueved").innerHTML = tdebe;
		document.getElementById("cbcinconueveh").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd59").innerHTML = x;
			document.getElementById("bcacreedordd59").innerHTML = acre;

			document.getElementById("activo59").innerHTML = x;
			document.getElementById("paspat59").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd59").innerHTML = 0;
			document.getElementById("bcacreedordd59").innerHTML = y;

			document.getElementById("paspat59").innerHTML = y;
			document.getElementById("activo59").innerHTML = 0;
		}

 	});
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
		//
		//
		document.getElementById("cbsesentcerod").innerHTML = tdebe;
		document.getElementById("cbsesentceroh").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd60").innerHTML = x;
			document.getElementById("bcacreedordd60").innerHTML = acre;

			//document.getElementById("activo60").innerHTML = x;
			//document.getElementById("paspat60").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd60").innerHTML = 0;
			document.getElementById("bcacreedordd60").innerHTML = y;

			//document.getElementById("paspat60").innerHTML = y;
			//document.getElementById("activo60").innerHTML = 0;
		}

 	});
}

function suma_debe_haber61(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c61", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);

		document.getElementById("cbsesenunotd").innerHTML=tdebe;
		document.getElementById("cbsesenunoth").innerHTML=thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd61").innerHTML = x;
			document.getElementById("bcacreedordd61").innerHTML = acre;

			/*document.getElementById("activo61").innerHTML = x;
			document.getElementById("paspat61").innerHTML = 0;*/
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd61").innerHTML = 0;
			document.getElementById("bcacreedordd61").innerHTML = y;

			/*document.getElementById("paspat61").innerHTML = y;
			document.getElementById("activo61").innerHTML = 0;*/
		}

 	});
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
		//
		document.getElementById("cbsesentdosd").innerHTML = tdebe;
		document.getElementById("cbsesentdosh").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd62").innerHTML = x;
			document.getElementById("bcacreedordd62").innerHTML = acre;

			/*document.getElementById("activo62").innerHTML = x;
			document.getElementById("paspat62").innerHTML = 0;*/
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd62").innerHTML = 0;
			document.getElementById("bcacreedordd62").innerHTML = y;

			/*document.getElementById("paspat62").innerHTML = y;
			document.getElementById("activo62").innerHTML = 0;*/
		}

 	});
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
		//
		document.getElementById("cbsesenttresd").innerHTML = tdebe;
		document.getElementById("cbsesenttresh").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd63").innerHTML = x;
			document.getElementById("bcacreedordd63").innerHTML = acre;

			/*document.getElementById("activo63").innerHTML = x;
			document.getElementById("paspat63").innerHTML = 0;*/
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd63").innerHTML = 0;
			document.getElementById("bcacreedordd63").innerHTML = y;

			/*document.getElementById("paspat63").innerHTML = y;
			document.getElementById("activo63").innerHTML = 0;*/
		}

 	});
}

function suma_debe_haber69(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c69", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];

		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);
		//
		document.getElementById("cbsesentnueved").innerHTML = tdebe;
		document.getElementById("cbsesentnueveh").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd69").innerHTML = x;
			document.getElementById("bcacreedordd69").innerHTML = acre;

			/*document.getElementById("activo69").innerHTML = x;
			document.getElementById("paspat69").innerHTML = 0;*/
			document.getElementById("perdida69").innerHTML = x;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd69").innerHTML = 0;
			document.getElementById("bcacreedordd69").innerHTML = y;

			/*document.getElementById("paspat69").innerHTML = y;
			document.getElementById("activo69").innerHTML = 0;*/
		}

 	});
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
		//
		document.getElementById("cbsetentd").innerHTML = tdebe;
		document.getElementById("cbsetenth").innerHTML = thaber;


		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd70").innerHTML = x;
			document.getElementById("bcacreedordd70").innerHTML = acre;

			//document.getElementById("activo70").innerHTML = x;
			//document.getElementById("paspat70").innerHTML = 0;


		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd70").innerHTML = 0;
			document.getElementById("bcacreedordd70").innerHTML = y;

			//document.getElementById("paspat70").innerHTML = y;
			//document.getElementById("activo70").innerHTML = 0;
			document.getElementById("ganancia70").innerHTML = y;
			document.getElementById("total70").innerHTML = y;
		}

 	});
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
		//
		document.getElementById("cbsetentnueved").innerHTML = tdebe;
		document.getElementById("cbsetentnueveh").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd79").innerHTML = x;
			document.getElementById("bcacreedordd79").innerHTML = acre;

			//document.getElementById("activo79").innerHTML = x;
			//document.getElementById("paspat79").innerHTML = 0;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd79").innerHTML = 0;
			document.getElementById("bcacreedordd79").innerHTML = y;

			//document.getElementById("paspat79").innerHTML = y;
			//document.getElementById("activo79").innerHTML = 0;
		}

 	});
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
		//
		document.getElementById("cbnoventacuatrod").innerHTML = tdebe;
		document.getElementById("cbnoventacuatroh").innerHTML = thaber;

		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd94").innerHTML = x;
			document.getElementById("bcacreedordd94").innerHTML = acre;

			//document.getElementById("activo94").innerHTML=x;
			//document.getElementById("paspat94").innerHTML = 0;
			document.getElementById("perdida94").innerHTML = x;

		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd94").innerHTML = 0;
			document.getElementById("bcacreedordd94").innerHTML = y;

			//document.getElementById("paspat94").innerHTML = y;
			//document.getElementById("activo94").innerHTML = 0;
		}

 	});
}

function suma_debe_haber95(){

	$.post("../ajax/libromayor.php?op=total_debe_haber_c95", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['debe'];
		totall= data['Detalle'][0]['haber'];
		//

		var tdebe=parseFloat(total, 10);
		var thaber=parseFloat(totall, 10);
		document.getElementById("cbnoventacincod").innerHTML = tdebe;
		document.getElementById("cbnoventacincoh").innerHTML = thaber;
		if (tdebe>thaber) {

			var resta=tdebe-thaber;
			var x= roundNumber(resta,3);
			acre =0;
			document.getElementById("bcDeudordd95").innerHTML = x;
			document.getElementById("bcacreedordd95").innerHTML = acre;

			//document.getElementById("activo95").innerHTML = x;
			//document.getElementById("paspat95").innerHTML = 0;
			document.getElementById("perdida95").innerHTML = x;
		}else{
			var restb=thaber-tdebe;
			var y= roundNumber(restb,3);

			document.getElementById("bcDeudordd95").innerHTML = 0;
			document.getElementById("bcacreedordd95").innerHTML = y;

			//document.getElementById("paspat95").innerHTML = y;
			//document.getElementById("activo95").innerHTML = 0;
		}

 	});
}
function total(){
 	//var c95=document.getElementById("bcDeudordd95").value();
 	//var acciones = document.getElementById('bcDeudordd95');
 	let accion = document.getElementById('bcDeudordd94');
 	//console.log(acciones);
 	console.log(accion);

    //alert(acciones + " " + accion + " ");
 }

function total_debe(){

	$.post("../ajax/balance.php?op=total_debe_balance", function(data)
	{
		data = JSON.parse(data);		

		total= data['Detalle'][0]['totaldebe'];
		totalhaber= data['Detalle'][0]['totalhaber'];
		
		var tdebe=parseFloat(total, 10);
		//var thaber=parseFloat(totall, 10);
		document.getElementById("totaldebe").innerHTML = tdebe;
		document.getElementById("totalhaber").innerHTML = totalhaber;

 	});
}


function tdfilas(){
	var td=
	'<tr>'+
	'<td>10</td>'+
	'<td>EFECTIVO Y EQUIVALENTES DE EFECTIVO</td>'+
	'<td id="bcDiezd" class="sum"></td>'+
	'<td id="bcDiezh"></td>'+
	'<td id="bcDeudordd10" name="bcDeudordd10"></td>'+
	'<td id="bcacreedordd10"></td>'+
	'<td id="activo10"></td>'+
	'<td id="paspat10"></td>'+
	'<td ></td>'+
	'<td ></td>'+
	'</tr>'+
	'<tr>'+
	'<td>12</td>'+
	'<td>CUENTAS POR COBRAR COMERCIALES – TERCEROS</td>'+
	'<td id="bcdoced" class="sum" onkeyup="aportes();"></td>'+
	'<td id="bcdoceh"></td>'+
	'<td id="bcDeudordd12"></td>'+
	'<td id="bcacreedordd12"></td>'+
	'<td id="activo12"></td>'+
	'<td id="paspat12"></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>14</td>'+
	'<td>SERVICIOS Y OTROS CONTRATADOS POR ANTICIPADO</td>'+
	'<td id="bccatod" class="sum" onkeyup="aportes();"></td>'+
	'<td id="bccatoh"></td>'+
	'<td id="bcDeudordd14"></td>'+
	'<td id="bcacreedordd14"></td>'+
	'<td id="activo14"></td>'+
	'<td id="paspat14"></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>20</td>'+
	'<td>MERCADERÍAS</td>'+
	'<td id="bcventd" class="sum" onkeyup="aportes();"></td>'+
	'<td id="bcventh"></td>'+
	'<td id="bcDeudordd20"></td>'+
	'<td id="bcacreedordd20"></td>'+
	'<td id="activo20"></td>'+
	'<td id="paspat20"></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>33</td>'+
	'<td>PROPIEDAD, PLANTA Y EQUIPO</td>'+
	'<td id="cbtresd" class="sum" onkeyup="aportes();"></td>'+
	'<td id="cbtresh"></td>'+
	'<td id="bcDeudordd33"></td>'+
	'<td id="bcacreedordd33"></td>'+
	'<td id="activo33"></td>'+
	'<td id="paspat33"></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>40</td>'+
	'<td>TRIBUTOS, CONTRAP. Y APORTES AL SIST. PENSIONES Y DE SALUD POR PAGAR</td>'+
	'<td id="cbcuarentd" class="sum" onkeyup="aportes();"></td>'+
	'<td id="cbcuarenth"></td>'+
	'<td id="bcDeudordd40"></td>'+
	'<td id="bcacreedordd40"></td>'+
	'<td id="activo40"></td>'+
	'<td id="paspat40"></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>41</td>'+
	'<td>REMUNERACIONES Y PARTICIPACIONES POR PAGAR</td>'+
	'<td id="cbcuarentunod" class="sum" onkeyup="aportes();"></td>'+
	'<td id="cbcuarentunoh"></td>'+
	'<td id="bcDeudordd41"></td>'+
	'<td id="bcacreedordd41"></td>'+
	'<td id="activo41"></td>'+
	'<td id="paspat41"></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>42</td>'+
	'<td>CUENTAS POR PAGAR COMERCIALES TERCEROS</td>'+
	'<td id="cbcuarentdosd" class="sum" onkeyup="aportes();"></td>'+
	'<td id="cbcuarentdosh"></td>'+
	'<td id="bcDeudordd42"></td>'+
	'<td id="bcacreedordd42"></td>'+
	'<td id="activo42"></td>'+
	'<td id="paspat42"></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>45</td>'+
	'<td>OBLIGACIONES FINANCIERAS</td>'+
	'<td id="cbcuarentcincod" class="sum" onkeyup="aportes();"></td>'+
	'<td id="cbcuarentcincoh"></td>'+
	'<td id="bcDeudordd45"></td>'+
	'<td id="bcacreedordd45"></td>'+
	'<td id="activo45"></td>'+
	'<td id="paspat45"></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>46</td>'+
	'<td>CUENTAS POR PAGAR DIVERSAS – TERCEROS</td>'+
	'<td id="cbcuarentseisd" class="sum" onkeyup="aportes();"></td>'+
	'<td id="cbcuarentseish"></td>'+
	'<td id="bcDeudordd46"></td>'+
	'<td id="bcacreedordd46"></td>'+
	'<td id="activo46"></td>'+
	'<td id="paspat46"></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>50</td>'+
	'<td >CAPITAL</td>'+
	'<td id="cbcincuentcerod" class="sum" onkeyup="aportes();"></td>'+
	'<td id="cbcincuentceroh"></td>'+
	'<td id="bcDeudordd50"></td>'+
	'<td id="bcacreedordd50"></td>'+
	'<td id="activo50"></td>'+
	'<td id="paspat50"></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>59</td>'+
	'<td>RESULTADOS ACUMULADOS</td>'+
	'<td id="cbcinconueved" class="sum" onkeyup="aportes();"></td>'+
	'<td id="cbcinconueveh"></td>'+
	'<td id="bcDeudordd59"></td>'+
	'<td id="bcacreedordd59"></td>'+
	'<td id="activo59"></td>'+
	'<td id="paspat59"></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+

	'<tr>'+
	'<td>60</td>'+
	'<td>COMPRAS</td>'+
	'<td id="cbsesentcerod" class="sum" onkeyup="aportes();"></td>'+
	'<td id="cbsesentceroh"></td>'+
	'<td id="bcDeudordd60"></td>'+
	'<td id="bcacreedordd60"></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>61</td>'+
	'<td>VARIACIÓN DE INVENTARIOS</td>'+
	'<td id="cbsesenunotd" class="sum" onkeyup="aportes();"></td>'+
	'<td id="cbsesenunoth"></td>'+
	'<td id="bcDeudordd61"></td>'+
	'<td id="bcacreedordd61"></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>62</td>'+
	'<td>GASTOS DE PERSONAL Y DIRECTORES</td>'+
	'<td id="cbsesentdosd" class="sum" onkeyup="aportes();"></td>'+
	'<td id="cbsesentdosh"></td>'+
	'<td id="bcDeudordd62"></td>'+
	'<td id="bcacreedordd62"></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>63</td>'+
	'<td>GASTOS DE SERVICIOS PRESTADOS POR TERCEROS</td>'+
	'<td id="cbsesenttresd"></td>'+
	'<td id="cbsesenttresh"></td>'+
	'<td id="bcDeudordd63"></td>'+
	'<td id="bcacreedordd63"></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>69</td>'+
	'<td>COSTO DE VENTAS</td>'+
	'<td id="cbsesentnueved"></td>'+
	'<td id="cbsesentnueveh"></td>'+
	'<td id="bcDeudordd69"></td>'+
	'<td id="bcacreedordd69"></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td id="perdida69"></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>70</td>'+
	'<td>VENTAS</td>'+
	'<td id="cbsetentd"></td>'+
	'<td id="cbsetenth"></td>'+
	'<td id="bcDeudordd70"></td>'+
	'<td id="bcacreedordd70"></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td id="ganancia70"></td>'+
	'</tr>'+
	'<tr>'+
	'<td>79</td>'+
	'<td>CARGAS IMPUTABLES A CUENTAS DE COSTOS Y GASTOS</td>'+
	'<td id="cbsetentnueved"></td>'+
	'<td id="cbsetentnueveh"></td>'+
	'<td id="bcDeudordd79"></td>'+
	'<td id="bcacreedordd79"></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>94</td>'+
	'<td>GASTOS DE ADMINISTRACIÓN</td>'+
	'<td id="cbnoventacuatrod"></td>'+
	'<td id="cbnoventacuatroh"></td>'+
	'<td id="bcDeudordd94"></td>'+
	'<td id="bcacreedordd94"></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td id="perdida94"></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>95</td>'+
	'<td>GASTO DE VENTAS</td>'+
	'<td id="cbnoventacincod"></td>'+
	'<td id="cbnoventacincoh"></td>'+
	'<td id="bcDeudordd95"></td>'+
	'<td id="bcacreedordd95"></td>'+
	'<td></td>'+
	'<td ></td>'+
	'<td id="perdida95"></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr style=" background-color: #94C1DF;">'+
	'<td>TOTAL</td>'+
	'<td>S/.</td>'+
	'<td id="totaldebe"</td>'+
	'<td id="totalhaber"></td>'+
	'<td id="totaldeudor"></td>'+
	'<td id="totalacreedor"></td>'+
	'<td id="totalactivo"></td>'+
	'<td id="totalpastp"></td>'+
	'<td id="perdidatotal"></td>'+
	'<td id="total70"></td>'+
	'</tr>'+
	'<tr>'+
	'<td>59</td>'+
	'<td>RESULTADOS ACUMULADOS</td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td id="actpatr"></td>'+
	'<td id="ganacias"></td>'+
	'<td></td>'+
	'</tr>'+
	'<tr>'+
	'<td>--</td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td></td>'+
	'<td id="restact" style="background-color:grey;"></td>'+
	'<td id="restactt" style="background-color:grey;"></td>'+
	'<td id="rest70" style="background-color:grey;"></td>'+
	'<td id="rest700" style="background-color:grey;"></td>'+
	'</tr>';

	$('#filas').append(td);
}
init();

