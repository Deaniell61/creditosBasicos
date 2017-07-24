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

      include('../vista/proveedorVista.php');

      mostrarProveedor();


      ?>


          <!-- ********************************** modal ********************************** -->

          <!-- nuevo --->

          <div id="modal1P" class="modal">
              <div class="modal-content">
                  <form class="col s8">
                      <div class="row">
                          <div class="nav-wrapper grey darken-4">
                              <div>
                                  <p class="encabezadotextomodal"> Agregar Ruta </p>

                                  <a id="modalcerrar"  onClick="cierre();" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                              </div>

                          </div>
                      </div>
                      <div id="mensajeP2"></div>

                         <div class="row">
                           <div class="col s12">
                             <div class="col s6">



                             </div>
                             <div class="col s6">
                                     <div class="input-field col s10" hidden>
                                         <input id="codigoP" type="text" class="validate">

                                     </div>

                                     <div class="input-field col s10">
                                         <i class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png" /></i>
                                         <input id="cobrador" type="text" class="validate">
                                         <label for="icon_prefix" ><span class="etiquelogin">Cobrador</span></label>
                                     </div>
                                      <div class="input-field col s10">
                                         <i  class="material-icons prefix"><img class="iconologin" src="../app/img/calle.png"/></i>
                                         <input id="nombreRuta" type="text" class="validate">
                                         <label for="icon_telephone" ><span class="etiquelogin">Nombre de Ruta</span></label>
                                     </div>
                                     <div class="input-field col s10">
                                         <i  class="material-icons prefix"><img class="iconologin" src="../app/img/calle.png"/></i>
                                         <input id="descripcion" type="text" class="validate">
                                         <label for="icon_telephone" ><span class="etiquelogin">Descripcion</span></label>
                                     </div>
                             </div>

                           </div>
                         </div>

                      <div class="row">
                          <div class="col s12">
                             <a id="verCliente"  class=" modal-action waves-effect waves-light btn blue lighten-1 " >Ver Cliente</a>
                          </div>
                        <div class="col s12">

                                
                                <div class="col s10 tablaRuta">
                                  tabla
                                </div>



                        </div>
                      </div>



              <div class="modal-footer">
                  <a id="btnInsertarR" onClick="ingresarProveedorP();" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>


              </div>
          </div>
          <!-- nuevo fin --->


          <!-- Eliminar --->
          <div id="modal3P" class="modal">
              <div class="modal-content">
                  <form class="col s8">
                      <div class="row">
                          <form class="col s10">
                              <div class="row">
                                  <div class="nav-wrapper grey darken-4">
                                      <div>
                                          <p class="encabezadotextomodal"> Eliminar </p>

                                          <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                                      </div>

                                  </div>

                                  <div>
                                      <p> Ingrese la contraseña para </p>
                                  </div>

                                  <div class="input-field col s10">
                                      <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                                      <input id="icon_telephone" type="password" class="validate">
                                      <label for="icon_telephone" ><span class="etiquelogin">Contraseña</span></label>
                                  </div>

                              </div>
                          </form>
                      </div>

                  </form>
              </div>
              <div class="modal-footer">
                  <a id="modalnuevo" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>


              </div>
          </div>

          <!-- Eliminar fin --->
          <!-- modal distribuidor -->

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

          <!-- Distribuidor Fin -->


                    <!-- modal Busqueda -->

                    <div id="modal4" class="modal">
                        <div class="modal-content">

                            <div id="mensajeV1"></div>
                                <div class="row">
                                    <div class="nav-wrapper grey darken-4">
                                        <div>
                                            <p class="encabezadotextomodal"> Ingreso de Clientes </p>

                                            <a id="modalcerrar1"  onClick="cierre();" class=" modal-action modal-close  waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                                        </div>

                                    </div>
                                </div>
                          <div id="ClienteContenedor">

                          </div>

                        </div>

                    </div>

                    <!-- Busqueda Fin -->


          <!-- ********************************** modal fin ********************************** -->
