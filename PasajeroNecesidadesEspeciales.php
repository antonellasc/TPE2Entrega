<?php

class PasajeroNecesidadesEspeciales extends Pasajero{
    private $sillaRuedasReq;
    private $asistenciaEmbarqueReq;
    private $comidaEspecialReq;

    // Constructor
    public function __construct($nombre, $apellido, $nro_docu, $nro_tel, $nro_asiento, $nro_ticket_pasaje, $silla_ruedas_req, $asist_embarque_req, $comida_especial_req){
        parent :: __construct($nombre, $apellido, $nro_docu, $nro_tel, $nro_asiento, $nro_ticket_pasaje);
        $this->sillaRuedasReq = $silla_ruedas_req;
        $this->asistenciaEmbarqueReq = $asist_embarque_req;
        $this->comidaEspecialReq = $comida_especial_req;
    }

    // Método de acceso : get
    public function getSillaRuedasReq(){
        return $this->sillaRuedasReq;
    }

    public function getAsistEmbarqueReq(){
        return $this->asistenciaEmbarqueReq;
    }

    public function getComidaEspecialReq(){
        return $this->comidaEspecialReq;
    }

    // Método de acceso : set
    public function setSillaRuedasReq($silla_ruedas_req){
        $this->sillaRuedasReq = $silla_ruedas_req;
    }

    public function setAsistEmbarqueReq($asist_embarque_req){
        $this->asistenciaEmbarqueReq = $asist_embarque_req;
    }

    public function setComidaEspecialReq($comida_especial_req){
        $this->comidaEspecialReq = $comida_especial_req;
    }

    // Método __toString
    public function __toString(){
        return parent :: __toString() . "¿Necesita silla de ruedas?: " . $this->evaluarBooleano($this->getSillaRuedasReq()) . "\n" . "¿Necesita asistencia en el embarque/desembarque?: " . 
        $this->evaluarBooleano($this->getAsistEmbarqueReq()) . "\n" . "¿Necesita comida especial?: " . $this->evaluarBooleano($this->getComidaEspecialReq()) . "\n";
    }

    // Otros métodos
    public function evaluarBooleano($unBool){
        $respuesta = "";
        if($unBool == true){
            $respuesta = "si";
        } else{
            $respuesta = "no";
        }
        return $respuesta;
    }

    public function darPorcentajeIncremento(){
        // Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia
        // y comida especial entonces el pasaje tiene un incremento del 30%; 
        // si solo requiere uno de los servicios prestados entonces el incremento es del 15%.
        $porcentaje = 0;
        $contadorNecesidades = 0;
        $i = 0;
        while($i < 1){
            if($this->getSillaRuedasReq() == true){
                $contadorNecesidades++;
            }
            if($this->getAsistEmbarqueReq() == true){
                $contadorNecesidades++;
            }
            if($this->getComidaEspecialReq() == true){
                $contadorNecesidades++;
            }
            $i++;
        }

        if($contadorNecesidades == 1){
            $porcentaje = 0.15;
        }elseif($contadorNecesidades == 2){
            $porcentaje = 0.15;
        }else{
            $porcentaje = 0.30;
        }
        return $porcentaje;

    }
}