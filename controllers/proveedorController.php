<?php

class proveedorController {
    private $db;
    //instancia de base de datos
    public function __construct(dataBase $db)
    {
        $this->db=$db;
    }
    
    public function altaProveedor(proveedorModel $proveedor)
    {
      $nombre=$proveedor->getNombre(); 
      $rfc=$proveedor->getRfc();
      $domicilio=$proveedor->getDomicilio();
      $codigoPostal=$proveedor->getCodigoPostal();
      $ciudad=$proveedor->getCiudad();
      $estado=$proveedor->getEstado();
      $connectBd=$this->db->connect();
      $query=$connectBd->prepare("INSERT INTO proveedores (nombre,rfc,domicilio,codigoPostal,ciudad,estado) VALUES (:nombre,:rfc,:domicilio,:codigoPostal,:ciudad,:estado)");
      $query->bindParam(':nombre',$nombre);
      $query->bindParam(':rfc',$rfc);
      $query->bindParam(':domicilio',$domicilio);
      $query->bindParam(':codigoPostal',$codigoPostal);
      $query->bindParam(':ciudad',$ciudad);
      $query->bindParam(':estado',$estado);
      $query->execute();
    }
    public function bajaProveedor(proveedorModel $proveedor)
    {
        $id=$proveedor->getId();
        $connectBd=$this->db->connect();
        $query=$connectBd->prepare("DELETE FROM proveedores WHERE id=:id");
        $query->bindParam(':id',$id);
        $query->execute();
    }

    public function cambiosProveedor(proveedorModel $proveedor){
        $id=$proveedor->getId();
        $nombre=$proveedor->getNombre(); 
        $rfc=$proveedor->getRfc();
        $domicilio=$proveedor->getDomicilio();
        $codigoPostal=$proveedor->getCodigoPostal();
        $ciudad=$proveedor->getCiudad();
        $estado=$proveedor->getEstado();
        $connectBd=$this->db->connect();
        $query=$connectBd->prepare("UPDATE proveedores SET nombre=:nombre, rfc=:rfc,domicilio=:domicilio,codigoPostal=:codigoPostal,ciudad=:ciudad,estado=:estado WHERE id=:id");
        $query->bindParam(':id',$id);
        $query->bindParam(':nombre',$nombre);
        $query->bindParam(':rfc',$rfc);
        $query->bindParam(':domicilio',$domicilio);
        $query->bindParam(':codigoPostal',$codigoPostal);
        $query->bindParam(':ciudad',$ciudad);
        $query->bindParam(':estado',$estado);
        $query->execute();        
    }

    public function getAllProveedores()
    {
        $connectBd=$this->db->connect();
        $query=$connectBd->prepare("SELECT * FROM proveedores");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById()
    {
         // Agregar mensajes de depuración
    error_log("getById() iniciado");
    error_log("id = " . $_POST['id']);
        if (!isset($_POST['id'])) {
            echo json_encode(['error' => 'No se recibió el ID del proveedor']);
            return;
        }
        // Obtén el ID del proveedor de los datos POST
        $id = $_POST['id'];
    
        // Realiza la consulta SQL para obtener los datos del proveedor
        $connectBd = $this->db->connect();
        $query = $connectBd->prepare("SELECT * FROM proveedores WHERE id=:id");
        $query->bindParam(':id', $id);
        $query->execute();
        $proveedor = $query->fetch(PDO::FETCH_ASSOC);
        // Devuelve los datos del proveedor en formato JSON
        header('Content-Type: application/json');
        echo json_encode($proveedor);
    }
    

}


?>