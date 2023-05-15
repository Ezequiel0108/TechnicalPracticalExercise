<?php

function validarProveedor($nombre, $rfc, $domicilio, $codigoPostal, $ciudad, $estado) {
    try {
        if (!preg_match('/^[A-Za-záéíóúüñÑ\s.,]{1,30}$/', $nombre)) {
            throw new Exception('Nombre debe contener solo letras, comas y puntos, hasta 30 caracteres');
        }

        if (!preg_match('/^[A-Za-z0-9]{1,20}$/', $rfc)) {
            throw new Exception('RFC debe contener solo letras y números, hasta 20 caracteres');
        }

        if (!preg_match('/^[A-Za-z0-9\s]{1,80}$/', $domicilio)) {
            throw new Exception('Domicilio debe contener solo letras, números y espacios en blanco, hasta 80 caracteres');
        }

        if (!preg_match('/^\d{5}$/', $codigoPostal)) {
            throw new Exception('Código Postal debe contener 5 dígitos');
        }

        if (!preg_match('/^[A-Za-záéíóúüñÑ]{1,20}$/', $ciudad)) {
            throw new Exception('Ciudad debe contener solo letras, hasta 20 caracteres');
        }

        if (!preg_match('/^[A-Za-záéíóúüñÑ]{1,20}$/', $estado)) {
            throw new Exception('Estado debe contener solo letras, hasta 20 caracteres');
        }
        //en caso que todo este correcto retornamos true indicando que esta correcto
        return true;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    } catch (Error $e) {
        // si surge algún otro error
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}

//validar id 
 function validarIdProveedor($idProveedor, $db) {
    if (!is_numeric($idProveedor)) { // verifica si es un número
        throw new Exception('El ID del proveedor debe ser un número.');
    }
    $connectBd = $db->connect();
    $query = $connectBd->prepare("SELECT COUNT(*) FROM proveedores WHERE id=:idProveedor");
    $query->bindParam(':idProveedor', $idProveedor);
    $query->execute();
    $numRows = $query->fetchColumn();
    if ($numRows == 0) { // verifica si existe el proveedor
        throw new Exception('El ID del proveedor no existe en la base de datos.');
    }
    return true; // si pasa todas las validaciones, retorna verdadero
}

?>



