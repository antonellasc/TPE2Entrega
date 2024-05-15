<?php

class Pasajero{
    private $name;
    private $surname;
    private $numDocumento;
    private $numTelefono;
    private $nroAsiento;
    private $nroTicketPasaje;

    // Constructor
    public function __construct($nombre, $apellido, $nro_docu, $nro_tel, $nro_asiento, $nro_ticket_pasaje){
        $this->name = $nombre;
        $this->surname = $apellido;
        $this->numDocumento = $nro_docu;
        $this->numTelefono = $nro_tel;
        $this->nroAsiento = $nro_asiento;
        $this->nroTicketPasaje = $nro_ticket_pasaje;
    }

    // Acceso : get
    public function getNombre(){
        return $this->name;
    }

    public function getApellido(){
        return $this->surname;
    }

    public function getNroDocu(){
        return $this->numDocumento;
    }

    public function getNroTelefono(){
        return $this->numTelefono;
    }

    public function getNroAsiento(){
        return $this->nroAsiento;
    }

    public function getNroTicketPasaje(){
        return $this->nroTicketPasaje;
    }

    // Acceso : set
    public function setNombre($nombre){
        $this->name = $nombre;
    }

    public function setApellido($apellido){
        $this->surname = $apellido;
    }

    public function setNroDocu($nro_docu){
        $this->numDocumento = $nro_docu;
    }

    public function setNroTelefono($nro_tel){
        $this->numTelefono = $nro_tel;
    }

    public function setNroAsiento($nro_asiento){
        $this->nroAsiento = $nro_asiento;
    }

    public function setNroTicketPasaje($nro_ticket_pasaje){
        $this->nroTicketPasaje = $nro_ticket_pasaje;
    }

    public function __toString(){
        return "Nombre: " . $this->getNombre() . "\n" . "Apellido: " . $this->getApellido() . "\n" . "Número de documento: " . $this->getNroDocu() . "\n" . "Número de teléfono: " . $this->getNroTelefono() .
        "\n" . "Número de asiento: " . $this->getNroAsiento() . "\n" . "Número de ticket del pasaje: " . $this->getNroTicketPasaje() . "\n";
    }

    // Otros métodos
    public function darPorcentajeIncremento(){
        $porcentaje = 0.10;
        return $porcentaje;
    }

}