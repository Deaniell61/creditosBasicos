<?php


function mostrarAutorizacion()
{

?>

<table id='tablaAut' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>No. comprobante</th>
            <th>CUI</th>
            <th>Nombre</th>
			<th>Monto</th>
            <th>Cuota</th>
            <th>Otorgante</th>
            <th></th>

        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
    $sql = "SELECT cr.idcreditos,cr.fecha,cr.noComprobante,c.cui,c.nombre,c.apellido,cr.montoCredito,cr.cuota,(select u.user from usuarios u where u.idUsuarios=cr.idUsuario) FROM creditos cr inner join cliente c on c.idCliente=cr.idCliente where cr.estado=2 ";
    $tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay Compras BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

                $tabla .= "<tr>";

                $tabla .="<td>"     .$fila["1"].    "</td>";
                $tabla .="<td>" .$fila["2"]."</td>";
                $tabla .="<td>" .$fila["3"].      "</td>";


				$tabla .="<td>" .$fila["4"]." " .$fila["5"]."</td>";
                $tabla .="<td>" .toMoney($fila["6"]).      "</td>";
                $tabla .="<td>" .toMoney($fila["7"]).      "</td>";
                $tabla .="<td>" .$fila["8"].      "</td>";

       $tabla .="<td class='anchoC'><a class='waves-effect waves-light btn modal-close  green lighten-1 modal-trigger botonesm editar' onclick=\"autorizar('".$fila["0"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/autorizar.png' /></i></a>";

        $tabla .="<a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm modalver' onclick=\"verCredito('".$fila["0"]."');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a>";


                $tabla .= "</td></tr>";

            }

            $resultado->free();//librerar variable


            $respuesta = $tabla;
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

    }

    //cierro la conexion
    $mysql->close();

    //debuelvo la variable resultado
    return printf($respuesta);
        ?>
    </tbody>
</table>
<?php

}


?>
