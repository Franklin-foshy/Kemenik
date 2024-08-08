$(document).ready(function (){
    var fechaEmision = new Date();
    var day = ("0" + fechaEmision.getDate()).slice(-2);
    var month = ("0" + (fechaEmision.getMonth() + 1)).slice(-2);
    fecha = fechaEmision.getFullYear()+"-"+(month)+"-"+(day);
    $("#txtFecha").val(fecha);

    $("#txtAgregarArticulo").focus();

    $("#txtAgregarArticulo").on('keyup', function(e){
        e.preventDefault();
        if(e.keyCode == 13){
            $("#btnAgregarArticulo").click();
        }
        var str = $("#txtAgregarArticulo").val();
        if(str != ""){
            //url = "{{ url('productos/buscar?texto=') }}" + str;
            url = buscar_prodcto_url + str;
            delay(function(){
                $.get(url , function( data ){
                    $("#divData").html( data );
                    var productos = data["productos"];
                    if(productos.length == 0){
                         $("#listaBusquedaProducto").html("");
                    }else{

						 $("#listaBusquedaProducto").html("");
                    }

                });
            }, 1000);
        }else{
            $("#listaBusquedaProducto").html("");
        }
    });

    $('#btnAgregarArticulo').on('click', function(e) {
		e.preventDefault();
		var producto_codigo = $("#txtAgregarArticulo").val();
		if(producto_codigo.length > 2){
			//url = "{{ url('productos/buscar?texto=') }}" + producto_codigo;
			url = buscar_prodcto_url + producto_codigo;
			$.get(url , function( data ){
                //console.log(data["productos"].length == 0);
				if (data["productos"].length == 0) {
                    Swal.fire({
                            title: "¡Lo siento!",
                            text: "Sin datos encontrados!",
                            icon: "info"
                        });
                            $('#cif').val('');
                            $('#dpi').val('');
                            $('#nombre').val('');
                            $('#address').val('');
                            $("#txtAgregarArticulo").val('')
                            $("#agencia").val('')
                            $("#asociado").val('')
                            $('#createDataModal').modal("show");
                }
                else
                {
                    agregarAsociado(data);
                }
			});
		}
    });
});



var listadoAsociados = [
/*
   {'Id':'1','Username':'Ray','FatherName':'Thompson'},
   {'Id':'2','Username':'Steve','FatherName':'Johnson'}
*/
]
function agregarAsociado(data){
    //console.log(data)
	if(data["productos"].length > 0){
		var producto = data["productos"][0];
		var cif = producto["cif"];
		var productoBuscado = buscarArticuloEnListado(cif);
		if( productoBuscado == null){
			var phone = producto["phone"];
			if(phone > 0){
				var name = producto["name"];
				var dpi = producto["dpi"];
				var agencia = producto["agencia"];
                var address = producto["address"];
                var id = producto["id"];

				listadoAsociados[listadoAsociados.length] = {
                    'id':id,
					'cif':cif,
					'name': name,
					'dpi': dpi,
					'phone': phone,
					'agencia': agencia,
                    'address': address,

				};
			}
		}else{
			if(productoBuscado["cantidad"] < productoBuscado["stock"]){
				productoBuscado["cantidad"]++;
			}
		}
		actualizarTablaArticulos();
		$("#txtAgregarArticulo").val("");
	}
}

function buscarArticuloEnListado(codigo){
	var i = 0;
	var articuloBuscado = null;
	while(i < listadoAsociados.length && articuloBuscado == null){
		if(listadoAsociados[i]["cif"] == codigo){
			articuloBuscado = listadoAsociados[i];
		}
		i++;
	}
	return articuloBuscado;
}

function actualizarTablaArticulos(){
    for(i=0; i < listadoAsociados.length; i++)
    {
        $('#asociado').val(listadoAsociados[i]["id"] );
        $('#cif').val(listadoAsociados[i]["cif"] );
        $('#dpi').val(listadoAsociados[i]["dpi"] );
        $('#nombre').val(listadoAsociados[i]["name"]);
        $('#address').val(listadoAsociados[i]["address"]);
        $('#agencia').val(listadoAsociados[i]["agencia"]["name"]);



    }
}

var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();
