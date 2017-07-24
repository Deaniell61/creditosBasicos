<div>
         	<ul>

         		<li class="centrarli"><a id="ventaL" href="#!" class="amber accent-3 btn white-text tamaniobot " ><i class="material-icons left"><img class="iconotab" src="../app/img/generarv.png" /></i>Creditos</a></li>
            

         	</ul>
          </div>
<?php
require_once('../vista/creditosVista.php');?>
             <center>
                      <div class="foto bordefoto">
                        <img class="fotouser" id="fotoPerfil" src="../app/img/foto.jpg" />
                      </div>
             </center>


            <div class="row">
              <div class="col s12">

                <div id="respuestaGeneral"></div>

                      <div class="input-field col s6 " style="display:none">
      							      <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
      										<input id="codigoCliente" type="text" class="validate" autofocus>
      										 <label for="icon_prefix" ><span class="etiquelogin">Codigo </span></label>
      							  </div>
                        <div class="input-field col s6 ">
      							      <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
      										<input id="CUI" type="text" onKeyUp="buscarCliente(this,event);" class="validate" autofocus>
      										 <label for="icon_prefix" ><span class="etiquelogin">CUI </span></label>
      							  </div>

                      <div class="input-field col s6 ">
                         <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
                         <input id="Cliente" type="text" onKeyUp="buscarCliente(this,event);siguiente(event,'direccionC');" class="validate">
                         <label for="icon_prefix" ><span class="etiquelogin">Cliente</span></label>
                    </div>

                      <div class="input-field  col s6 ">
                            <i  class="material-icons prefix"><img class="iconologin" src="../app/img/calle.png"/></i>
                            <input id="direccionC" type="text" class="validate" onKeyUp="siguiente(event,'fecha');">
                            <label for="icon_telephone" ><span class="etiquelogin">Direccion</span></label>
                     </div>

                     <div id="Ofecha" class="input-field col s6  ">
                           <i  class="material-icons prefix"><img class="iconologin" src="../app/img/fecha.png"/></i>
                           <input  id="fecha" type="date" class="validate" onKeyUp="siguiente(event,'comprobante');" value="<?php echo date('Y-m-d')?>" >
                           <label class="active" for="fecha" >Fecha</label>
                      </div>

                      <div id="nocomprobante" class="input-field col s6">
                            <i  class="material-icons prefix"><img class="iconologin" src="../app/img/factura.png"/></i>
                            <input id="comprobante" type="number" readonly class="validate numerico" onKeyUp="siguiente(event,'montoCredito');">
                            <label for="icon_telephone" ><span class="etiquelogin">No. Comprobante</span></label>
                      </div>
                      <div class="input-field col s6" style="display:none" id="chkReferencia">
                            <div class="Rsoli">
                                <input  type="checkbox" id="verR" />
                                <label for="verR">Referencia</label>
                            </div>
                          </div>

              </div>

            </div>

            <div id="mostrarRef" hidden>
                <center>
                 <a id="modalnuevoR" class="waves-effect waves-light btn blue lighten-1 modal-trigger   " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/anadir.png" /></i>Referencia</a>
                </center>

                <div class="" id="tabla_Referencia">
                  tabla
                </div>
            </div>


                         <center>
                                <h4>Crédito</h4>
                         </center>


            <div class="row">
                <div class="input-field col s6 " style="display:none">
                    <i class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png" /> </i>
                    <input id="codigoCredito" type="text" onKeyUp="siguiente(event,'tasaInteres');" class="validate" autofocus>
                     <label for="icon_prefix" ><span class="etiquelogin">Codigo Crédito</span></label>
                </div>

                <div class="input-field col s6 ">
                    <i class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png" /> </i>
                    <input id="montoCredito" type="text" onKeyUp="siguiente(event,'tasaInteres');" class="validate" autofocus>
                     <label for="icon_prefix" ><span class="etiquelogin">Monto de Crédito</span></label>
                </div>

                <div class="input-field col s6 ">
                    <i class="material-icons prefix"><img class="iconologin" src="../app/img/porcentaje.png" /> </i>
                    <input id="tasaInteres" type="text" onKeyUp="siguiente(event,'plazo');" class="validate" autofocus>
                     <label for="icon_prefix" ><span class="etiquelogin">Tasa de Interes</span></label>
                </div>
                <div class="input-field col s6 ">
                    <i class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png" /> </i>
                    <input id="totalCredito" type="text" disabled onKeyUp="siguiente(event,'tipoPlazo');" class="validate" autofocus>
                     <label for="icon_prefix" ><span class="etiquelogin">Total de Credito</span></label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix"><img class="iconologin" src="../app/img/plazo.png" /> </i>
                   <select id="tipoPlazo" onChange="$('#plazo').focus();">
                     <option value="" disabled >Tipo de Plazo</option>
                      <option value="1" selected>Dia</option>
                      <option value="2">Mes</option>
                      <option value="3">Año</option>
                   </select>
                   <label>Tipo de Plazo</label>
                </div>

                <div class="input-field col s6 ">
                    <i class="material-icons prefix"><img class="iconologin" src="../app/img/plazo.png" /> </i>
                    <input id="plazo" type="text" onKeyUp="siguiente(event,'gastosAdmon');" class="validate" autofocus>
                     <label for="icon_prefix" ><span class="etiquelogin">Plazo</span></label>
                </div>
                

                <div class="input-field col s6 ">
                    <i class="material-icons prefix"><img class="iconologin" src="../app/img/porcentaje.png" /> </i>
                    <input id="cuota" type="text" disabled onKeyUp="siguiente(event,'gastosAdmon');" class="validate" autofocus>
                     <label for="icon_prefix" ><span class="etiquelogin">Cuota</span></label>
                </div>
                <div class="input-field col s6 ">
                    <i class="material-icons prefix"><img class="iconologin" src="../app/img/porcentaje.png" /> </i>
                    <input id="gastosAdmon" type="text" onKeyUp="siguiente(event,'otrosGastos');" class="validate" autofocus>
                     <label for="icon_prefix" ><span class="etiquelogin">Gastos de Administracion</span></label>
                </div>
                <div class="input-field col s6 ">
                    <i class="material-icons prefix"><img class="iconologin" src="../app/img/porcentaje.png" /> </i>
                    <input id="otrosGastos" type="text" class="validate" autofocus>
                     <label for="icon_prefix" ><span class="etiquelogin">Otros Gastos</span></label>
                </div>
                <center>
                  <input id="desembolso" style="text-align:center;" disabled type="text" class="validate" autofocus>
                  <label for="icon_prefix" ><span class="etiquelogin">Desembolso</span></label>
                </center>
                <div class="col s12">
                    <center>
                    <a id="confirmar" style="display:none" onClick="confirmarCredito();" class="waves-effect waves-light btn blue lighten-1 modal-trigger  " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/guardar.png" /></i>Confirmar el credito</a>
                </center>
                </div>
<div id="creditoConfirmado" style="display:none;">
                    <div class="input-field col s6">

                        <select id="solicitanteR" multiple>
                        <option value="" disabled selected>Requisitos Solicitante</option>
                        <?php echo Requisitos();?>
                        </select>
                        <label>Requisitos Solicitante</label>

                    </div>
                    <div class="input-field col s3">
                    <div class="Rsoli">
                        <input  type="checkbox" id="verF" />
                        <label for="verF">Fiador</label>
                        <input  type="checkbox" id="verG" />
                        <label for="verG">Garantia</label>
                    </div>
                    </div>
                
                
                

                <div class="input-field col s7" style="display:none" id="contenedorFiadorSel">

                     <select id="fiadorR" multiple>
                       <option value="" disabled selected>Requisitos Fiador</option>
                        <?php echo Requisitos();?>
                     </select>
                     <label>Requisitos Fiador</label>

                </div>
   
</div>
            </div>



             <div id="mostrarFiador" hidden>
             
               <center>
                <a id="modalnuevoF" class="waves-effect waves-light btn blue lighten-1 modal-trigger botonesrg  " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/anadir.png" /></i> Fiador</a>
               </center>

               <div id="tabla_Fiador">
                 fldsjfkljsdlkjflkjsflkjsafd
               </div>
             </div>

             <div id="mostrarGarantia" hidden>
               <center>
                <a id="modalnuevoG" class="waves-effect waves-light btn blue lighten-1 modal-trigger botonesrg " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/anadir.png" /></i>Garantia</a>
               </center>

              <div id="tabla_Garantia">
                fldsjfkljsdlkjflkjsflkjsafd
              </div>

            </div>
           

 


    </div>
    

<div class="row" id="botonesGuardar" style="display:none;">
        <div class="col s4">
            <center>
            <a id="guardarCredito" class="waves-effect waves-light btn blue lighten-1 modal-trigger botonesrg  " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/guardar.png" /></i>Guardar</a>
        </center>
        </div>
        <div class="col s4">
            <center>
        <a id="imprimir" class="waves-effect waves-light btn blue lighten-1 modal-trigger botonesrg  " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/imprimir.png" /></i>Imprimir Contratos</a>
        </center>
        </div>
        <div class="col s4">
            <center>
        <a id="pagosI" class="waves-effect waves-light btn blue lighten-1 modal-trigger botonesrg  " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/pagos.png" /></i>Imprimir Pagos</a>
        </center>
        </div>
    </div>
















          <!-- ********************************** modal ********************************** -->

          <!-- nuevo -->
<!-- *******************************************************************  modal Referencia -->

          <div id="modalR" class="modal">
              <div class="modal-content">

                  <div id="mensajeREF"></div>
                      <div class="row">
                          <div class="nav-wrapper grey darken-4">
                              <div>
                                  <p class="encabezadotextomodal"> Referencia </p>

                                  <a id="modalcerrar1" onClick="cierre();" class=" modal-action modal-close  waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                              </div>

                          </div>
                      </div>

                      <div class="row">
                        <div class="col s6" id="buscaReferencia">
<!-- buscarReferencia(this,event); -->
                        </div>
                        <div class="col s6">
                          <div class="input-field col s10 " style="display:none">
                             <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
                             <input id="CodigoREF" type="text"  class="validate">
                             <label for="icon_prefix" ><span class="etiquelogin">Codigo</span></label>
                          </div>
                          <div class="input-field col s10 ">
                             <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
                             <input id="nombreREF" type="text" onKeyUp="document.getElementById('guardarREF').style.display='block';document.getElementById('aceptarREF').style.display='none';siguiente(event,'apellidoREF');" class="validate">
                             <label for="icon_prefix" ><span class="etiquelogin">Nombre</span></label>
                          </div>
                          <div class="input-field col s10 ">
                             <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
                             <input id="apellidoREF" type="text" onKeyUp="document.getElementById('guardarREF').style.display='block';document.getElementById('aceptarREF').style.display='none';siguiente(event,'telefonoREF');" class="validate">
                             <label for="icon_prefix" ><span class="etiquelogin">Apellido</span></label>
                          </div>
                          <div class="input-field col s10 ">
                             <i class="material-icons prefix"><img class="iconologin" src="../app/img/telefono.png" /> </i>
                             <input id="telefonoREF" type="text" onKeyUp="document.getElementById('guardarREF').style.display='block';document.getElementById('aceptarREF').style.display='none';siguiente(event,'direccionREF');" class="validate">
                             <label for="icon_prefix" ><span class="etiquelogin">Telefono</span></label>
                          </div>
                          <div class="input-field col s10 ">
                             <i class="material-icons prefix"><img class="iconologin" src="../app/img/calle.png" /> </i>
                             <input id="direccionREF" type="text" onKeyUp="document.getElementById('guardarREF').style.display='block';document.getElementById('aceptarREF').style.display='none';siguiente(event,'parentescoREF');" class="validate">
                             <label for="icon_prefix" ><span class="etiquelogin">Direccion</span></label>
                          </div>
                          <div class="input-field col s10 ">
                             <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
                             <input id="parentescoREF" type="text" onKeyUp="document.getElementById('guardarREF').style.display='block';document.getElementById('aceptarREF').style.display='none';siguiente(event,'emailREF');" class="validate">
                             <label for="icon_prefix" ><span class="etiquelogin">Parentesco</span></label>
                          </div>
                          <div class="input-field col s10 ">
                             <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
                             <input id="emailREF" type="text" onKeyUp="document.getElementById('guardarREF').style.display='block';document.getElementById('aceptarREF').style.display='none';" class="validate">
                             <label for="icon_prefix" ><span class="etiquelogin">Email</span></label>
                          </div>

                        </div>
                        <a id="guardarREF" onClick="ingresarReferencia();" class="waves-effect waves-light btn blue lighten-1 modal-trigger" ><i class="material-icons left"></i>Guardar Fiador</a>
                        <a id="aceptarREF" style="display:none" onClick="agregarReferencia();" class="waves-effect waves-light btn blue lighten-1 modal-trigger" ><i class="material-icons left"></i>Aceptar</a>
                      </div>
              </div>
         </div>

<!-- *******************************************************************  modal Fiador -->

    <div id="modalF" class="modal">
        <div class="modal-content">

            <div id="mensajeFiadorBusca"></div>
                <div class="row">
                    <div class="nav-wrapper grey darken-4">
                        <div>
                            <p class="encabezadotextomodal"> Fiador</p>

                            <a id="modalcerrar1" onClick="cierre();" class=" modal-action modal-close  waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                        </div>

                    </div>
                </div>

                <div class="row">
                  <div class="col s6" id="menu_fiador">

                  </div>
                  <div class="col s6">

                    <div class="input-field col s10" style="display:none">
                       <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
                       <input id="codigoFIA" type="text" class="validate">
                       <label for="icon_prefix" ><span class="etiquelogin">CUI</span></label>
                    </div>
                    <div class="input-field col s10 ">
                       <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
                       <input id="cuiFIA" type="text" onKeyUp="mostrarFiadoresDisponibles(this.value);siguiente(event,'nombreFIA');" class="validate">
                       <label for="icon_prefix" ><span class="etiquelogin">CUI</span></label>
                    </div>
                    <div class="input-field col s10 ">
                       <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
                       <input id="nombreFIA" type="text" onKeyUp="siguiente(event,'apellidoFIA');" class="validate">
                       <label for="icon_prefix" ><span class="etiquelogin">Nombre</span></label>
                    </div>
                    <div class="input-field col s10 ">
                       <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
                       <input id="apellidoFIA" type="text" onKeyUp="siguiente(event,'telefonoFIA');" class="validate">
                       <label for="icon_prefix" ><span class="etiquelogin">Apellido</span></label>
                    </div>
                    <div class="input-field col s10 ">
                       <i class="material-icons prefix"><img class="iconologin" src="../app/img/telefono.png" /> </i>
                       <input id="telefonoFIA" type="text" onKeyUp="siguiente(event,'direccionFIA');" class="validate">
                       <label for="icon_prefix" ><span class="etiquelogin">Telefono</span></label>
                    </div>
                    <div class="input-field col s10 ">
                       <i class="material-icons prefix"><img class="iconologin" src="../app/img/calle.png" /> </i>
                       <input id="direccionFIA" type="text" onKeyUp="siguiente(event,'nitFIA');" class="validate">
                       <label for="icon_prefix" ><span class="etiquelogin">Direccion</span></label>
                    </div>
                    <div class="input-field col s10 ">
                       <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
                       <input id="nitFIA" type="text" class="validate">
                       <label for="icon_prefix" ><span class="etiquelogin">Nit</span></label>
                    </div>

                  </div>

                   <div class="row">

                     <div class="input-field col s6">
                       <div class="input-field col s6">
                          <div class="file-field input-field">
                            <div class="btn">
                              <span>Foto de Perfil</span>
                              <input type="file" id="imagen1" name="imagen1" onChange="previsualizarImagenesFiador(this,'perfil','imagen1');">
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
                            <input type="file" id="imagen2" name="imagen2" onChange="previsualizarImagenesFiador(this,'firma','imagen2');">
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



                  </div>
                  <a id="" onClick="ingresarFiador();" class="waves-effect waves-light btn blue lighten-1 modal-trigger" ><i class="material-icons left"></i>Aceptar</a>
                </div>


        </div>
   </div>
<!-- *******************************************************************  modal garantia -->
<div id="modalG" class="modal">
    <div class="modal-content">

        <div id="mensajeGara"></div>
            <div class="row">
                <div class="nav-wrapper grey darken-4">
                    <div>
                        <p class="encabezadotextomodal"> Garantia </p>

                        <a id="modalcerrar1" onClick="cierre();" class=" modal-action modal-close  waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                    </div>

                </div>
            </div>

            <div class="row">

              <div class="col s12">

                <div class="input-field col s10 ">
                   <i class="material-icons prefix"><img class="iconologin" src="../app/img/producto.png" /> </i>
                   <input id="descripcionGara" type="text" onKeyUp="siguiente(event,'direccionC');" class="validate">
                   <label for="icon_prefix" ><span class="etiquelogin">Descripcion</span></label>
                </div>
                <div class="input-field col s10 ">
                   <i class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png" /> </i>
                   <input id="valorGara" type="text" onKeyUp="siguiente(event,'direccionC');" class="validate">
                   <label for="icon_prefix" ><span class="etiquelogin">Valoracion</span></label>
                </div>


              </div>
              <a id="aceptarGara" onClick="ingresarGarantia();" class="waves-effect waves-light btn blue lighten-1 modal-trigger" ><i class="material-icons left"></i>Aceptar</a>
            </div>
    </div>
</div>



          <!-- modal Cliente -->

          <div id="modal4" class="modal">
              <div class="modal-content">

                  <div id="mensajeACliente"></div>
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

           <!-- modal Productos -->

          <div id="modal5" class="modal">
              <div class="modal-content">
                  <form class="col s8">
                      <div class="row">
                          <div class="nav-wrapper grey darken-4">
                              <div>
                                  <p class="encabezadotextomodal"> Productos </p>

                                  <a id="modalcerrar" class="  modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                              </div>

                          </div>
                      </div>
                <div id="productoContenedor">

                </div>
                  </form>
              </div>

          </div>

          <!-- Producto Fin -->

          <!-- ********************************** modal fin ********************************** -->
