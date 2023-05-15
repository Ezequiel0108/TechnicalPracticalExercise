<?php
require_once('../dataBase/dataBase.php');
$db = new dataBase("localhost","abcproveedores","root","");
function getById() {
    global $db;
    if (!isset($_POST['id'])) {
        echo json_encode(['error' => 'No se recibió el ID del proveedor']);
        return;
    }
    $id = $_POST['id'];
    $query = "SELECT * FROM proveedores WHERE id=$id";
    $pdo = $db->connect();
    $result = $pdo->query($query);
    if (!$result) {
        echo json_encode(['error' => 'No se encontró el proveedor']);
        return;
    }
    $proveedor = $result->fetch(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($proveedor);
}
if(isset($_POST['action'])){
    $action = $_POST['action'];
    switch($action){
        case 'getById':
            getById();
            break;
        default:
            echo json_encode(['error' => 'Acción no válida']);
            break;
    }
}
?>



