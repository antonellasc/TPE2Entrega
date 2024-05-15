<?php

class Viaje{
    private $codigoViaje;
    private $destino;
    private $cantidadMax;
    private $arrayPasajeros;
    private $objResponsableV;

    // Constructor
    public function __construct($codigo_viaje, $destinoViaje, $cantMaximaPasajeros, $unResponsableV){
        $this->codigoViaje = $codigo_viaje;
        $this->destino = $destinoViaje;
        $this->cantidadMax = $cantMaximaPasajeros;
        $this->arrayPasajeros = [];
        $this->objResponsableV = $unResponsableV;
        
    }

    // Método de acceso : get
    public function getCodigoViaje(){
        return $this->codigoViaje;
    }

    public function getDestino(){
        return $this->destino;
    }

    public function getCantMaxPasajeros(){
        return $this->cantidadMax;
    }

    public function getPasajeros(){
        return $this->arrayPasajeros;
    }

    public function getResponsableV(){
        return $this->objResponsableV;
    }

    // Método de acceso : set
    public function setCodigoViaje($codigo_viaje){
        $this->codigoViaje = $codigo_viaje;
    }

    public function setDestino($destinoViaje){
        $this->destino = $destinoViaje;
    }

    public function setCantMaxPasajeros($cantMaximaPasajeros){
        $this->cantidadMax = $cantMaximaPasajeros;
    }

    public function setPasajeros($coleccionPasajeros){
        $this->arrayPasajeros = $coleccionPasajeros;
    }

    public function setResponsableV($unResponsableV){
        $this->objResponsableV = $unResponsableV;
    }

    // public function modificarNombrePasajero($nuevoNom){
    //     $this->setPasajeros($nuevoNom)["nombre"];
    // }

    // public function modificarApellidoPasajero($nuevoAp){
    //     $this->setPasajeros($nuevoAp)["apellido"];
    // }

    // public function modificarDocumento($nuevoDoc){
    //     $this->setPasajeros($nuevoDoc)["documento"];
    // }

    //
    public function __toString(){
        return "Código del viaje: " . $this->getCodigoViaje() . "\n" . "Destino del viaje: " . $this->getDestino() . "\n" . "Cantidad máxima de pasajeros: " . $this->getCantMaxPasajeros() . 
        "\n" . "Pasajeros/as: \n" . $this->mostrarColeccion($this->getPasajeros()) . "\n" . "Datos del responsable del viaje: \n" . $this->getResponsableV() . "\n";  
    }

    public function mostrarColeccion($unaColeccion){
        // Método para mostrar una colección
        $articulo_nro = 0;
        $unaCadena = "";
        for($i = 0; $i < count($unaColeccion); $i++){
            $articulo_nro++;
            $unArticulo = $unaColeccion[$i];
            $unaCadena = $unaCadena . $articulo_nro . ": \n" . $unArticulo . "\n";
        }
        return $unaCadena;
    }


}