<?php

class Viaje{
    private $codigoViaje;
    private $destino;
    private $cantidadMax;
    private $arrayPasajeros;
    private $objResponsableV;
    private $costoViaje;
    private $abonadoPorPasajeros;

    // Constructor
    public function __construct($codigo_viaje, $destinoViaje, $cantMaximaPasajeros, $unResponsableV, $costo_Viaje, $costoAbonadoXPasajeros){
        $this->codigoViaje = $codigo_viaje;
        $this->destino = $destinoViaje;
        $this->cantidadMax = $cantMaximaPasajeros;
        $this->arrayPasajeros = [];
        $this->objResponsableV = $unResponsableV;
        $this->costoViaje = $costo_Viaje;
        $this->abonadoPorPasajeros = $costoAbonadoXPasajeros;
        
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

    public function getCostoViaje(){
        return $this->costoViaje;
    }

    public function getCostoAbonadoXPasajeros(){
        return $this->abonadoPorPasajeros;
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

    public function setCostoViaje($costo_Viaje){
        $this->costoViaje = $costo_Viaje;
    }

    public function setAbonadoXPasajeros($costoAbonadoXPasajeros){
        $this->abonadoPorPasajeros = $costoAbonadoXPasajeros;
    }

    // Método __toString
    public function __toString(){
        return "Código del viaje: " . $this->getCodigoViaje() . "\n" . "Destino del viaje: " . $this->getDestino() . "\n" . "Cantidad máxima de pasajeros: " . $this->getCantMaxPasajeros() . 
        "\n" . "Pasajeros/as: \n" . $this->mostrarColeccion($this->getPasajeros()) . "\n" . "Datos del responsable del viaje: \n" . $this->getResponsableV() . "\n" . 
        "Costo del viaje: " . $this->getCostoViaje() . "\n" . "Costo abonado por pasajeros: " . $this->getCostoAbonadoXPasajeros() . "\n";  
    }

    // Otros métodos
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

    // 
    public function venderPasaje($objPasajero){
        // implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros
        // (solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.
        
    }

    // Funciones utilizadas en las del menú
    public function buscarPasajero($documento){
        // Busca, por medio del nro de documento, si el pasajero ya existe en la colección. Retorna un indice que nos indicará la posición en la que el pasajero se encuentra dentro
        // de la colección, devolviendo un -1 si el pasajero no está cargado. -- Función utilizada en pasajeroCargado()
        $arrayPasajeros = $this->getPasajeros();
        $encontrado = false;
        $i = 0;
        while($i < count($this->getPasajeros()) && !$encontrado){
            $unPasajero = $arrayPasajeros[$i];
            if($unPasajero->getNroDocu() === $documento){
                $encontrado = true;
            }else{
                $i++;
            }
        }
        if(!$encontrado){
            $i = -1;
        }
        return $i;
    }

    public function pasajeroCargado($documento){
        // Retorna un booleano que indica si el pasajero está cargado (true) o no (false) -- Función utilizada en cargarPasajero()
        if($this->buscarPasajero($documento) != -1){
            $pasajeroExiste = true;
        }else{
            $pasajeroExiste = false;
        }
        return $pasajeroExiste;
    }

    // Funciones que componen el menú 

    // Menu principal
    public function mostrarMenu(){
        echo " ______________________________________________________\n";
        echo "|             -- Menú principal --                     \n|";
        echo "| 1) Mostrar información del viaje.                    \n|";
        echo "| 2) Cargar información del viaje.                     |\n";
        echo "| 3) Modificar los datos del viaje.                    |\n";
        echo "| 4) Modificar los datos de un pasajero.               |\n";
        echo "| 5) Modificar los datos del responsable del viaje.    |\n";
        echo "| 6) Salir.                                            |\n";
        echo "|                                                      |\n";
        echo "|                                                      |\n";
        echo " ______________________________________________________\n";
        $opcion = trim(fgets(STDIN));

        return $opcion;   
    }

    //

    // Menú cargar información
    public function cargarInformacionViaje(){
        echo " ______________________________________________________\n";
        echo "|      -- Cargando información del viaje... --         |\n";
        echo " ______________________________________________________\n";
        echo "| Ingrese el código del viaje:                         |\n";
        echo "| Ingrese el destino del viaje:                        |\n";
        echo "| Ingrese la cantidad máxima de pasajeros/as:          |\n";
        $nuevoCodigoViaje = trim(fgets(STDIN));
        $nuevoDestino = trim(fgets(STDIN));
        $nuevaCantMax = trim(fgets(STDIN));
        $colecPasajeros = cargarPasajeros();
        $objResponsable = cargarResponsable();
        $this->setCodigoViaje($nuevoCodigoViaje);
        $this->setDestino($nuevoDestino);
        $this->setCantMaxPasajeros($nuevaCantMax);
        $this->setPasajeros($colecPasajeros);
        $this->setResponsableV($objResponsable);
        echo "La información se ha cargado con éxito!" . "\n";
    }

    // Cargar información del responsable del viaje
    public function cargarResponsable(){
        echo "Ingrese el número de empleado: \n";
        $nroEmpleado = trim(fgets(STDIN));
        echo "Ingrese el número de licencia: \n";
        $nroLicencia = trim(fgets(STDIN));
        echo "Ingrese el nombre del responsable: \n";
        $nombreEmpleado = trim(fgets(STDIN));
        echo "Ingrese el apellido del responsable: \n";
        $apellidoEmpleado = trim(fgets(STDIN));
        $objResponsable = new ResponsableV($nroEmpleado, $nroLicencia, $nombreEmpleado, $apellidoEmpleado);
    
        return $objResponsable;
    }

    // Utilizada en la opción del menú que carga la información del viaje, retorna el arreglo con los pasajeros cargados
    public function cargarPasajeros(){
        $pasajeros = [];
        $ingreso = "si";
        $cantPasajeros= 0;
        while($ingreso == "si" && $cantPasajeros <= $this->getCantMaxPasajeros()){
            echo "Informacion del pasajero\n";
            echo "Ingrese el nombre del pasajero:\n";
            $nombrePasajero = trim(fgets(STDIN));
            echo "Ingrese el apellido del pasajero:\n";
            $apellidoPasajero = trim(fgets(STDIN));
            echo "Ingrese el dni del pasajero:\n";
            $dniPasajero = trim(fgets(STDIN));
            echo "Ingrese el número de teléfono del pasajero:\n";
            $telefonoPasajero = trim(fgets(STDIN));

            $nuevoPasajero = new Pasajero($nombrePasajero, $apellidoPasajero, $dniPasajero, $telefonoPasajero);
            $cargado = $this->pasajeroCargado($dniPasajero);
                if($cargado){
                    echo "\n" .
                    "No se pudo cargar el pasajero porque ya está registrado. \n";
                }else{
                    $pasajeros[] = $nuevoPasajero;
                    $this->setPasajeros($pasajeros);
                    $cantPasajeros++;
                }
                echo "\n¿Desea ingresar otro pasajero? (si/no): ";
                $ingreso = strtolower(trim(fgets(STDIN)));
            }
                if(count($this->getPasajeros()) == $this->getCantMaxPasajeros()){
                echo "Se llegó a la capacidad máxima de pasajeros. \n";
            }
            return $pasajeros;

        }

        // 
        public function opcionesModificarDatosViaje(){
                echo " ______________________________________________________\n";
                echo "|  --¿Qué información del viaje desea modificar?--     |\n";
                echo "| 1) Código.                                           |\n";
                echo "| 2) Destino.                                          |\n";
                echo "| 3) Cant. máxima de pasajeros.                        |\n";
                echo "| 4) Todos los datos.                                  |\n";
                echo " ______________________________________________________\n";
                $opcionMenuViaje = trim(fgets(STDIN));
                return $opcionMenuViaje;
            }

        //
        public function modificarInfoViaje($opcionMenuViaje){
            switch($opcionMenuViaje){
                case 1:
                    echo "El código actual del viaje es: " . $this->getCodigoViaje() . "\n";
                    echo "Se cambiará a: \n";
                    $nuevoCodigoViaje = trim(fgets(STDIN));
                    $this->setCodigoViaje($nuevoCodigoViaje);
                    echo "La información ha sido actualizada con éxito! El código actual es: " . $this->getCodigoViaje();
                    break;
                case 2:
                    echo "El destino actual del viaje es: " . $this->getDestino() . "\n";
                    echo "Se cambiará a: \n";
                    $nuevoDestino = trim(fgets(STDIN));
                    $this->setDestino($nuevoDestino);
                    echo "La información ha sido actualizada con éxito! El destino actual es: " . $this->getDestino();
                    break;
                case 3:
                    echo "La cant. máxima actual de pasajeros del viaje es: " . $this->getCantMaxPasajeros() . "\n";
                    echo "Se cambiará a: \n";
                    $nuevaCantMax = trim(fgets(STDIN));
                    $this->setCantMaxPasajeros($nuevaCantMax);
                    echo "La información ha sido actualizada con éxito! La cant. máxima actual es: " . $this->getCantMaxPasajeros();
                    break;
                case 4:
                    echo "El código actual del viaje es: " . $this->getCodigoViaje() . "\n";
                    echo "Se cambiará a: \n";
                    $nuevoCodigoViaje = trim(fgets(STDIN));
                    echo "El destino actual del viaje es: " . $this->getDestino() . "\n";
                    echo "Se cambiará a: \n";
                    $nuevoDestino = trim(fgets(STDIN));
                    echo "La cantidad máxima de pasajeros es: " . $this->getCantMaxPasajeros() . "\n";
                    echo "Se cambiará a: \n";
                    $nuevaCantMax = trim(fgets(STDIN));
                    $this->setCodigoViaje($nuevoCodigoViaje);
                    $this->setDestino($nuevoDestino);
                    $this->setCantMaxPasajeros($nuevaCantMax);
                    echo "La información del viaje ha sido actualizada correctamente. \n";
                    break;
                }
            
        }

        // Datos del pasajero
        public function opcionesModificarPasajero(){
            echo " ______________________________________________________\n";
            echo "|  --¿Qué información del pasajero desea modificar?--  |\n";
            echo "| 1) Nombre.                                           |\n";
            echo "| 2) Apellido.                                         |\n";
            echo "| 3) Teléfono.                                         |\n";
            echo "| 4) Todos los datos.                                  |\n";
            echo " ______________________________________________________\n";
            $opcionMenuPasaj = trim(fgets(STDIN));
            return $opcionMenuPasaj;
        }

        //
        public function modificarInfoPasajeros(){
            $pasajeros = $this->getPasajeros();
            echo "En el viaje hay ". count($this->getPasajeros())." pasajeros\n";
            echo $this->mostrarColeccion($this->getPasajeros());
            echo "Ingrese el dni del pasajero al que quiere modificar su información:\n";
            $dniPasajero = trim(fgets(STDIN));
            $aPasajero = $this->buscarPasajero($dniPasajero);
            if($aPasajero != -1){
                $unPasajero = $pasajeros[$aPasajero];
                $opcMenuPasaj= $this->opcionesModificarPasajero();
                switch($opcMenuPasaj()){
                    // el parametro del switch debería ser una opción del menú principal
                    case 1:
                        echo $unPasajero->getNombre() . " es el nombre actual \n";
                        echo "Se cambiara a: ";
                        $nuevoNombre = trim(fgets(STDIN));
                        $unPasajero->setNombre($nuevoNombre);
                        echo "Se cambio correctamente a " . $unPasajero->getNombre() . "\n";
                    break;
                    case 2:
                        echo $unPasajero->getApellido() . " es el apellido actual \n";
                        echo "Se cambiara a: ";
                        $nuevoApellido = trim(fgets(STDIN));
                        $unPasajero->setApellido($nuevoApellido);
                        echo "Se cambio correctamente a " . $unPasajero->getApellido() . "\n";
                    break;
                    case 3:
                        echo $unPasajero->getTelefono() . " es el telefono actual \n";
                        echo "Se cambiara a: ";
                        $nuevoTelefono = trim(fgets(STDIN));
                        $unPasajero->setTelefono($nuevoTelefono);
                        echo "Se cambio correctamente a " . $unPasajero->getTelefono() . "\n";
                    break;
                    case 4:
                        echo $unPasajero->getNombre() . " es el nombre actual \n";
                        echo "Se cambiara a: ";
                        $nuevoNombre = trim(fgets(STDIN));
                        echo $unPasajero->getApellido() . " es el apellido actual \n";
                        echo "Se cambiara a: ";
                        $nuevoApellido = trim(fgets(STDIN));
                        echo $unPasajero->getTelefono() . " es el telefono actual \n";
                        echo "Se cambiara a: ";
                        $nuevoTelefono = trim(fgets(STDIN));
                        $unPasajero->modificarPasajero($nuevoNombre,$nuevoApellido,$nuevoTelefono);
                        echo "\nSe cambiaron correctamente los datos!! \n";
                    break;
                    default:
                        echo "OPCION INVÁLIDA (Ingrese opcion del 1 al 4) \n";
                    break;
                }
            }else{
            echo "No existe un pasajero con ese número de documento. \n";
            }      
        }

        //
        public function opcionesModificarResponsable(){
            echo " ______________________________________________________\n";
            echo "| --¿Qué información del responsable desea modificar?--|\n";
            echo "| 1) Número de empleado.                               |\n";
            echo "| 2) Número de licencia.                               |\n";
            echo "| 3) Nombre.                                           |\n";
            echo "| 4) Apellido.                                         |\n";
            echo "| 5) Todos los datos.                                  |\n";
            echo " ______________________________________________________\n";
            $opcionMenuResp = trim(fgets(STDIN));
            return $opcionMenuResp;
        }

        public function modificarInfoResponsable($opcModificarResponsable){
            $responsable = $this->getResponsableV();
            switch($opcModificarResponsable()){
                // Aca tambien iria una opcion del menú principal
                case 1:
                    echo $responsable->getNroEmpleado() . " es el numero de empleado \n";
                    echo "Se cambiara a: ";
                    $nuevoNumEmpleado = trim(fgets(STDIN));
                    $responsable->setNroEmpleado($nuevoNumEmpleado);
                    echo "Se cambio correctamente a " . $responsable->getNroEmpleado() . "\n";
                break;
                case 2:
                    echo $responsable->getNroLicencia() . " es el número de licencia \n";
                    echo "Se cambiara a: ";
                    $nuevoNroLicencia = trim(fgets(STDIN));
                    $responsable->setNroLicencia($nuevoNroLicencia);
                    echo "Se cambio correctamente a " . $responsable->getNroLicencia() . "\n";
                break;
                case 3:
                    echo $responsable->getNombre() . " es el nombre \n";
                    echo "Se cambiara a: ";
                    $nuevoNombreEmpleado = trim(fgets(STDIN));
                    $responsable->setNombreResponsable($nuevoNombreEmpleado);
                    echo "Se cambio correctamente a " . $responsable->getNombre() . "\n";
                break;
                case 4:
                    echo $responsable->getApellido() . " es el apellido \n";
                    echo "Se cambiara a: ";
                    $nuevoApellidoEmpleado = trim(fgets(STDIN));
                    $responsable->setApellidoResponsable($nuevoApellidoEmpleado);
                    echo "Se cambio correctamente a " . $responsable->getApellido() . "\n";
                break;
                case 5:
                    echo $responsable->getNroEmpleado() . " es el numero de empleado \n";
                    echo "Se cambiara a: ";
                    $nuevoNumEmpleado = trim(fgets(STDIN));
                    echo $responsable->getNroLicencia() . " es el número de licencia \n";
                    echo "Se cambiara a: ";
                    $nuevoNroLicencia = trim(fgets(STDIN));
                    echo $responsable->getNombre() . " es el nombre \n";
                    echo "Se cambiara a: ";
                    $nuevoNombre = trim(fgets(STDIN));
                    echo $responsable->getApellido() . " es el apellido \n";
                    echo "Se cambiara a: ";
                    $nuevoApellido = trim(fgets(STDIN));
                    $this->modificarResponsableV($nuevoNumEmpleado, $nuevoNroLicencia, $nuevoNombre, $nuevoApellido);
                    echo "Se cambiaron correctamente los datos \n";
                break;
                default:
                    echo "OPCION INVÁLIDA (Ingrese opcion del 1 al 5) \n";
                break;
            }
        }

        //
        public function modificarResponsableV($nroEmpleado, $nroLicencia, $nombreEmpleado, $apellidoEmpleado){
            $responsable = $this->getResponsableV();
            $responsable->setNroEmpleado($nroEmpleado);
            $responsable->setNroLicencia($nroLicencia);
            $responsable->setNombreResponsable($nombreEmpleado);
            $responsable->setApellidoResponsable($apellidoEmpleado);
        }



    // do {
    //     $opcion = mostrarMenu();
    //     switch($opcion){
    //         case 1:
    //             $this->__toString();
    //             break;
    //         case 2:
    //             $this->cargarInformacionViaje();
    //             break;
    //         case 3:
    //             $opcionMenViaje = opcionesModificarDatosViaje();
    //             $this->modificarInfoViaje($opcionMenViaje);
    //             break;
    //         case 4:
    //             $this->modificarInfoPasajeros(); 
    //             break;
    //         case 5:
    //             $opcMenuResp = $this->opcionesModificarResponsable();
    //             $this->modificarInfoResponsable($opcMenuResp);
    //     }
            
    // } while($opcion != 6);



}