  <?php


 function mostrarFiador($datos)
{

?>

<table id='tablaFia' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>CUI</th>
			<th>Telefono</th>
            <th>Estado</th>
            <th></th>


        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
    $sql = "SELECT c.idcliente,c.Nombre,c.apellido,c.nit,c.direccion,c.Telefono,c.foto FROM cliente c inner join fiadores f on f.idcliente=c.idcliente where c.fiador=1 and f.idcredito='".$datos[0]."' ";
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

                $tabla .="<td><img width='50' height='50' src='../app/imagenes/clientes"     .$fila["6"].    "'></td>";
                $tabla .="<td>" .$fila["1"]." " .$fila["2"].      "</td>";
                $tabla .="<td>" .$fila["4"].      "</td>";


				$tabla .="<td>" .$fila["3"].      "</td>";
                $tabla .="<td>" .$fila["3"].      "</td>";
                $tabla .="<td>" .$fila["3"].      "</td>";

       $tabla .="<td class='anchoC'><a class='waves-effect waves-light btn modal-close  green lighten-1 modal-trigger botonesm editar' onclick=\"seleccionar('".$fila["0"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/seleccion.png' /></i></a>";

        $tabla .="<a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm editar' onclick=\"editarCliente('".$fila["0"]."')\")\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/editar.png' /></i></a>";


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
