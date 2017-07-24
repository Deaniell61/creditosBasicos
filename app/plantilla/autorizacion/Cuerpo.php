  <div id="contenidoCrud">

      <!-- ********************************** tabla inicio ********************************** -->

<div id="respuestaGenAuth"></div>

      <div class="centrartabla">


          <table style="display:none;">
              <tr>
                  <td class="">
                      <div class="input-field ">
                          <a id="NoAutorizado" class="waves-effect waves-light btn red lighten-1 modal-trigger " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/anadir.png" /></i>No Autorizado</a>
                      </div>
                  </td>
                  <td class="">




                  </td>
              </tr>
          </table>



     <?php
     

      include('../vista/autorizacionVista.php');

      mostrarAutorizacion();


      ?>


          <!-- ********************************** modal ********************************** -->

          <!-- nuevo -->
          <div id="modalCReditos" class="modal">
              <div class="modal-content">

                  <div id="mensajeCre"></div>
                      <div class="row">
                          <div class="nav-wrapper grey darken-4">
                              <div>
                                  <p class="encabezadotextomodal"> Creditos </p>

                                  <a id="modalcerrar1" onClick="cierre();" class=" modal-action modal-close  waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                              </div>

                          </div>
                      </div>
                    <?php
                     include('../app/plantilla/credito/formCredito.php');?>
              </div>
         </div>
          
          <!-- Distribuidor Fin -->


          <!-- ********************************** modal fin ********************************** -->
