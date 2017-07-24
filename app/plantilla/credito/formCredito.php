 <div>
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
                                            <div class="input-field col s6" style="" id="chkReferencia">
                                                    <div class="Rsoli">
                                                        <input  type="checkbox" id="verR" checked />
                                                        <label for="verR">Referencia</label>
                                                    </div>
                                                </div>

                                    </div>

                                    </div>

                                    <div id="mostrarRef" hidden>
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
                        <div id="creditoConfirmado">
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
                                        
                                        
                                        

                                        <div class="input-field col s7" id="contenedorFiadorSel">

                                            <select id="fiadorR" multiple>
                                            <option value="" disabled selected>Requisitos Fiador</option>
                                                <?php echo Requisitos();?>
                                            </select>
                                            <label>Requisitos Fiador</label>

                                        </div>
                        
                        </div>
                                    </div>



                                    <div id="mostrarFiador" >
                                    
                                   
                                    <div id="tabla_Fiador">
                                        
                                    </div>
                                    </div>

                                    <div id="mostrarGarantia">
                                    
                                    <div id="tabla_Garantia">
                                        
                                    </div>

                                    </div>
                                

                        


                            </div>
                            

                       
                      </div>