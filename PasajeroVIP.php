<?php

class PasajeroVIP extends Pasajero{
    private $nroViajeroFrecuente;
    private $cantMillasPasajero;

    // Constructor
    public function __construct($nombre, $apellido, $nro_docu, $nro_tel, $nro_asiento, $nro_ticket_pasaje, $nroViajero_Frecuente, $cantMillas_Pasajero){
        parent :: __construct($nombre, $apellido, $nro_docu, $nro_tel, $nro_asiento, $nro_ticket_pasaje);
        $this->nroViajeroFrecuente = $nroViajero_Frecuente;
        $this->cantMillasPasajero = $cantMillas_Pasajero;
    }

    // Método de acceso : get
    public function getNroViajeroFrec(){
        return $this->nroViajeroFrecuente;
    }

    public function getCantMillasPasajero(){
        return $this->cantMillasPasajero;
    }

    // Método de acceso : set
    public function setNroViajeroFrec($nroViajero_Frecuente){
        $this->nroViajeroFrecuente = $nroViajero_Frecuente;
    }

    public function setCantMillasPasajero($cantMillas_Pasajero){
        $this->cantMillasPasajero = $cantMillas_Pasajero;
    }

    // Método __toString
    public function __toString(){
        return parent :: __toString() . "Número de viajero/a frecuente: " . $this->getNroViajeroFrec() . "\n" . "Cantidad de millas: " . $this->getCantMillasPasajero() . "\n";
    }

    // Otros métodos
}