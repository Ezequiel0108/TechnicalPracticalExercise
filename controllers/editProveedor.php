<?php

session_start();
require_once 'proveedorController.php';
require_once '../dataBase/dataBase.php';
require_once '../models/proveedorModel.php';
require_once './validarFormServidor.php';

try {
    if(empty($_POST)) {
        $_SESSION['mensajeError'] = 'No se han recibido datos del formulario';
        
        header('Location: ../index.php');
    }
    
    $id=intval($_POST['idProveedor']);
    $nombre = $_POST['nombre'];
    $rfc = $_POST['rfc'];
    $domicilio = $_POST['domicilio'];
    $codigoPostal = $_POST['codigoPostal'];
    $ciudad = $_POST['ciudad'];
    $estado = $_POST['estado'];

    // Validar los campos del proveedor
    if (!validarProveedor($nombre, $rfc, $domicilio, $codigoPostal, $ciudad, $estado)) {
        // Si la validación falla, mostrar un mensaje de error y detener la ejecución
        return;
    }
    // Si llegamos aquí, los datos son válidos, pero por ultimo verificaremos que el id sea valido
    $bd=new dataBase("localhost","abcproveedores","root","");
    $controlador=new proveedorController($bd);
    validarIdProveedor($id,$bd);
    $provedor = new proveedorModel($id, $nombre, $rfc, $domicilio, intval($codigoPostal), $ciudad, $estado);
    $controlador->cambiosProveedor($provedor);
    // Agregar mensaje a la sesión de PHP
    $_SESSION['mensaje'] = 'Proveedor Editado correctamente';
    // Redireccionar a la vista de la tabla
    header('Location: ../index.php');
} catch (Exception $e) {
    // Manejar la excepción
    echo 'Ha ocurrido un error: ' . $e->getMessage();
}

?>


