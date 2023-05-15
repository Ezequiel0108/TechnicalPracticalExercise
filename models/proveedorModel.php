<?php

class proveedorModel{
    private $id;
    private $nombre;//sólo letras, comas y puntos)lím 30 caracteres.
    private $rfc;//solo letras y números lim 20 catact
    private $domicilio;//letras, números y espacios en blanco lim 80 cara
    private $codigoPostal;//ligar la captura de 5 dígitos.
    private $ciudad;//solo letras 20 caracte
    private $estado ;//solo letras 20 caracteres

    public function __construct($id, $nombre,$rfc,$domicilio,$codigoPostal,$ciudad,$estado)
    {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->rfc=$rfc;
        $this->domicilio=$domicilio;
        $this->codigoPostal=$codigoPostal;
        $this->ciudad=$ciudad;
        $this->estado=$estado;
    }

    //getters 
    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getRfc()
    {
        return $this->rfc;
    }
    public function getDomicilio()
    {
        return $this->domicilio;
    }
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }
    public function getCiudad()
    {
        return $this->ciudad;
    }
    public function getEstado()
    {
        return $this->estado;
    }


}

?>