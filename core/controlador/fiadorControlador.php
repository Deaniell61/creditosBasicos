<?php


if($_POST)
{
    require('../configCore.php');
    $transaccion = $_POST['trasDato'];

    if($transaccion == 1)
    {
        $datos[0] = $_POST['cliente'];
        mostrarFiador($datos);
    }
//------------ gestion --------------/    
    else if($transaccion == 2)
    {
        $datos[0]=$_POST['busca'];
        $datos[1]=$_POST['cliente'];

        buscaFiador($datos);
    }else if($transaccion == 3)
    {
        $datos[0]=$_POST['id'];
        $datos[1]=$_POST['cliente'];

        seleccionarFiador($datos);
    }
    else  if($transaccion == 4)
    {
        $datos[0]=$_POST['nombre'];
		$datos[1]=$_POST['direccion'];
		$datos[2]=$_POST['nit'];
		$datos[3]=$_POST['telefono'];
		$datos[4]=$_POST['apellido'];
		$datos[5]=$_POST['cui'];
		$datos[6]=$_POST['credito'];
        
        insertarFiador($datos);
        
        
    
    }
	else
	if($transaccion == 5)
    {
        $datos[0]=$_POST['nombre'];
		$datos[1]=$_POST['direccion'];
		$datos[2]=$_POST['nit'];
		$datos[3]=$_POST['telefono'];
		$datos[4]=$_POST['apellido'];
		$datos[5]=$_POST['codigo'];
		$datos[6]=$_POST['cui'];
		$datos[7]=$_POST['credito'];
        
        actualizarFiador($datos);
        
        
    
    }
    else
    if($transaccion == 6)
    {
        $index=$_POST['id'];
        if(isset($_FILES[$index])){
            $datos[0]=$_FILES[$index];
            $datos[1]=$_POST['cliente'];
            $datos[2]=$_POST['firma'];
            $datos[3]=$_POST['tipo'];
		    $datos[4]=$_POST['idUsua'];
            subir_archivosFiador($datos);
        }
    }
   
//----------- fin gestion ----------/    
    
}
else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>