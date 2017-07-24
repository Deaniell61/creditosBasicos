  <?php


  function mostrarReferencias($datos)
  {
session_start();
$busca="";

	
      //creacion de la tabla
  ?>

  <table id='tablaRef' class='bordered centered highlight responsive-table centrarT'>
      <thead>
          <tr>
              <th>Nombre</th>
              <th>Telefono</th>
              <th>Direccion</th>
              
                <th></th>

          </tr>
      </thead>
      <tbody>
          <?php
  	$extra="";
      $mysql = conexionMysql();
       $sql = "SELECT r.nombre,r.apellido,r.telefono,r.direccion,rc.idReferenciaCliente FROM referenciaCliente rc inner join referencia r on r.idReferencia=rc.idReferencia where rc.idcliente='".$datos[0]."' ";
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
                  $tabla .="<td>" .$fila["2"].      "</td>";
                  $tabla .="<td>" .$fila["3"].      "</td>";
  				
				$tabla .="<td class='anchoC'>";
  				if($_SESSION['SOFT_ACCESOElimina'.'Creditos']=='1')
  				{
                  $tabla .="<a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm ' onClick=\"anularCredito('".$fila["4"]."');\"><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i></a>";
  				}



                  $tabla .="<a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm modalver'  onClick=\"buscarCredito('".$fila["4"]."');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a></td>";
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
  

  
  ?>
