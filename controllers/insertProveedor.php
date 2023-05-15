<?php
session_start();
require_once 'proveedorController.php';
require_once '../dataBase/dataBase.php';
require_once '../models/proveedorModel.php';
require_once './validarFormServidor.php';

try {

    if(empty($_POST)) {
        $_SESSION['mensajeErrorInsert'] = 'No se han recibido datos del formulario para insertar';
        
        header('Location: ../index.php');
    }
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
    // Si llegamos aquí, los datos son válidos, así que creamos el objeto proveedorModel y lo insertamos en la base de datos
    $bd=new dataBase("localhost","abcproveedores","root","");
    $controlador=new proveedorController($bd);
    $provedor = new proveedorModel(null, $nombre, $rfc, $domicilio, intval($codigoPostal), $ciudad, $estado);
    $controlador->altaProveedor($provedor);
    // Agregar mensaje a la sesión de PHP
    $_SESSION['mensaje'] = 'Proveedor agregado correctamente';
    // Redireccionar a la vista de la tabla
    header('Location: ../index.php');
} catch (Exception $e) {
    // Manejar la excepción
    echo 'Ha ocurrido un error: ' . $e->getMessage();
}
?>
    