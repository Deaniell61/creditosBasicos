//* ************************* globales *********************
var gobIDElim, gobIDEdit
var passHabilita = 0

//* ************************* tabla ***********************


$('#tablaAut').DataTable({
  info: false,
  language: {
    search: 'Buscar',
    sLengthMenu: ' _MENU_ ',
    paginate: {
      previous: 'Anterior',
      next: 'Siguiente'
    }
  }
})

// *************** modal ***********************************



$('#tipoPlazo').material_select()
$('#solicitanteR').material_select()
$('#fiadorR').material_select()
$('.dropdown-button').dropdown()

// *********************************************************

function autorizar (id) {
  var trasDato = 12
        $.ajax({
          type: 'POST',
         dataType: 'json',
          url: '../core/controlador/creditosControlador.php',
          data: ' id=' + id + '&trasDato=' + trasDato,
          success: function (resp) {
             
                if(resp['estatus']){
                    location.reload();
                }else{
                    alert('no de pudo')
                }
              $('#respuestaGenAuth').html("Error de autorizacion")
              $('#respuestaGenAuth').focus()
          }
        })

}

