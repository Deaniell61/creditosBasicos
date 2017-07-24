  <?php


  function mostrarCreditos($datos)
  {
session_start();
$busca="";

	if($_SESSION['SOFT_ROL']!='1' && $_SESSION['SOFT_ROL']!='0')
	{
		$busca="and c.idusuario='".$_SESSION['SOFT_USER_ID']."'";
	}
      //creacion de la tabla
  ?>

  <table id='tabla' class='bordered centered highlight responsive-table centrarT'>
      <thead>
          <tr>
              <th>Fecha</th>
              <th>No. Comprobante</th>
              <th>Nit</th>
              <th>Cliente</th>
              <th>Total</th>
              <th>Tipo de Venta</th>
              <?php
			  if($_SESSION['SOFT_ROL']=='1' || $_SESSION['SOFT_ROL']=='0')
  				{
					?>
              <th>Vendedor</th>
              <?php } ?>
                <th></th>

          </tr>
      </thead>
      <tbody>
          <?php
  	$extra="";
      $mysql = conexionMysql();
       $sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombre,c.desembolso,c.idcreditos,(select u.user from usuarios u where u.idusuarios=c.idusuario) FROM creditos c inner join cliente p on p.idcliente=c.idcliente where c.estado=1 $busca group by c.idcreditos order by c.fecha desc";
      $tabla="";
      if($resultado = $mysql->query($sql))
      {

          if(mysqli_num_rows($resultado)==0)
          {
              $respuesta = "<div class='error'>No se han Realizados Creditos</div>";
          }

          else
          {
  			$contaId=0;

              while($fila = $resultado->fetch_row())
              {

                  $tabla .= "<tr>";

                  $tabla .="<td>"     .substr($fila["0"],0,10).    "</td>";
                  $tabla .="<td>" .$fila["1"].      "</td>";
                  $tabla .="<td>" .$fila["2"].      "</td>";
  				$tabla .="<td>" .$fila["3"].      "</td>";
  				$tabla .="<td>" .toMoney($fila["4"]).      "</td>";

  				$tabla .="<td>" .$fila["5"].      "</td>";
				if($_SESSION['SOFT_ROL']=='1' || $_SESSION['SOFT_ROL']=='0')
  				{
				$tabla .="<td>" .$fila["6"].      "</td>";
				}
				$tabla .="<td class='anchoC'>";
  				if($_SESSION['SOFT_ACCESOElimina'.'Creditos']=='1')
  				{
                  $tabla .="<a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm ' onClick=\"anularCredito('".$fila["6"]."');\"><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i></a>";
  				}



                  $tabla .="<a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm modalver'  onClick=\"verCredito('".$fila["6"]."');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a></td>";
                  $tabla .= "</tr>";
  				$contaId++;
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
function mostrarGarantia($datos)
  {

$busca="";
session_start();
	
      //creacion de la tabla
  ?>

  <table id='tablaGara' class='bordered centered highlight responsive-table centrarT'>
      <thead>
          <tr>
              <th>Descripcion</th>
              <th>Valoracion</th>              
                <th></th>

          </tr>
      </thead>
      <tbody>
          <?php
  	$extra="";
      $mysql = conexionMysql();
       $sql = "SELECT descripcion,valoracion,idgarantia FROM garantia where idcredito='".$datos[0]."' ";
      $tabla="";
      if($resultado = $mysql->query($sql))
      {

          if(mysqli_num_rows($resultado)==0)
          {
              $respuesta = "<div class='error'>Ingrese Referencias</div>";
          }

          else
          {
  			$contaId=0;

              while($fila = $resultado->fetch_row())
              {

                  $tabla .= "<tr>";

                  $tabla .="<td>"     .$fila["0"]." ".$fila["1"].    "</td>";
                  $tabla .="<td>" .$fila["1"].      "</td>";
  				
				$tabla .="<td class='anchoC'>";
  				if($_SESSION['SOFT_ACCESOElimina'.'Creditos']=='1')
  				{
                  $tabla .="<a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm ' onClick=\"anularCredito('".$fila["2"]."');\"><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i></a>";
  				}



                  $tabla .="<a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm modalver'  onClick=\"verCredito('".$fila["2"]."');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a></td>";
                  $tabla .= "</tr>";
  				$contaId++;
              }

              $resultado->free();//librerar variable


              $respuesta = $tabla;
          }
      }
      else
      {
          $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD$sql</div>";

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

  function mostrarVentasPorFecha($datos)
  {
session_start();

$busca="";

	if($_SESSION['SOFT_ROL']!='1' && $_SESSION['SOFT_ROL']!='0')
	{
		$busca="and c.idusuario='".$_SESSION['SOFT_USER_ID']."'";
	}
      //creacion de la tabla
  ?>

  <table id='tabla' class='bordered centered highlight responsive-table centrarT'>
      <thead>
          <tr>
              <th>Fecha</th>
              <th>No. Comprobante</th>
              <th>Nit</th>
              <th>Cliente</th>
              <th>Total</th>
              <th>Tipo de Venta</th>
              <?php
			  if($_SESSION['SOFT_ROL']=='1' || $_SESSION['SOFT_ROL']=='0')
  				{
					?>
              <th>Vendedor</th>
              <?php } ?>
                <th></th>

          </tr>
      </thead>
      <tbody>
          <?php
  	$extra="";
      $mysql = conexionMysql();
       $sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombre,c.total,(select tv.Descripcion from tipoventa tv where tv.idtipo=c.tipoventa),c.idventas,(select u.user from usuarios u where u.idusuarios=c.idusuario) FROM ventas c inner join cliente p on p.idcliente=c.idcliente inner join ventasdetalle cd on cd.idventa=c.idventas inner join productos pd on pd.idproductos=cd.idproductos where (c.fecha<='".$datos[2]."' and c.fecha>='".$datos[1]."') and c.estado=1 and cd.estado=1 and pd.tiporepuesto='".$datos[0]."' $busca group by c.idventas order by c.fecha desc";
      $tabla="";
      if($resultado = $mysql->query($sql))
      {

          if(mysqli_num_rows($resultado)==0)
          {
              $respuesta = "<div class='error'>No hay Compras BD vacia</div>";
          }

          else
          {
  			$contaId=0;

              while($fila = $resultado->fetch_row())
              {

                  $tabla .= "<tr>";

                  $tabla .="<td>"     .substr($fila["0"],0,10).    "</td>";
                  $tabla .="<td>" .$fila["1"].      "</td>";
                  $tabla .="<td>" .$fila["2"].      "</td>";
  				$tabla .="<td>" .$fila["3"].      "</td>";
  				$tabla .="<td>" .toMoney($fila["4"]).      "</td>";

  				$tabla .="<td>" .$fila["5"].      "</td>";
				if($_SESSION['SOFT_ROL']=='1' || $_SESSION['SOFT_ROL']=='0')
  				{
				$tabla .="<td>" .$fila["7"].      "</td>";
				}
				$tabla .="<td class='anchoC'>";




                  $tabla .="</td>";
                  $tabla .= "</tr>";
  				$contaId++;
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

function Requisitos()
{
    $mysql = conexionMysql();
    $sql = "SELECT descripcion,idrequisitos FROM requisitos where estado=1";
	$tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta="<option value=\"\">Vacio</option>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

               

                $tabla .="<option value=\"".$fila["1"]."\">".$fila["0"]."</option>";
                
				
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
   
    <?php
}
  ?>
