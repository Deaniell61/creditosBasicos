<?php


function  buscarCliente($datos)
{
    

    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT cui,nombre,direccion,apellido,idcliente,foto FROM cliente WHERE cui='".$datos[0]."' or nombre='".$datos[0]."' OR idcliente='".$datos[0]."'";
 	//echo $sql;
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		$fila = $resultado->fetch_row();    
			
		
		$form .="<script>";
		$form .=" \$('#CUI').val('".$fila[0]."');\$('#CUI').focus();";
		//$form .="/* document.getElementById('rol').value='".$fila[2]."';\$('#rol').focus();*/";
		$form .=" \$('#Cliente').val('".$fila[1]." ".$fila[3]."');\$('#Cliente').focus();document.getElementById('Cliente').disabled=true;";
		$form .=" \$('#direccionC').val('".$fila[2]."');\$('#direccionC').focus();document.getElementById('direccionC').disabled=true;\$('#factura').focus();";
		$form .=" document.getElementById('codigoCliente').value='".$fila[4]."';document.getElementById('codigoCliente').disabled=true;";
        $form .=" document.getElementById('fotoPerfil').src='../app/imagenes/clientes".$fila[5]."';
                    \$('#chkReferencia').css('display','block');";
		$form .="iniciarCredito('".$fila[4]."'); ";
		
		$form .="</script>";
			
		$resultado->free();    
	  }
	  else
	  {
		$form .="<script>";
		$form .="\$('#modal4').openModal();
					setTimeout(function(){
		llamarCliente();},300); ";
		$form .="</script>";
		$resultado->free();   
	  }
    
    }
    else
    {   
    
    $form = "<div><script>console.log('$idedit');</script></div>";
    
    }
    
    
    $mysql->close();
    
    return printf($form);
    
}

function inicioCredito($idProv)
{
	$mysql = conexionMysql();
    $form="";
	//session_start();
		
   $sql = "select idcreditos,noComprobante from creditos where estado=1 or estado=2 order by nocomprobante desc limit 1;";
 
    if($mysql->query($sql))
    {
        if($resultado = $mysql->query($sql)){
            if($resultado->num_rows>0)
            {
        
                while($fila = $resultado->fetch_row()){    
                
                    $form .="<script>";
                        $form .="document.getElementById('codigoCredito').value='".$fila[0]."';\$('#comprobante').focus();";
                        $form .="document.getElementById('comprobante').value='".($fila[1]+1)."';\$('#comprobante').focus();";
                        $form .="\$('#montoCredito').focus();";
                        $form .="\$('#confirmar').css('display','block');";   
                    $form .="</script>";
                }
            }else{
                $form .="<script>";
                    $form .="document.getElementById('comprobante').value='1';\$('#comprobante').focus();";
                    $form .="\$('#montoCredito').focus();";     
                    $form .="\$('#confirmar').css('display','block');";       
                $form .="</script>";            
            }
            $resultado->free();    
        }
    
    }
    else
    {   
    
    $form = "<div>$sql<script>console.log('Error de query');</script></div>";
    
    }
    
    
    $mysql->close();
    
    return printf($form);
  
}
function confirmarCredito($datos)
{
	$mysql = conexionMysql();
    $form="";
	session_start();
	$mysql->query("BEGIN");
	
    $sql="insert into creditos(fecha,
                      noComprobante,
                      idCliente,
                      idUsuario,
                      plazo,
                      tipoPlazo,
                      tasaInteres,
                      montoCredito,
                      cuota,
                      interes,
                      GastosAdmon,
                      OtrosGastos,
                      Desembolso,
                      estado) values('".$datos[10]."',
                                     '".$datos[11]."',
                                     '".$datos[0]."',
                                     '".$_SESSION['SOFT_USER_ID']."',
                                     '".$datos[5]."',
                                     '".$datos[4]."',
                                     '".$datos[2]."',
                                     '".$datos[1]."',
                                     '".$datos[8]."',
                                     '".$datos[2]."',
                                     '".$datos[6]."',
                                     '".$datos[7]."',
                                     '".$datos[9]."',
                                     3)";
	if($cont=$mysql->query($sql)){
        $mysql->query("COMMIT");
        $fila=$mysql->query("select idcreditos from creditos order by idcreditos desc limit 1;")->fetch_row();

        
        echo "<script>
                 \$('#codigoCredito').val('".$fila[0]."');
                 \$('#creditoConfirmado').css('display','block');
                 \$('#botonesGuardar').css('display','block');
                 \$('#confirmar').css('display','none');
                 \$('#montoCredito').prop( 'disabled', true );
                 \$('#tasaInteres').prop( 'disabled', true );
                 \$('#totalCredito').prop( 'disabled', true );
                 \$('#plazo').prop( 'disabled', true );
                 \$('#gastosAdmon').prop( 'disabled', true );
                 \$('#otrosGastos').prop( 'disabled', true );
                 \$('#cuota').prop( 'disabled', true );
                 \$('#desembolso').prop( 'disabled', true );
                 \$('#fecha').prop( 'disabled', true );
                 \$('#comprobante').prop( 'disabled', true );
                 \$('#tipoPlazo').prop( 'disabled', true );
                 \$('#tipoPlazo').material_select('destroy');
                 
                // \$('#tipoPlazo').material_select();
            </script>";
    }else{
        $mysql->query("ROLLBACK");
        echo "$sql";
    }
			 
	
    
    $mysql->close();
    
    return printf($form);
  
}

function  buscarReferencia($dato)
{
    
    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT nombre,apellido,telefono,direccion,idreferencia FROM referencia WHERE (nombre like '%".$dato[0]."%' or apellido like '%".$dato[0]."%' or email like '%".$dato[0]."%') and estado=1";
 
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		  	
		while($fila = $resultado->fetch_row())
		{   
			
			$form .="<div class='borde' onClick=\"seleccionarReferencia('".$fila[4]."');\"><div><span>Nombre: </span><span class='enlinea' >".$fila[0]." ".$fila[1]."</span></div></div><br>";
		}
		$resultado->free();    
	  }
	  else
	  {
		$form .="<script>";
			$form .="document.getElementById('agregarProd').hidden=false;";
			$form .="</script>";
	  }
    
    }
    else
    {   
    
    $form = "<div>$sql<script>console.log('".$dato[0]."');</script></div>";
    
    }
    
    
    $mysql->close();
    
    printf($form);
    
}
function ingresoReferencia($datos)
{
	$mysql = conexionMysql();
    $form="";
	session_start();
	$mysql->query("BEGIN");
	
    $sql="insert into referencia(nombre,
                      apellido,
                      parentesco,
                      telefono,
                      direccion,
                      email,
                      estado) values('".$datos[0]."',
                                     '".$datos[1]."',
                                     '".$datos[4]."',
                                     '".$datos[2]."',
                                     '".$datos[3]."',
                                     '".$datos[5]."',
                                     1)";
	if($cont=$mysql->query($sql)){
        $sqlF="select idreferencia from referencia where nombre='".$datos[0]."' and 
                                                         apellido='".$datos[1]."' and 
                                                         parentesco='".$datos[4]."' and 
                                                         telefono='".$datos[2]."' and 
                                                         direccion='".$datos[3]."' and 
                                                         email='".$datos[5]."' and 
                                                         estado=1";
        if($resultado=$mysql->query($sqlF)){
            if($fila=$resultado->fetch_row()){
                $sqlIn="insert into referenciaCliente(idReferencia,
                      idCliente,
                      estado) values('".$fila[0]."',
                                     '".$datos[6]."',
                                     1)";
	            if($mysql->query($sqlIn)){
                     $mysql->query("COMMIT");
                     echo "<script>
                                \$('#nombreREF').val('');
                                \$('#apellidoREF').val('');
                                \$('#telefonoREF').val('');
                                \$('#direccionREF').val('');
                                \$('#parentescoREF').val('');
                                \$('#emailREF').val('');
                                mostrarReferencia();
                                \$('#modalR').closeModal();
                                cierre();
                                
                            </script>";
                }else{
                     $mysql->query("ROLLBACK");
                }
            }
        }
    }else{
        $mysql->query("ROLLBACK");
        echo "$sql";
    }
			 
	
    
    $mysql->close();
    
    return printf($form);
  
}
function seleccionarReferencia($datos)
{
	$mysql = conexionMysql();
    $form="";
	//session_start();
		
   $sql = "select nombre,apellido,telefono,direccion,parentesco,email from referencia where idreferencia='".$datos[0]."'";
 
    if($mysql->query($sql))
    {
        if($resultado = $mysql->query($sql)){
            if($resultado->num_rows>0)
            {
        
                $fila = $resultado->fetch_row();    
                    $form .="<script>";
                    $form .="\$('#CodigoREF').val('".$datos[0]."');\$('#CodigoREF').focus();";
                    $form .="\$('#nombreREF').val('".$fila[0]."');\$('#nombreREF').focus();";
                    $form .="\$('#apellidoREF').val('".$fila[1]."');\$('#apellidoREF').focus();";
                    $form .="\$('#telefonoREF').val('".$fila[2]."');\$('#telefonoREF').focus();";
                    $form .="\$('#direccionREF').val('".$fila[3]."');\$('#direccionREF').focus();";
                    $form .="\$('#parentescoREF').val('".$fila[4]."');\$('#parentescoREF').focus();";
                    $form .="\$('#emailREF').val('".$fila[5]."');\$('#emailREF').focus();";
                    $form .="document.getElementById('aceptarREF').style.display='block';";
                    $form .="document.getElementById('guardarREF').style.display='none';";
                    $form .="</script>";
            }
            $resultado->free();    
        }
    
    }
    else
    {   
    
    $form = "<div>$sql<script>console.log('Error de query');</script></div>";
    
    }
    
    
    $mysql->close();
    
    return printf($form);
  
}
function asignarReferencia($datos)
{
	$mysql = conexionMysql();
    $form="";
	session_start();
	$mysql->query("BEGIN");
	

    $sqlIn="insert into referenciaCliente(idReferencia,
            idCliente,
            estado) values('".$datos[0]."',
                            '".$datos[1]."',
                            1)";
    if($mysql->query($sqlIn)){
            $mysql->query("COMMIT");
            echo "<script>
                    \$('#nombreREF').val('');
                    \$('#apellidoREF').val('');
                    \$('#telefonoREF').val('');
                    \$('#direccionREF').val('');
                    \$('#parentescoREF').val('');
                    \$('#emailREF').val('');
                    mostrarReferencia();
                    \$('#modalR').closeModal();
                    cierre();
                    
                </script>";
    }else{
            $mysql->query("ROLLBACK");
    }
       
    $mysql->close();
    
    return printf($form);
  
}
function ingresarGarantia($datos)
{
	$mysql = conexionMysql();
    $form="";
	session_start();
	$mysql->query("BEGIN");
	
    $sql="insert into garantia(descripcion,
                      valoracion,
                      estado,
                      idcredito) values('".$datos[1]."',
                                     '".$datos[0]."',
                                     '1',
                                     '".$datos[2]."')";
	if($cont=$mysql->query($sql)){
        
        $mysql->query("COMMIT");
        $form= "<script>
                \$('#descripcionGara').val('');
                \$('#valorGara').val('');
                mostrarGarantias();
                \$('#modalG').closeModal();
                cierre();
                
            </script>";
    }else{
        $mysql->query("ROLLBACK");
        echo "$sql";
    }
			 
	
    
    $mysql->close();
    
    return printf($form);
  
}
function buscarCredito($dato)
{
	

    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombre,c.total,c.tipoCredito,c.idCreditos,p.direccion FROM Creditos c inner join cliente p on p.idcliente=c.idcliente where (c.estado=1 or c.estado=0) and c.idCreditos='".$dato[0]."' ";

    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		  if($fila = $resultado->fetch_row())
		  {
		  	$form .="<script>";
			$form .="document.getElementById('NIT').disabled=false;document.getElementById('NIT').value='".$fila[2]."';document.getElementById('NIT').focus();document.getElementById('NIT').disabled=true;";
			$form .="document.getElementById('fecha').disabled=false;document.getElementById('fecha').value='".substr($fila[0],0,10)."';document.getElementById('fecha').focus();document.getElementById('fecha').disabled=true;";
			$form .="document.getElementById('Cliente').disabled=false;document.getElementById('Cliente').value='".$fila[3]."';document.getElementById('Cliente').focus();document.getElementById('Cliente').disabled=true;";
			$form .="document.getElementById('direccionC').disabled=false;document.getElementById('direccionC').value='".$fila[7]."';document.getElementById('direccionC').focus();document.getElementById('direccionC').disabled=true;";
			$form .="document.getElementById('factura').disabled=false;document.getElementById('factura').value='".$fila[1]."';document.getElementById('factura').focus();document.getElementById('factura').disabled=true;";
			//$form .="\$('#tipoCredito').val(\"".$fila[5]."\"); $('#tipoCredito').material_select(); ";
			$form .="\$('#tipoCompra').val(\"".$fila[5]."\");$('#tipoCompra').material_select('destroy'); $('#tipoCompra').material_select(); ";
			$form .="cargarDetalleCreditos('".$dato[0]."');";
			$form .="</script>";
			
		}
		$resultado->free();    
	  }
	  else
	  {
		$form .="<script>";
			$form .="document.getElementById('productosContenedor').hidden=true;";
			$form .="</script>";
	  }
    
    }
    else
    {   
    
    $form = "<div>$sql<script>console.log('".$dato[0]."');</script></div>";
    
    }
    
    
    $mysql->close();
    
    return printf($form);
    
}


function anularCredito($datos)
{
	$mysql = conexionMysql();
    $form="";
	
		$mysql->query("BEGIN");
    $sql = "update Creditos set estado='0' where idCreditos='".$datos[0]."'";
//echo $sql;
    if($mysql->query($sql))
    {
		if(!$mysql->query("update Creditosdetalle set estado='0' where idCredito='".$datos[0]."'"))
				{
					$mysql->query("ROLLBACK");
				}
				else
		if($con=$mysql->query("select cantidad,idproductos from Creditosdetalle where idCredito='".$datos[0]."'"))
    	{
			while($fila = $con->fetch_row())
			{
				if(!$mysql->query("update inCreditorio set cantidad=cantidad+".$fila[0]." where idproducto='".$fila[1]."'"))
				{
					$mysql->query("ROLLBACK");
				}
			}
			
			$mysql->query("COMMIT");
		}
		else
		{
			$mysql->query("ROLLBACK");
		}
		
			    
		$form = "<script>alert('La Credito fue anulada');setTimeout(window.location.reload(), 3000);</script>";
    
    }
    else
    {   
    	$mysql->query("ROLLBACK");
    $form = "<div><script>location.reload();console.log('".$datos[0]."');</script></div>";
    
    }
    
    
    $mysql->close();
    
    return printf($form);
}

function guardarCredito($datos)
{
	$mysql = conexionMysql();
    $form=array();
	//session_start();
		
   $sql = "update creditos set estado=2 where idcreditos='".$datos[0]."'";
 
    if($mysql->query($sql))
    {
        $form['estatus']=1;
        $form['message']="Actualizacion correcta";
        
    }
    else
    {   
    
        $form['estatus']=0;
        $form['message']="Error al actualizar";
    
    }
    
    
    $mysql->close();
    
    echo json_encode($form);

}
function agregarCuentaCobrar($datos,$mysql)
{
	//$mysql = conexionMysql();
    $form=false;
	//session_start();
	$mysql->query("BEGIN");

    $row=$mysql->query("select montoCredito,cuota,noComprobante from creditos where idcreditos='".$datos[0]."'")->fetch_row();
	
    $sql="insert into cuentasCobrar(tazaMora,
                      idCredito,
                      total,
                      saldo,
                      pago,
                      Descripcion,
                      estado,
                      fecha) values('12',
                                     '".$datos[0]."',
                                     '".$row[0]."',
                                     '".$row[0]."',
                                     '".$row[1]."',
                                     'Cuenta del credito con comprobante : ".$row[2]."',
                                     1,
                                     '".date('Y-m-d')."')";
	if($mysql->query($sql)){
        if($mysql->query("COMMIT")){
            $form=true;
        }
    }else{
        $mysql->query("ROLLBACK");
        
    }
			 
	
    
   
    
    return ($form);
  
}
function autorizar($datos)
{
	$mysql = conexionMysql();
    $form=array();
	//session_start();
		$mysql->query("BEGIN");
   $sql = "update creditos set estado=1 where idcreditos='".$datos[0]."'";
 
    if($mysql->query($sql))
    {
        if(agregarCuentaCobrar($datos,$mysql)){
            $mysql->query("COMMIT");
            $form['estatus']=1;
            $form['message']="Actualizacion correcta";
           
        }else{
            $mysql->query("ROLLBACK");
            $form['estatus']=0;
            $form['message']="Error al ingresar cuenta por cobrar";
        }
    }
    else
    {   $mysql->query("ROLLBACK");
    
        $form['estatus']=0;
        $form['message']="Error al actualizar";
    
    }
    
    
    $mysql->close();
    
    echo json_encode($form);
  
}




?>