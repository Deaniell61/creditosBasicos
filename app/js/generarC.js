//************************** globales *********************
var gobIDElim, gobIDEdit;
var passHabilita = 0;
var seleccionPrecio = 'PG';
//**************************************************
//*************************Iniciales
/*$('#contenidoCrud').mouseenter(function(){
    document.getElementById('formUser').reset();
});
*/
//***********************************
//************************** tabla ***********************
$('#tabla2').DataTable({

    info: false,



    language: {

        search: "Buscar",
        sLengthMenu: " _MENU_ ",

        paginate: {

            previous: "Anterior",
            next: "Siguiente",

        },

    },
    /*
			   "scrollY":        "375px",
        "scrollCollapse": true,
        "paging":         true
         */
});


$('#tabla2').DataTable({

    info: false,



    language: {

        search: "Buscar",
        sLengthMenu: " _MENU_ ",

        paginate: {

            previous: "Anterior",
            next: "Siguiente",

        },

    },
    /*
			   "scrollY":        "375px",
        "scrollCollapse": true,
        "paging":         true
         */
});


$("#verF").click(function() {
      if($("#verF").is(':checked')) {
         $('#contenedorFiadorSel').css('display','block');
         $("#mostrarFiador").show();
         mostrarFiadoresCredito();  
      } else {
          $('#contenedorFiadorSel').css('display','none');
          $("#mostrarFiador").hide();
      }
  });

  $("#montoCredito").keyup(function() {
       calculaTotalCredito();
  });
  $("#tasaInteres").keyup(function() {
       calculaTotalCredito();
  });
  $("#plazo").keyup(function() {
       calculaTotalCredito();
  });
  $("#gastosAdmon").keyup(function() {
       calculaTotalCredito();
  });
  $("#otrosGastos").keyup(function() {
       calculaTotalCredito();
  });

 

  $("#verG").click(function() {
        if($("#verG").is(':checked')) {
           $("#mostrarGarantia").show();
           mostrarGarantias()
        } else {
            $("#mostrarGarantia").hide();
        }
    });

    $("#verR").click(function() {
          if($("#verR").is(':checked')) {
             $("#mostrarRef").show();
             mostrarReferencia();
          } else {
              $("#mostrarRef").hide();
              
          }
      });

      $(document).ready(function() {
          $('select').material_select();
        });


//$('#tipoPlazo').material_select();

//*********************************************************

//*************** modal ***********************************
$('#modalnuevo').click(function() {
    $('#btnActualizar').hide();
    $('#btnInsertar').show();
    $('#modal1').openModal();
    document.getElementById('nombreC').focus();
});


$('.modaleliminar').click(function() {

    event.preventDefault();

    gobIDElim = event.target.dataset.elim;

    $('#modal3').openModal();

});




$(".dropdown-button").dropdown();


$('#guardarCredito').click(function() {
    guardarCredito();
});

$('#modalcerrar1').click(function() {



});

$('#modalnuevoR').click(function(){
  $('#modalR').openModal();
});

$('#modalnuevoF').click(function(){
  $('#modalF').openModal();
});

$('#modalnuevoG').click(function(){
  $('#modalG').openModal();
});


function verCredito(id)
{
	$('#modalCReditos').openModal();
    	var  trasDato;
	trasDato = 3;
        var credito=$('#codigoCredito').val();
        
        $.ajax
        ({
            type:"POST",
            dataType: "json",
            url:"../core/controlador/creditosControlador.php",
            data:' cliente=' +  credito + '&id=' + id + '&trasDato=' + trasDato,
            success: function(resp)
            {
                $('#nombreFIA').val(resp[0]);$('#nombreFIA').focus();
	            $('#apellidoFIA').val(resp[1]);$('#apellidoFIA').focus();
	            $('#direccionFIA').val(resp[3]);$('#direccionFIA').focus();
	            $('#telefonoFIA').val(resp[2]);$('#telefonoFIA').focus();
	            $('#nitFIA').val(resp[4]);$('#nitFIA').focus();
                $('#cuiFIA').val(resp[6]);document.getElementById('cuiFIA').disabled=false;
	            $('#codigoFIA').val(resp[5]);$('#nitFIA').focus();$('#nombreFIA').focus();
                document.getElementById('imagen1Puesta').src='../app/imagenes/clientes'+resp[7];
                document.getElementById('imagen2Puesta').src='../app/imagenes/clientes'+resp[8];
	            $('#cuiFIA').focus(); 
			  // $('#mensajeFiadorBusca').html(resp[0]);
            }
        });

}



//*********************************************************




//comprobaciones
function buscarCliente(buscar, evt) {
    if (evt.keyCode == '13' && buscar.value == "") {

        $('#modal4').openModal();
        /*setTimeout(function(){
        llamarCliente();},300);*/
    } else
    if (buscar.value == "") {

    } else
    if (evt.keyCode == '13') {
        
        buscarCUI(buscar.value)
    }



}

function buscarReferencia (buscar, evt) {
    if (evt.keyCode == '13' && buscar.value == "") {
    } else
    if (buscar.value != "") {
        trasDato = 4;
        $.ajax({
            type: "POST",
            url: "../core/controlador/creditosControlador.php",
            data: ' buscar=' + buscar.value + '&trasDato=' + trasDato,
            success: function(resp) {
                $('#buscaReferencia').html(resp)
            }
        });
    }
}



function contraAdmin111() {

    return id;
}
function ingresarReferencia(){
   
    var trasDato;
    trasDato = 5;
    var nombre=$('#nombreREF').val();
    var apellido=$('#apellidoREF').val();
    var telefono=$('#telefonoREF').val();
    var direccion=$('#direccionREF').val();
    var parentesco=$('#parentescoREF').val();
    var email=$('#emailREF').val();
    var cliente=$('#codigoCliente').val();
    if(nombre!="" && apellido!="" && telefono!="" && email!=""){
        $.ajax({
            type: "POST",
            url: "../core/controlador/creditosControlador.php",
            data: 'nombre=' + nombre + '&apellido=' + apellido  + '&cliente=' + cliente + '&telefono=' + telefono + '&direccion=' + direccion + '&parentesco=' + parentesco + '&email=' + email + '&trasDato=' + trasDato,
            success: function(resp) {
                $('#mensajeREF').html(resp)
            }
        });
    }else{
        alert('Se necesita por lo menos el telefono y el email de la referencia');
    }
}

function seleccionarReferencia(id){
    var trasDato;
    trasDato = 6;
    $.ajax({
            type: "POST",
            url: "../core/controlador/creditosControlador.php",
            data: 'id=' + id + '&trasDato=' + trasDato,
            success: function(resp) {
                $('#mensajeREF').html(resp)
            }
        });
}
function agregarReferencia(){
   
    var trasDato;
    trasDato = 7;
    var id=$('#CodigoREF').val();
    var cliente=$('#codigoCliente').val();
    if(id!=""){
        $.ajax({
            type: "POST",
            url: "../core/controlador/creditosControlador.php",
            data: 'id=' + id + '&cliente=' + cliente + '&trasDato=' + trasDato,
            success: function(resp) {
                $('#mensajeREF').html(resp)
            }
        });
    }else{
        alert('Se necesita por lo menos el telefono y el email de la referencia');
    }
}

function buscarCliente2(buscar) {
    if (buscar.value == "") {
        $('#modal4').openModal();
        /*setTimeout(function(){
        llamarCliente();},300);*/
    } else {
        buscarCUI(buscar.value)
    }
}

function buscarCUI(cui) {
    var trasDato;
    trasDato = 1;
    $.ajax({
        type: "POST",
        url: "../core/controlador/creditosControlador.php",
        data: ' cui=' + cui + '&trasDato=' + trasDato,
        success: function(resp) {
                $('#respuestaGeneral').html(resp);
        }
    });
}
function confirmarCredito(){
   
    
    var trasDato;
    trasDato = 3;
    var cliente=$('#codigoCliente').val();
    var monto=$('#montoCredito').val();
    var tasaInteres=$('#tasaInteres').val();
    var totalCredito=$('#totalCredito').val().replace("Q.",'');
    var tipoPlazo=$('#tipoPlazo').val();
    var plazo=$('#plazo').val();
    var gastosAdmon=$('#gastosAdmon').val();
    var otrosGastos=$('#otrosGastos').val();
    var cuota=$('#cuota').val().replace("Q.",'');
    var desembolso=$('#desembolso').val().replace("Q.",'');
    var fecha=$('#fecha').val();
    var comprobante=$('#comprobante').val();

    if(monto==""){
        monto=0;}
    if(tasaInteres==""){
        tasaInteres=0;}
    if(totalCredito==""){
        totalCredito=0;}
    if(plazo==""){
        plazo=0;}
    if(gastosAdmon==""){
        gastosAdmon=0;}
    if(otrosGastos==""){
        otrosGastos=0;}
    if(cuota==""){
        cuota=0;}
    if(monto==""){
        monto=0;}
    if(desembolso==""){
        desembolso=0;}

    var dato = 'idcliente=' + cliente + 
               '&monto=' + monto +
               '&tasaInteres=' + tasaInteres +
               '&totalCredito=' + totalCredito +
               '&tipoPlazo=' + tipoPlazo +
               '&plazo=' + plazo +
               '&gastosAdmon=' + gastosAdmon +
               '&otrosGastos=' + otrosGastos +
               '&cuota=' + cuota +
               '&desembolso=' + desembolso +
               '&fecha=' + fecha +
               '&comprobante=' + comprobante + 
               '&trasDato=' + trasDato;

    if(!cliente==""){
        $.ajax({
            type: "POST",
            url: "../core/controlador/creditosControlador.php",
            data: dato,
            success: function(resp) {
                    $('#respuestaGeneral').html(resp);
            }
        });
    }
}
function calculaTotalCredito(){
    if(!$('#montoCredito').val()==""){
    var monto=parseFloat($('#montoCredito').val());}else{
    var monto=0;    
    }
    if(!$('#tasaInteres').val()==""){
    var tasaInteres=parseFloat($('#tasaInteres').val());}else{
    var tasaInteres=0;    
    }
    $('#totalCredito').val("Q."+(monto*((tasaInteres/100)+1)));
    calculaCuota();
}
function calculaCuota(){
    if(!$('#totalCredito').val()==""){
    var total=parseFloat($('#totalCredito').val().replace("Q.",''));}else{
    var total=0;    
    }
    if(!$('#plazo').val()==""){
    var plazo=parseFloat($('#plazo').val());}else{
    var plazo=0;    
    }
    if(!plazo==0){
    $('#cuota').val("Q."+(total/(plazo)));}else{
    $('#cuota').val("Q."+(total));
    }
    calculoDesembolso();
}
function calculoDesembolso(){
    if(!$('#montoCredito').val()==""){
    var total=parseFloat($('#montoCredito').val().replace("Q.",''));}else{
    var total=0;    
    }
    if(!$('#gastosAdmon').val()==""){
    var gastosAdmon=parseFloat($('#gastosAdmon').val());}else{
    var gastosAdmon=0;    
    }
    if(!$('#otrosGastos').val()==""){
    var otrosGastos=parseFloat($('#otrosGastos').val());}else{
    var otrosGastos=0;    
    }
    $('#desembolso').val("Q."+(total-gastosAdmon-otrosGastos));
}
function iniciarCredito(id) {
    var trasDato;
    trasDato = 2;
    $.ajax({
        type: "POST",
        url: "../core/controlador/creditosControlador.php",
        data: ' prov=' + id + '&trasDato=' + trasDato,
        success: function(resp) {
            $('#respuestaGeneral').html(resp);
        }
    });
}

function llamarCliente() {

    $.ajax({
        type: "POST",
        url: "Clientes.php",
        success: function(resp) {
            $('#ClienteContenedor').html(resp);
        }
    });
}

function ingresoCuentaCobrar() {

    var trasDato;
    trasDato = 1;
    //alert(2);
    tipo = document.getElementById('tipoPlazo').value;
    plazo = document.getElementById('plazo').value;
    id = document.getElementById('codigoVenta').value;
    $.ajax({
        type: "POST",
        url: "../core/controlador/cuentasCobrarControlador.php",
        data: ' tipo=' + tipo + '&plazo=' + plazo + '&id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');
                //$('#precargar').hide();
            } else {



                $('#mensajeACliente').html(resp);


            }


        }
    });
}

function mostrarReferencia()
{
	var  trasDato;
	trasDato = 1;
        var cliente=$('#codigoCliente').val();
        
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/referenciasControlador.php",
            data:' cliente=' +  cliente + '&trasDato=' + trasDato,
            success: function(resp)
            {
             
                
					 $('#tabla_Referencia').html(resp);

					 $('#tablaRef').DataTable( {

											info:     false,



											language: {

												search: "Buscar",
												sLengthMenu:" _MENU_ ",

												paginate:{

													previous: "Anterior",
													next: "Siguiente",

												},

											}
											/*
													   "scrollY":        "375px",
												"scrollCollapse": true,
												"paging":         true
												 */
										} );
									//	$('select').material_select();


            }
        });
}

function mostrarGarantias()
{
	var  trasDato;
	trasDato = 8;
        var credito=$('#codigoCredito').val();
        
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/creditosControlador.php",
            data:' id=' +  credito + '&trasDato=' + trasDato,
            success: function(resp)
            {
             
                
					 $('#tabla_Garantia').html(resp);

					 $('#tablaGara').DataTable( {

											info:     false,



											language: {

												search: "Buscar",
												sLengthMenu:" _MENU_ ",

												paginate:{

													previous: "Anterior",
													next: "Siguiente",

												},

											}
											/*
													   "scrollY":        "375px",
												"scrollCollapse": true,
												"paging":         true
												 */
										} );
									//	$('select').material_select();


            }
        });
}

function ingresarGarantia(){
   
    var trasDato;
    trasDato = 9;
    var descripcion=$('#descripcionGara').val();
    var valoracion=$('#valorGara').val();
    var credito=$('#codigoCredito').val();
    if(descripcion!="" && credito!="" && valoracion!=""){
        $.ajax({
            type: "POST",
            url: "../core/controlador/creditosControlador.php",
            data: 'credito=' + credito + '&valoracion=' + valoracion + '&descripcion=' + descripcion + '&trasDato=' + trasDato,
            success: function(resp) {
                $('#mensajeGara').html(resp)
            }
        });
    }else{
        alert('Se necesita por lo menos la descripcion y la valoracion de la referencia');
    }
}

function mostrarFiadoresCredito()
{
	var  trasDato;
	trasDato = 1;
        var credito=$('#codigoCredito').val();
        
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/fiadorControlador.php",
            data:' cliente=' +  credito + '&trasDato=' + trasDato,
            success: function(resp)
            {
             
                
					 $('#tabla_Fiador').html(resp);

					 $('#tablaFia').DataTable( {

											info:     false,



											language: {

												search: "Buscar",
												sLengthMenu:" _MENU_ ",

												paginate:{

													previous: "Anterior",
													next: "Siguiente",

												},

											}
											/*
													   "scrollY":        "375px",
												"scrollCollapse": true,
												"paging":         true
												 */
										} );
									//	$('select').material_select();


            }
        });
}
function mostrarFiadoresDisponibles(busca)
{
	var  trasDato;
	trasDato = 2;
        var credito=$('#codigoCredito').val();
        
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/fiadorControlador.php",
            data:' cliente=' +  credito + '&busca=' + busca + '&trasDato=' + trasDato,
            success: function(resp)
            {
			   $('#menu_fiador').html(resp);
            }
        });
}

function guardarCredito()
{
	var  trasDato;
	trasDato = 11;
        var credito=$('#codigoCredito').val();
        
        $.ajax
        ({
            type:"POST",
            dataType: "json",
            url:"../core/controlador/creditosControlador.php",
            data:' credito=' +  credito + '&trasDato=' + trasDato,
            success: function(resp)
            {
                if(resp['estatus'])
                {
			        $('#respuestaGeneral').html(resp['message']);
                    location.href='?Credito'
                }else{
                    $('#respuestaGeneral').html(resp['message']);
                }
            }
        });
}

function seleccionarFiador(id)
{
	var  trasDato;
	trasDato = 3;
        var credito=$('#codigoCredito').val();
        
        $.ajax
        ({
            type:"POST",
            dataType: "json",
            url:"../core/controlador/fiadorControlador.php",
            data:' cliente=' +  credito + '&id=' + id + '&trasDato=' + trasDato,
            success: function(resp)
            {
                $('#nombreFIA').val(resp[0]);$('#nombreFIA').focus();
	            $('#apellidoFIA').val(resp[1]);$('#apellidoFIA').focus();
	            $('#direccionFIA').val(resp[3]);$('#direccionFIA').focus();
	            $('#telefonoFIA').val(resp[2]);$('#telefonoFIA').focus();
	            $('#nitFIA').val(resp[4]);$('#nitFIA').focus();
                $('#cuiFIA').val(resp[6]);document.getElementById('cuiFIA').disabled=false;
	            $('#codigoFIA').val(resp[5]);$('#nitFIA').focus();$('#nombreFIA').focus();
                document.getElementById('imagen1Puesta').src='../app/imagenes/clientes'+resp[7];
                document.getElementById('imagen2Puesta').src='../app/imagenes/clientes'+resp[8];
	            $('#cuiFIA').focus(); 
			  // $('#mensajeFiadorBusca').html(resp[0]);
            }
        });
}


function ingresarFiador(){

    var  trasDato;

        var nombre = $('#nombreFIA').val();
		var codigo = $('#codigoFIA').val();
		var apellido = $('#apellidoFIA').val();
		var direccion = $('#direccionFIA').val();
		var telefono = $('#telefonoFIA').val();
		var nit = $('#nitFIA').val();
        var cui = $('#cuiFIA').val();
        var credito = $('#codigoCredito').val();
        

		if(codigo=="")
		{
			trasDato = 4;
		}
		else
		{
        	trasDato = 5;
		}

        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/fiadorControlador.php",
            data:' nombre=' +  nombre + '&direccion=' + direccion + '&credito=' + credito + '&nit=' + nit + '&cui=' + cui + '&telefono=' + telefono + '&apellido=' + apellido + '&codigo=' + codigo + '&trasDato=' + trasDato,
            success: function(resp)
            {
                $('#mensajeFiadorBusca').html(resp);
            }
        });



}

function subirImagenesFiador(archivo,tipoAR,id,idusua){
	//document.getElementById('barra_de_progreso').hidden = false;
	var archivos=archivo.files;
	var i=0;
	var size=archivos[i].size;
	var type=archivos[i].type;
	var name=$('#nombreFIA').val();
    var usua=idusua;
   // alert(archivo);
    	if(size<(2*(1024*1024))){
        if(type=="image/png"){    
            //document.getElementById(id+'Puesta').src = path;
			$("#"+id).upload('../core/controlador/fiadorControlador.php',
    			{
					cliente: $('#cuiFIA').val(),
    				firma: name,
                    id: id,
                    tipo: tipoAR,
                    idUsua: usua,
                    trasDato: 6
				},
				function(respuesta) 
				{
					//Subida finalizada.
					$('#mensajeFiadorBusca').html(respuesta);
				}, 
				function(progreso, valor) 
				{
                    
					//$("#barra_de_progreso").val(valor);
				}
			);
        }else{
            $('#mensajeFiadorBusca').html('La imagen debe ser de tipo PNG');
            
        }
		}else{
        	$('#mensajeFiadorBusca').html('La imagen es muy pesada, se recomienda subir imagenes de menos de 2MB.');
            
		}
}

function previsualizarImagenesFiador(archivo,tipoAR,id){
	//document.getElementById('barra_de_progreso').hidden = false;
	var archivos=archivo.files;
	var i=0;
	var size=archivos[i].size;
	var type=archivos[i].type;
	var name=$('#nombreFIA').val();
    var target=archivo.value;
    if(size<(2*(1024*1024))){
        if(type=="image/png"){    
            if (archivo.files && archivo.files[0]) {
            var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById(id+'Puesta').src = e.target.result;
                    }
                    reader.readAsDataURL(archivos[i]);
            }
        }else{
            $('#mensajeFiadorBusca').html('La imagen debe ser de tipo PNG');
            location.href="#mensajeFiadorBusca";
           
        }
    }else{
        $('#mensajeFiadorBusca').html('La imagen es muy pesada, se recomienda subir imagenes de menos de 2MB.');
        location.href="#mensajeFiadorBusca";
    }
}
//**********************


//*****************  cotizacion ************************/



$("#Cotizacion").click(function() {
    $("#Ofecha").hide();
    $("#nofactura").hide();
    $("#btnGuardar").hide();
    $("#OtipoCompra").hide();

    $("#generarV").show();
    $("#imprimir").show();
    $("#NIT").focus();
    /*document.getElementById("marca").disabled = false;
    document.getElementById("descripcion").disabled = false;
    document.getElementById("Cantidad").disabled = false;
    document.getElementById("precioG").disabled = false;
    document.getElementById("precioE").disabled = false;
    document.getElementById("precioM").disabled = false;
    $('#tipoRepuesto').material_select();
    document.getElementById('cotizacionTrue').innerHTML = "1";*/


});
