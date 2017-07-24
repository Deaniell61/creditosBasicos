  <div id="contenidoCrud">

      <!-- ********************************** tabla inicio ********************************** -->



      <div class="centrartabla">


          <table>
              <tr>
                  <td class="">
                      <div class="input-field ">
                          <a id="modalnuevoP" onClick="abrirProvNuevo();" class="waves-effect waves-light btn blue lighten-1 modal-trigger botonesr " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/anadir.png" /></i>Nuevo</a>
                      </div>
                  </td>
                  <td class="">




                  </td>
              </tr>
          </table>



     <?php

      include('../vista/depositoVista.php');

      mostrarCliente();


      ?>


          <!-- ********************************** modal ********************************** -->

          <!-- nuevo --->

          <div id="modal1P" class="modal">
              <div class="modal-content">
              <div id="mensajeP2"></div>
                  <form class="col s8">
                      <div class="row">
                          <div class="nav-wrapper grey darken-4">
                              <div>
                                  <p class="encabezadotextomodal"> Banco Nuevo </p>

                                  <a id="modalcerrar"  onClick="cierre();"  class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                              </div>

                          </div>
                      </div>


                      <div class="input-field col s10" hidden>
                          <input id="codigoP" type="text" class="validate">

                      </div>
                      <div class="row">
                        <div class="col s12">

                             <div class="input-field col s10">
                                 <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /></i>
                                 <input id="cuenta" type="text" class="validate">
                                 <label for="icon_prefix" ><span class="etiquelogin">Cuenta</span></label>
                             </div>
                              <div class="input-field col s10">
                                 <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /></i>
                                 <input id="banco" type="text" class="validate">
                                 <label for="icon_prefix" ><span class="etiquelogin">Banco</span></label>
                             </div>
                              <div class="input-field col s10">
                                 <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
                                 <input id="capital" type="text" class="validate">
                                 <label for="icon_telephone" ><span class="etiquelogin">Capital</span></label>
                             </div>





                  </form>





              <div class="modal-footer">
                  <a id="btnInsertarP2" onClick="ingresarClienteP();" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>


              </div>
          </div>
          <!-- nuevo fin --->


          <div id="modal2" class="modal">
              <div class="modal-content">
              <div id="mensajeP2"></div>
                  <form class="col s8">
                      <div class="row">
                          <div class="nav-wrapper grey darken-4">
                              <div>
                                  <p class="encabezadotextomodal"> Banco Nuevo </p>

                                  <a id="modalcerrar"  onClick="cierre();"  class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                              </div>

                          </div>
                      </div>


                      <div class="input-field col s10" hidden>
                          <input id="codigoP" type="text" class="validate">

                      </div>
                      <div class="row">
                        <div class="col s12">

                             <div class="input-field col s5">
                                 <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /></i>
                                 <input id="cuenta" type="text" class="validate">
                                 <label for="icon_prefix" ><span class="etiquelogin">Cuenta</span></label>
                             </div>
                              <div class="input-field col s5">
                                 <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /></i>
                                 <input id="banco" type="text" class="validate">
                                 <label for="icon_prefix" ><span class="etiquelogin">Banco</span></label>
                             </div>
                              <div class="input-field col s5">
                                 <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
                                 <input id="trasferencia" type="text" class="validate">
                                 <label for="icon_telephone" ><span class="etiquelogin">Trasferencia</span></label>
                             </div>
                             <div class="input-field col s5">
                                <i  class="material-icons prefix"><img class="iconologin" src="../app/img/fecha.png"/></i>
                                <input id="fechaD" type="date" class="validate">

                            </div>
                            <div class="input-field col s5">
                               <i  class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png"/></i>
                               <input id="comprobante" type="text" class="validate">
                               <label for="icon_telephone" ><span class="etiquelogin">Comprobante</span></label>
                           </div>
                           <div class="input-field col s5">
                              <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
                              <input id="montoD" type="text" class="validate">
                              <label for="icon_telephone" ><span class="etiquelogin">Monto</span></label>
                          </div>
                          <div class="input-field col s5">
                             <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
                             <input id="descripcionD" type="text" class="validate">
                             <label for="icon_telephone" ><span class="etiquelogin">Descripcion</span></label>
                         </div>
                          </div>
                        </div>





                  </form>

                  <p id="saldoV" class=" col s3 right">Saldo</p>
                  <div id="resumenCVer" class="col s10"   >

                     Tabla(fecha, Descripcion, Abono, Retiro, Comprobante)

                    </div>



              <div class="modal-footer">
                  <a id="btnInsertarP2" onClick="ingresarClienteP();" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>


              </div>
          </div>



          <!-- modal distribuidor

          <div id="modal4P" class="modal">
              <div class="modal-content">
                  <div class="col s8">
                      <div class="row">
                          <div class="nav-wrapper grey darken-4">
                              <div>
                                  <p class="encabezadotextomodal"> Distribuidores </p>

                                  <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                              </div>

                          </div>
                      </div>
                <div id="distribuidorContenedor">
                </div>
                  </div>
              </div>

          </div>
          -->
          <!-- Distribuidor Fin -->


          <!-- ********************************** modal fin ********************************** -->
