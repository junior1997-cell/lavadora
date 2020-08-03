
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

function totalCT10(){

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