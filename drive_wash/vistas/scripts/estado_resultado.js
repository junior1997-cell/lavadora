var tabla;

//Función que se ejecuta al inicio
function init(){

  suma_debe_haber69();
  suma_debe_haber70();
  suma_debe_haber94();
  suma_debe_haber95();
  totalestadoresultadosintegrales();

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

      document.getElementById("ganancia70").innerHTML = 0;
 
    }else{
      var restb=thaber-tdebe;
      var y= roundNumber(restb,3);

      document.getElementById("ganancia70").innerHTML = y;

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

    if (tdebe>thaber) {

      var resta=tdebe-thaber;
      var x= roundNumber(resta,3);
  
      document.getElementById("perdida69").innerHTML = x;
    }else{
      var restb=thaber-tdebe;
      var y= roundNumber(restb,3);

      document.getElementById("perdida69").innerHTML = 0;
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

    if (tdebe>thaber) {

      var resta=tdebe-thaber;
      var x= roundNumber(resta,3);

      document.getElementById("perdida94").innerHTML = x;

    }else{
      var restb=thaber-tdebe;
      var y= roundNumber(restb,3);

      document.getElementById("perdida94").innerHTML = 0;

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

    if (tdebe>thaber) {

      var resta=tdebe-thaber;
      var x= roundNumber(resta,3);

      document.getElementById("perdida95").innerHTML = x;
    }else{
      var restb=thaber-tdebe;
      var y= roundNumber(restb,3);

      document.getElementById("perdida95").innerHTML = 0;

    }

  });
}

function totalestadoresultadosintegrales(){
  $.post("../ajax/balance.php?op=totaldebehabercuentas", function(data){

    data = JSON.parse(data);
    
    /*Estados de Resultados Integrales Cuentas Solo Para la UTILIDAD BRUTA*/
    d69= data['Detalle69'][0]['debe'];
    h69= data['Detalle69'][0]['haber'];
    
    d70= data['Detalle70'][0]['debe'];
    h70= data['Detalle70'][0]['haber'];

    /*Estados de Resultados Integrales Cuentas Solo Para la UTILIDAD OPERATIVA*/
    d94= data['Detalle94'][0]['debe'];
    h94= data['Detalle94'][0]['haber'];
    
    d95= data['Detalle95'][0]['debe'];
    h95= data['Detalle95'][0]['haber'];

    //if(d10>h10 || d12>h12 || d14>h14 || d20>h20 || d33>h33 || d40>h40 || d41>h41 || d42>h42 || d45>h45 || d46>h46 || d50>h50 ||d59>h59){
      
      /*Suma Total de la UTILIDAD BRUTA*/
      var s69 = d69-h69;
      var s70 = d70-h70;

      var a=s70+s69;
      var sumaUB =roundNumber(a, 3);
      document.getElementById("totalUB").innerHTML = sumaUB;

      /*Suma Total de la UTILIDAD OPERATIVA*/
      var s94 = d94-h94;
      var s95 = d95-h95;

      var b=s94+s95;
      var sumaUO =roundNumber(b, 3);
      document.getElementById("totalUO").innerHTML = sumaUO;

  });
}

init();