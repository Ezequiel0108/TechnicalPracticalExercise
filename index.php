<?php
 // Iniciar sesión
 session_start();
require_once 'controllers/proveedorController.php';
require_once 'dataBase/dataBase.php';
require 'models/proveedorModel.php';
// Recuperar el mensaje de confirmación de la URL
$bd=new dataBase("localhost","abcproveedores","root","");
$controlador=new proveedorController($bd);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC proveedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
   
</head>
<body>
    <div class="container">
        <h1 class="text-center display-5 mb-3 text-primary fw-bold">ABC de Proveedores</h1>
        <div class="row card bg-light"> 
            <div class="col-12">
                <!--Botón activa modal -->
                <button type="button" class="btn btn-primary mt-2 " data-bs-toggle="modal" data-bs-target="#ModalForm">Agregar proveedor</button>
                <!--Modal-->
                <?php include 'views/modalCreate.php'; ?>
                <?php include 'views/modalEdit.php'; ?>
                <?php
                // Arreglo de mensajes
                $mensajes = [
                    'mensaje' ,
                    'mensajeError',
                    'mensajeErrorDelete',
                    'mensajeErrorInsert'
                ];
                // Ciclo para mostrar los mensajes
                foreach ($mensajes as $nombre) {
                    if (isset($_SESSION[$nombre])) {
                        $mensaje = $_SESSION[$nombre];
                        if ($nombre == "mensaje") {
                            echo '<div class="alert alert-success  mt-3" id="mensaje">' . $mensaje . '</div>';
                        } else {
                            echo '<div class="alert alert-danger  mt-3" id="mensaje">' . $mensaje . '</div>';
                        }
                        unset($_SESSION[$nombre]);
                    }
                }
                ?>
                <!-- Tabla proveedores-->
                <?php include 'views/tableProvedores.php' ?>
            </div>
        </div>
    </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script src="controllers/validarFormCliente.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="./solicitudAjax/solicitudAjax.js"></script>
   <script src="./sepomex/Api.js"></script>
 
</body>
</html>