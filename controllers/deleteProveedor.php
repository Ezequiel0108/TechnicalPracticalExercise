<?php
session_start();
require_once 'proveedorController.php';
require_once '../dataBase/dataBase.php';
require_once '../models/proveedorModel.php';
require_once './validarFormServidor.php';

try {
    if(empty($_POST)) {
        $_SESSION['mensajeErrorDelete'] = 'No se ha seleccionado ninguno para eliminar';
        
        header('Location: ../index.php');
    }
    $bd=new dataBase("localhost","abcproveedores","root","");
    $idProveedor =$_POST['idProveedor'];
    validarIdProveedor($idProveedor,$bd);
    // Si llegamos aquí, el ID es válido y existe en la base de datos
    $db = new dataBase("localhost", "abcproveedores", "root", "");
    $controlador = new proveedorController($db);
    $provedor = new proveedorModel(intval($idProveedor), null, null, null, null, null, null);
    $controlador->bajaProveedor($provedor);
    $_SESSION['mensaje'] = 'Proveedor Eliminado correctamente';
    // Redireccionar a la vista de la tabla
    header('Location: ../index.php');
} catch (Exception $e) {
    // Manejar el error de alguna forma
    echo 'Error: ' . $e->getMessage();
}



?>