    
    <?php
    if(isset($_GET['v'])){
        switch($_GET['v']){
            case 'Inicio':{
                require('Inicio.php');
                break;
            }
            case 'Usuarios':{
                require('Usuarios.php');
                break;
            }
            case 'Empleado':{
                require('Empleado.php');
                break;
            }
            case 'ACliente':{
                require('ACliente.php');
                break;
            }
            case 'Cuentas':{
                require('Cobrar.php');
                break;
            }
            case 'Cobrar':{
                require('Cuentas.php');
                break;
            }
            case 'Pagar':{
                require('Pagar.php');
                break;
            }
            case 'Credito':{
                require('Credito.php');
                break;
            }
            case 'GenerarCredito':{
                require('GenerarCredito.php');
                break;
            }
            case 'CreditoAnulado':{
                require('CreditoAnulado.php');
                break;
            }
            case 'Pagos':{
                require('Pagos.php');
                break;
            }
            case 'Sueldos':{
                require('Sueldos.php');
                break;
            }
            case 'Comisiones':{
                require('Comisiones.php');
                break;
            }
            case 'Gastos':{
                require('Gastos.php');
                break;
            }
            case 'ARuta':{
                require('ARuta.php');
                break;
            }
            case 'Deposito':{
                require('Deposito.php');
                break;
            }
            case 'Estadistica':{
                require('Estadistica.php');
                break;
            }
            case 'Otorgante':{
                require('Otorgante.php');
                break;
            }
            case 'Flujo':{
                require('Flujo.php');
                break;
            }
            case 'estadisticaCredito':{
                require('estadisticaCredito.php');
                break;
            }
            case 'EstadisticaClientes':{
                require('EstadisticaClientes.php');
                break;
            }
            case 'Autorizacion':{
                require('Autorizacion.php');
                break;
            }
            case 'NoAutorizados':{
                require('NoAutorizados.php');
                break;
            }
            case 'Ayuda':{
                require('Ayuda.php');
                break;
            }
            case 'Desembolso':{
                require('Desembolso.php');
                break;
            }
            default:{
                ?>
                    <script>
                        window.location.href="?Inicio";
                    </script>
                <?php
            }
        }
    }else if(isset($_GET['Inicio'])){
        require('Inicio.php');
    }else if(isset($_GET['Usuarios'])){
       require('Usuarios.php');
    }else if(isset($_GET['Empleado'])){
       require('Empleado.php');
    }else if(isset($_GET['ACliente'])){
       require('ACliente.php');
    }else if(isset($_GET['Cuentas'])){
       require('Cobrar.php');
    }else if(isset($_GET['Cobrar'])){
       require('Cuentas.php');
    }else if(isset($_GET['Pagar'])){
       require('Pagar.php');
    }else if(isset($_GET['Credito'])){
       require('Credito.php');
    }else if(isset($_GET['GenerarCredito'])){
       require('GenerarCredito.php');
    }else if(isset($_GET['CreditoAnulado'])){
       require('CreditoAnulado.php');
    }else if(isset($_GET['Pagos'])){
       require('Pagos.php');
    }else if(isset($_GET['Sueldos'])){
       require('Sueldos.php');
    }else if(isset($_GET['Comisiones'])){
       require('Comisiones.php');
    }else if(isset($_GET['Gastos'])){
       require('Gastos.php');
    }else if(isset($_GET['ARuta'])){
       require('ARuta.php');
    }else if(isset($_GET['Deposito'])){
       require('Deposito.php');
    }else if(isset($_GET['Estadistica'])){
       require('Estadistica.php');
    }else if(isset($_GET['Otorgante'])){
       require('Otorgante.php');
    }else if(isset($_GET['Flujo'])){
       require('Flujo.php');
    }else if(isset($_GET['estadisticaCredito'])){
       require('estadisticaCredito.php');
    }else if(isset($_GET['EstadisticaClientes'])){
       require('EstadisticaClientes.php');
    }else if(isset($_GET['Autorizacion'])){
       require('Autorizacion.php');
    }else if(isset($_GET['NoAutorizados'])){
       require('NoAutorizados.php');
    }else if(isset($_GET['Ayuda'])){
       require('Ayuda.php');
    }else if(isset($_GET['Desembolso'])){
       require('Desembolso.php');
    }else{?>
        <script>
    	    window.location.href="?Inicio";
         </script>
    <?php
    }
    ?>
    
    
