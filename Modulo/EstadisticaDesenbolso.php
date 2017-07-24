<?php


session_start();


if(isset($_SESSION['SOFT_USER']))
{
    include('configActivado.php');



    Desenbolso();



}
else
{

    header('location: ../');


}



?>
