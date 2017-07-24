<?php
function  buscaFiador($dato)
{
    
    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT cui,nombre,apellido,telefono,direccion,nit,foto,firma,idcliente FROM cliente WHERE (cui like '%".$dato[0]."%' or nombre like '%".$dato[0]."%' or apellido like '%".$dato[0]."%' or email like '%".$dato[0]."%') and estado=1 and fiador=1";
 
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		  	
		while($fila = $resultado->fetch_row())
		{   
			
			$form .="<div class='borde' onClick=\"seleccionarFiador('".$fila[8]."');\"><div><span>Nombre: </span><span class='enlinea' >".$fila[1]." ".$fila[2]."</span></div><div><span>CUI: </span><span class='enlinea' >".$fila[0]."</span></div></div><br>";
		}
		$resultado->free();    
	  }
	  else
	  {
		$form .="<script>";
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

function  seleccionarFiador($datos)
{
    

    $mysql = conexionMysql();
    $form=array();
    $sql = "SELECT u.nombre,u.apellido,u.telefono,u.direccion,u.nit,u.idcliente,u.cui,u.foto,u.firma FROM cliente u WHERE estado=1 and u.idcliente='".$datos[0]."'";
    
    if($resultado = $mysql->query($sql))
    {
      
    $fila = $resultado->fetch_row();  

    $form=$fila;

    if(!file_exists("../../app/imagenes/clientes".$form[7])){
        $form[7]="";
    }

    if(!file_exists("../../app/imagenes/clientes".$form[8])){
        $form[8]="";
    }
  
    $resultado->free();    
    
    }
    else
    {   
    
    $form = "<div>$sql</div>";
    
    }
    
    
    $mysql->close();
    
   echo json_encode($form);
    
}

function insertarFiador($datos)
{
    
    

    $sql = "INSERT INTO cliente (nombre, Direccion, Telefono, Nit, apellido,estado,cui,firma,foto,cliente,fiador) VALUES ('".$datos[0]."','".$datos[1]."','".$datos[3]."','".$datos[2]."','".$datos[4]."',1,'".$datos[5]."','','',0,1)";
    
    $mysql = conexionMysql(); 
    //echo $sql;
    if($resultado = $mysql->query($sql))
    {
        $consulta= $mysql->query("select idcliente from cliente where nombre='".$datos[0]."' and apellido='".$datos[4]."' and direccion='".$datos[1]."' and telefono='".$datos[3]."' and nit='".$datos[2]."' and cui='".$datos[5]."'")->fetch_row();
        if($consulta){
            $mysql->query("insert into fiadores(idcliente,idcredito) values('".$consulta[0]."','".$datos[6]."')");
        $respuesta = "<script>

                   
                        if(document.getElementById('imagen1').value!=\"\"){
                        subirImagenesFiador(document.getElementById('imagen1'),'perfil','imagen1','".$consulta[0]."');
                        }else
                        if(document.getElementById('imagen2').value!=\"\"){
                        subirImagenesFiador(document.getElementById('imagen2'),'firma','imagen2','".$consulta[0]."');
                        }else{
                            
                    
                 
                  cierre();
				   $('#modalF').closeModal();
                    mostrarFiadoresCredito();  
                        }
                    </script>";
        }else{
            $respuesta = "<script>
                    alert('no se encontro nada');
            </script>";
        }
    }
    else
    { 
        $respuesta = "<div>Error en en la insercion </div>"; 
        echo 1;
    }
    
    
    $mysql->close();
    
    return printf($respuesta);
    
    
}

function actualizarFiador($datos)
{
    
    

    $sql = "update cliente set nombre='".$datos[0]."', apellido='".$datos[4]."', direccion='".$datos[1]."',telefono='".$datos[3]."',nit='".$datos[2]."',cui='".$datos[6]."',cliente=0,fiador=1 where idcliente=".$datos[5]."";
    
    $mysql = conexionMysql(); 
    $mysql->query("BEGIN");
    if($resultado = $mysql->query($sql))
    {
        $consulta= $mysql->query("select * from fiadores where idcliente='".$datos[5]."' and idcredito='".$datos[7]."'");
        if($consulta->num_rows<=0){
            $mysql->query("insert into fiadores(idcliente,idcredito) values('".$datos[5]."','".$datos[7]."')");
        }
        $mysql->query("COMMIT");	
        $respuesta = "<script>

                   
                        if(document.getElementById('imagen1').value!=\"\"){
                        subirImagenesFiador(document.getElementById('imagen1'),'perfil','imagen1','".$datos[5]."');
                        }else
                        if(document.getElementById('imagen2').value!=\"\"){
                        subirImagenesFiador(document.getElementById('imagen2'),'firma','imagen2','".$datos[5]."');
                        }else{
                            
                    
                 
                  cierre();
				   $('#modalF').closeModal();
                    mostrarFiadoresCredito();  
                        }
                    </script>";
			
    }
    else
    { 
	$mysql->query("ROLLBACK");
        $respuesta = "<div>Error en en la insercion </div>"; 
        echo 1;
    }
    
    
    $mysql->close();
    
    return printf($respuesta);
    
    
}

function subir_archivosFiador($datos){
    if (!empty($datos[0])) {
        $archivo = $datos[0];
        $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
        $tipo=$archivo['type'];
        $nombre=str_replace(".".$extension,"",$archivo['name']);
        $nombreUso=$datos[1]."_".$datos[2]."_".$datos[3].".".$extension;
        $ruta_provisional=$archivo['tmp_name'];
        $size=$archivo['size'];
        $dimensiones=getimagesize($ruta_provisional);
        $alto=$dimensiones[1];
        $ancho=$dimensiones[0];
        $subir=false;
        $mensaje='';
        $subir=true;
            if($size < (2*(1024*1024))){
                $subir=true;
            }else{
                $mensaje="La imagen es muy grande";
            }
            
            if($subir==true){
                $dir=strtolower("../../app/imagenes/");
                    if(!is_dir($dir)) {
                        mkdir($dir, 0777);
                    }
                $dir=strtolower("../../app/imagenes/clientes/");
                    if(!is_dir($dir)) {
                        mkdir($dir, 0777);
                    }
                $dir=strtolower("../../app/imagenes/clientes/".$datos[1]."/");
                    if(!is_dir($dir)) {
                        mkdir($dir, 0777);
                    }
                

                $file_name=strtolower($nombreUso);
                $add="";
                $file="";
                $add=$dir.$file_name;
                if (move_uploaded_file($ruta_provisional, $add)) {
                            $dat[0]=$dir;
                            $dat[1]=$file_name;
                            $dat[2]=$datos[1];
                            $dat[3]=$datos[4];
                            $dat[4]=$datos[3];
                            guardar_imagenFiador($dat);
                }else{
                            echo "Error al subir el archivo1";
                }
            }else{
                echo "<script>alert('".$mensaje."');</script>";
            }
    }
}
function guardar_imagenFiador($datos)
{
    $dir="/".$datos[2]."/";
    $foto=$datos[1];
    if(file_exists($datos[0].$datos[1])){
        if($datos[4]=='perfil'){
            $sql = "update cliente set foto='".$dir.$foto."' where idcliente=".$datos[3]."";
        }else if($datos[4]=='firma'){
            $sql = "update cliente set firma='".$dir.$foto."' where idcliente=".$datos[3]."";
        }
    }
    
    $mysql = conexionMysql(); 
    $mysql->query("BEGIN");
    if($resultado = $mysql->query($sql))
    {
        $mysql->query("COMMIT");	
        if($datos[4]=='perfil'){
            $respuesta = "<script>
                        document.getElementById('imagen1').value='';
                        if(document.getElementById('imagen2').value!=\"\"){
                            subirImagenesFiador(document.getElementById('imagen2'),'firma','imagen2','".$datos[3]."');
                        }else{
                            $('#modalF').closeModal();
                             mostrarFiadoresCredito();  
                            }
                        </script>";
        }else if($datos[4]=='firma'){
            $respuesta = "<script>
                        document.getElementById('imagen2').value='';
                        if(document.getElementById('imagen1').value!=\"\"){
                            subirImagenesFiador(document.getElementById('imagen1'),'perfil','imagen1','".$datos[3]."');
                        }else{
                            $('#modalF').closeModal();
                             mostrarFiadoresCredito();  
                            }
                        </script>";
        }
        
			
    }
    else
    { 
	$mysql->query("ROLLBACK");
        $respuesta = "<div>Error en en la insercion </div>"; 
        echo 1;
    }
    
    
    $mysql->close();
    
    return printf($respuesta);
}

?>