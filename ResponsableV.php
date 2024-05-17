<?php

class ResponsableV{
    private $nroEmpleado;
    private $nroLicencia;
    private $nombre;
    private $apellido;

    // Constructor
    public function __construct($nro_Empleado, $nro_Licencia, $nombre_responsable, $apellido_responsable){
        $this->nroEmpleado = $nro_Empleado;
        $this->nroLicencia = $nro_Licencia;
        $this->nombre = $nombre_responsable;
        $this->apellido = $apellido_responsable;
    }

    // Método de acceso: get
    public function getNroEmpleado(){
        return $this->nroEmpleado;
    }

    public function getNroLicencia(){
        return $this->nroLicencia;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    // Método de acceso : set
    public function setNroEmpleado($nro_Empleado){
        $this->nroEmpleado = $nro_Empleado;
    }

    public function setNroLicencia($nro_Licencia){
        $this->nroLicencia = $nro_Licencia;
    }

    public function setNombreResponsable($nombre_responsable){
        $this->nombre = $nombre_responsable;
    }

    public function setApellidoResponsable($apellido_responsable){
        $this->apellido = $apellido_responsable;
    }

    // Función __toString
    public function __toString(){
        $cadenaResp = "Nombre responsable del viaje: " . $this->getNombre() . "\n" . 
                "Apellido responsable del viaje: " . $this->getApellido() . "\n" . 
                "Número de empleado: " . $this->getNroEmpleado() . "\n" . 
                "Número licencia: " . $this->getNroLicencia() . "\n";
                return $cadenaResp;
    }


}