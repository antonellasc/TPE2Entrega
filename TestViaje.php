<?php

include_once 'Pasajero.php';
include_once 'PasajeroVIP.php';
include_once 'PasajeroNecesidadesEspeciales.php';
include_once 'ResponsableV.php';
include_once 'Viaje.php';

$objPasajero = new Pasajero("Camille", "Fefe", 4242, 29965, 1, 1);
$objPasajero2 = new PasajeroNecesidadesEspeciales("Pepe", "Juanes", 2342, 2323, 2, 2, false, true, true);
$objPasajero3 = new PasajeroVIP("Dona", "Baez", 5432, 5566, 3, 3, 122, 301);
$objResponsable = new ResponsableV(333, 112, "Tete", "Lei");
$objViaje = new Viaje(9898, "Madrid", 5, [$objPasajero, $objPasajero2, $objPasajero3], $objResponsable, 100, 355);


// MENÚ DEL VIAJE
    do {
        $opcionMenu = $objViaje->mostrarMenu();
        switch($opcionMenu){
            case 1:
                echo $objViaje;
                break;
            case 2:
                $objViaje->cargarInformacionViaje();
                break;
            case 3:
                $opcionMenViaje = $objViaje->opcionesModificarDatosViaje();
                $objViaje->modificarInfoViaje($opcionMenViaje);
                break;
            case 4:
                $objViaje->modificarInfoPasajeros(); 
                break;
            case 5:
                $opcMenuResp = $objViaje->opcionesModificarResponsable();
                $objViaje->modificarInfoResponsable($opcMenuResp);
                break;
            case 6:
                 $objViaje->cargarPasajeroPorVentaPasaje();
                 break;
        }
            
    } while($opcionMenu != 7);