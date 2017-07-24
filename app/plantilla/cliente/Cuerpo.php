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

      include('../vista/clientesVista.php');

      mostrarCliente();


      ?>


          <!-- ********************************** modal ********************************** -->

          <!-- nuevo -->

          <div id="modal1P" class="modal">
              <div class="modal-content">
                <div id="mensajeP2"></div>
                  <form class="col s8">
                      <div class="row">
                          <div class="nav-wrapper grey darken-4">
                              <div>
                                  <p class="encabezadotextomodal"> Cliente Nuevo </p>

                                  <a id="modalcerrar"  onClick="cierre();"  class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                              </div>

                          </div>
                      </div>


                      <div class="input-field col s10" hidden>
                          <input id="codigoP" type="text" class="validate">

                      </div>
                      <div class="row">
                        <div class="col s12">
                             <div class="input-field col s10" style="display:none;">
                                 <i class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png" /></i>
                                 <input id="codigoP" type="text" class="validate">
                                 <label for="icon_prefix" ><span class="etiquelogin">Codigo</span></label>
                             </div>
                            <div class="input-field col s10">
                                <i  class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png"/></i>
                                <input id="cuiP" type="text" class="validate">
                                <label for="icon_telephone" ><span class="etiquelogin">CUI</span></label>
                            </div>
                             <div class="input-field col s10">
                                 <i class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png" /></i>
                                 <input id="nombreP" type="text" class="validate">
                                 <label for="icon_prefix" ><span class="etiquelogin">Nombre</span></label>
                             </div>
                              <div class="input-field col s10">
                                 <i class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png" /></i>
                                 <input id="apellidoP" type="text" class="validate">
                                 <label for="icon_prefix" ><span class="etiquelogin">Apellido</span></label>
                             </div>
                              <div class="input-field col s10">
                                 <i  class="material-icons prefix"><img class="iconologin" src="../app/img/telefono.png"/></i>
                                 <input id="telefonoP" type="text" class="validate">
                                 <label for="icon_telephone" ><span class="etiquelogin">Telefono</span></label>
                             </div>
                             <div class="input-field col s10">
                                 <i  class="material-icons prefix"><img class="iconologin" src="../app/img/calle.png"/></i>
                                 <input id="direccionP" type="text" class="validate">
                                 <label for="icon_telephone" ><span class="etiquelogin">Direccion</span></label>
                           </div>
                         </div>
                         <div class="input-field col s10">
                            <i  class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png"/></i>
                            <input id="nitP" type="text" class="validate">
                            <label for="icon_telephone" ><span class="etiquelogin">NIT</span></label>
                        </div>
                       



                      </div>

                   <div class="row">

                     <div class="input-field col s6">
                       <div class="input-field col s6">
                          <div class="file-field input-field">
                            <div class="btn">
                              <span>Foto de Perfil</span>
                              <input type="file" id="imagen1" name="imagen1" onChange="previsualizarImagenes(this,'perfil','imagen1');">
                            </div>
                            <div class="file-path-wrapper">
                              <input id="foto" class="file-path validate" type="text" placeholder="Foto">
                            </div>
                          </div>


                                  <div class="foto bordefoto">
                                    <img class="fotouser" id="imagen1Puesta" src="../app/img/foto.jpg" />
                                  </div>
                        </div>          
                   </div>

                   <div class="input-field col s6">
                     <div class="input-field col s6">
                        <div class="file-field input-field">
                          <div class="btn">
                            <span>Foto de Firma</span>
                            <input type="file" id="imagen2" name="imagen2" onChange="previsualizarImagenes(this,'firma','imagen2');">
                          </div>
                          <div class="file-path-wrapper">
                            <input id="firma" class="file-path validate" type="text" placeholder="Firma">
                          </div>
                        </div>

                                   <div class="foto bordefoto">
                                     <img class="fotouser" id="imagen2Puesta" src="../app/img/foto.jpg" />
                                   </div>

                     </div>
                   </div>

                   </div>








                  </form>
              </div>
              <div class="modal-footer">
                  <a id="btnInsertarP2" onClick="ingresarClienteP();" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Guardar</a>

              </div>
          </div>
          <!-- nuevo fin -->





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
