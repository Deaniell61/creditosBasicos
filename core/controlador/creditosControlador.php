<?php


if($_POST)
{
    require('../configCore.php');
    $transaccion = $_POST['trasDato'];

    if($transaccion == 1)
    {
        $datos[0] = $_POST['cui'];
        buscarCliente($datos);
    }
//------------ gestion --------------/    
    else if($transaccion == 2)
    {
        $idProv[0] = $_POST['prov'];
        inicioCredito($idProv);
    }
    else if($transaccion == 3)
    {
        $datos[0]=$_POST['idcliente'];
        $datos[1]=$_POST['monto'];
        $datos[2]=$_POST['tasaInteres'];
        $datos[3]=$_POST['totalCredito'];
        $datos[4]=$_POST['tipoPlazo'];
        $datos[5]=$_POST['plazo'];
        $datos[6]=$_POST['gastosAdmon'];
        $datos[7]=$_POST['otrosGastos'];
        $datos[8]=$_POST['cuota'];
        $datos[9]=$_POST['desembolso'];
        $datos[10]=$_POST['fecha'];
        $datos[11]=$_POST['comprobante'];

        confirmarCredito($datos);
    }
    else if($transaccion == 4)
    {
        
        $datos[0]=$_POST['buscar'];

        buscarReferencia($datos);
        
    }
    
    else if($transaccion == 5)
    {
        $datos[0]=$_POST['nombre'];
        $datos[1]=$_POST['apellido'];
        $datos[2]=$_POST['telefono'];
        $datos[3]=$_POST['direccion'];
        $datos[4]=$_POST['parentesco'];
        $datos[5]=$_POST['email'];
        $datos[6]=$_POST['cliente'];

        ingresoReferencia($datos);

    }
	else if($transaccion == 6)
    {
        
        $datos[0]=$_POST['id'];
		seleccionarReferencia($datos);
    
    }
    // eliminar
    else if($transaccion == 7)
    {
        
        $datos[0]=$_POST['id'];
        $datos[1]=$_POST['cliente'];

        asignarReferencia($datos);
        
        
    }
    
    //editar
    else if($transaccion == 8)
    {
        
        $dato[0] = $_POST['id'];
        
        mostrarGarantia($dato);
        
    }
    
    else if($transaccion == 9)
    {

		$datos[0] = $_POST['valoracion'];
        $datos[1] = $_POST['descripcion'];
        $datos[2] = $_POST['credito'];
		
		        
        ingresarGarantia($datos);

    }
	else if($transaccion == 10)
    {

		$datos[0]=$puesto = $_POST['id'];
		
		        
        anularCredito($datos);

    }
	else if($transaccion == 11)
    {

		$datos[0]= $_POST['credito'];
		
		        
        guardarCredito($datos);

    }
	else if($transaccion == 12)
    {

        $datos[0] = $_POST['id'];
		        
        autorizar($datos);

    }
	else if($transaccion == 13)
    {

        $datos[0]=$nombre = $_POST['codigo'];
		$datos[1]=$puesto = $_POST['cantidad'];
		$datos[2]=$puesto = $_POST['cliente'];
		
		        
        quitaInventario($datos);

    }
	else if($transaccion == 14)
    {

        $datos[0] = $_POST['id'];
		
		
		        
        anularDetalleCredito($datos);

    }
	else if($transaccion == 15)
    {

        $datos[0] = $_POST['id'];
		
		
		        
        buscarPlazoCuentaCobrar($datos);

    }
	else if($transaccion == 16)
    {

        $datos[0] = $_POST['tipo'];
		
		
		        
        mostrarCreditos($datos);

    }
    else if($transaccion == 17)
    {

        $datos[0] = $_POST['tipo'];
		
		
		        
        mostrarCreditosAnul($datos);

    }
	else if($transaccion == 18)
    {

        $datos[0] = $_POST['tipo'];
		$datos[1] = $_POST['fechaini'];
		$datos[2] = $_POST['fechafin'];
		
		
		        
        mostrarCreditosPorFecha($datos);

    }
//----------- fin gestion ----------/    
    
}
else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>