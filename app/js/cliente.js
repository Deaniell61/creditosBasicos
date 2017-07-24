//* ************************* globales *********************
var gobIDElim, gobIDEdit
var passHabilita = 0
//* *************************************************
//* ************************Iniciales
/* $('#contenidoCrud').mouseenter(function(){
    document.getElementById('formUser').reset();
});
*/
//* **********************************
//* ************************* tabla ***********************


$('#tablaPro').DataTable({
  info: false,
  language: {
    search: 'Buscar',
    sLengthMenu: ' _MENU_ ',
    paginate: {
      previous: 'Anterior',
      next: 'Siguiente'
    }
  }
    /* "scrollY":        "375px",
        "scrollCollapse": true,
        "paging":         true
         */
})


// $('select').material_select();

// *********************************************************

// *************** modal ***********************************

function abrirProvNuevo (){
  $('#modal1P').openModal()
  limpiarModal();
  cierre()
}

function seleccionar(id)
{
	buscarCUI(id);
	 cierre();
	$('#modal4').closeModal();
}
$('.modaleliminarP').click(function(){

    event.preventDefault();

    gobIDElim = event.target.dataset.elim;

    $('#modal3P').openModal();

});






$(".dropdown-button").dropdown();

//*********************************************************




//comprobaciones
function distribuidores(prov)
{


		$('#modal4P').openModal();
		llamarDistribuidor();


}
function llamarDistribuidor()
{

	$.ajax
        ({
            type:"POST",
            url:"Distribuidores.php",
            success: function(resp)
            {
				$('#distribuidorContenedor').html(resp);
            }
        });
}


//**********************



function ingresarClienteP(){

    var  trasDato;

        var nombre = $('#nombreP').val();
		var codigo = $('#codigoP').val();
		var apellido = $('#apellidoP').val();
		var direccion = $('#direccionP').val();
		var telefono = $('#telefonoP').val();
		var nit = $('#nitP').val();
        var cui = $('#cuiP').val();
        

		if(codigo=="")
		{
			trasDato = 1;
		}
		else
		{
        	trasDato = 3;
		}

        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/clientesControlador.php",
            data:' nombre=' +  nombre + '&direccion=' + direccion + '&nit=' + nit + '&cui=' + cui + '&telefono=' + telefono + '&apellido=' + apellido + '&codigo=' + codigo + '&trasDato=' + trasDato,
            success: function(resp)
            {
                $('#mensajeP2').html(resp);
            }
        });



}

function editarCliente(id)
{
  $('#modal1P').openModal();
	trasDato = 2;
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/clientesControlador.php",
            data:' id=' +  id + '&trasDato=' + trasDato,
            success: function(resp)
            {
				$('#mensajeP2').html(resp);
            }
        });

}

function editarDeposito(id)
{
	$('#btnActualizar').show();
    $('#btnInsertar').hide();
    $('#modal2').openModal();
	trasDato = 2;
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/clientesControlador.php",
            data:' id=' +  id + '&trasDato=' + trasDato,
            success: function(resp)
            {
				$('#mensajeP2').html(resp);
            }
        });

}



$('#modalcliente').click(function(){
	$('#modal4').closeModal();
	cierre();
	//alert('sdjhfkjshfjk');
});


$('#btnInsertarP').click(function(){

	//cierre();
	//$('#modalP').closeModal();


});

function subirImagenes(archivo,tipoAR,id,idusua){
	//document.getElementById('barra_de_progreso').hidden = false;
	var archivos=archivo.files;
	var i=0;
	var size=archivos[i].size;
	var type=archivos[i].type;
	var name=$('#nombreP').val();
    var usua=idusua;
   // alert(archivo);
    	if(size<(2*(1024*1024))){
        if(type=="image/png"){    
            //document.getElementById(id+'Puesta').src = path;
			$("#"+id).upload('../core/controlador/clientesControlador.php',
    			{
					cliente: $('#cuiP').val(),
    				firma: name,
                    id: id,
                    tipo: tipoAR,
                    idUsua: usua,
                    trasDato: 4
				},
				function(respuesta) 
				{
					//Subida finalizada.
					$('#mensajeP2').html(respuesta);
				}, 
				function(progreso, valor) 
				{
                    
					//$("#barra_de_progreso").val(valor);
				}
			);
        }else{
            $('#mensajeP2').html('La imagen debe ser de tipo PNG');
            
        }
		}else{
        	$('#mensajeP2').html('La imagen es muy pesada, se recomienda subir imagenes de menos de 2MB.');
            
		}
}

function previsualizarImagenes(archivo,tipoAR,id){
	//document.getElementById('barra_de_progreso').hidden = false;
	var archivos=archivo.files;
	var i=0;
	var size=archivos[i].size;
	var type=archivos[i].type;
	var name=$('#nombreP').val();
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
            $('#mensajeP2').html('La imagen debe ser de tipo PNG');
            location.href="#mensajeP2";
           
        }
    }else{
        $('#mensajeP2').html('La imagen es muy pesada, se recomienda subir imagenes de menos de 2MB.');
        location.href="#mensajeP2";
    }
}
function limpiarModal()
{
  $('#nombreP').val('');$('#nombreP').focus();
	$('#apellidoP').val('');$('#apellidoP').focus();
	$('#direccionP').val('');$('#direccionP').focus();
	$('#telefonoP').val('');$('#telefonoP').focus();
	$('#nitP').val('');$('#nitP').focus();
  $('#cuiP').val('');$('#nitP').focus();document.getElementById('cuiP').disabled=false;
	$('#codigoP').val('');$('#cuiP').focus();
  document.getElementById('imagen1Puesta').src='';
  document.getElementById('imagen2Puesta').src='';
}