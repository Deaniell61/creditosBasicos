<?php

//Constantes de conexión
require_once('../conf.php');

//rutas de html
define('HTML_DIR','plantilla/');
define('HTML_ERROR','error/');
define('HTML_INDEX','index/');
define('HTML_GENERAL', HTML_DIR.'general/');
define('HTML_PUBLIC', HTML_DIR.'public/');
define('HTML_LIB', HTML_DIR.'lib/');


/*
//nombre de la aplicacion
define('APP_TITLE','MVC');/#/#

//copyright
define('APP_COPY','Copyright &copy'.date('Y',time() ).' SofTocnic');


 //URL BASE
define('APP_URL','http://localhost/MVC/');
*/


//estructura


require_once('../lib/conexion.php');
require_once('../lib/PHPExcel/PHPExcel.php');
require_once('../modelo/usuarioModelo.php');
require_once('../modelo/estadisticaModelo.php');
require_once('../modelo/cuentasCobrarModelo.php');
require_once('../modelo/cuentasPagarModelo.php');
require_once('../modelo/clienteModelo.php');
require_once('../modelo/creditosModelo.php');
require_once('../modelo/fiadorModelo.php');
require_once('../../vista/usuarioVista.php');
require_once('../../vista/cuentasCVista.php');
require_once('../../vista/cuentasPVista.php');
require_once('../../vista/creditosVista.php');
require_once('../../vista/creditosAnuladosVista.php');
require_once('../../vista/referenciasVista.php');
require_once('../../vista/fiadorVista.php');



?>