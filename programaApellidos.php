<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Retorna el resumen de un jugador
 * @param array $coleccionPartidas
 * @param string $nombreJugador
 * @return array $resumenJugador
 */
function resumenJugador($coleccionPartidas, $nombreJugador) {
    //Int puntajeResumen, n
    $puntajeResumen = 0;
    $victoriasResumen = 0;
    $int1 = 0;
    $int2 = 0;
    $int3 = 0;
    $int4 = 0;
    $int5 = 0;
    $int6 = 0;
    $n = count($coleccionPartidas);
    for ($i=0; $i<=$n; $i++) {
        if ($coleccionPartidas[$jugador][$i] == $nombreJugador) {
            if ($coleccionPartidas[$puntaje][$i] <> 0) {
                $puntajeResumen = $puntajeResumen + $coleccionPartidas[$puntaje][$i];
                $victoriasResumen++;
                switch ($coleccionPartidas[$intentos][$i]) {
                    case 1:
                        $int1++;
                        break;
                    case 2:
                        $int2++;
                        break;
                    case 3:
                        $int3++;
                        break;
                    case 4:
                        $int4++;
                        break;
                    case 5:
                        $int5++;
                        break;
                    case 6:
                        $int6++;
                        break;
                }
            }
        }
        $resumenJugador = [$jugador = $nombreJugador, $puntaje = $puntajeResumen, $victorias = $victoriasResumen, $intento1 = $int1, $intento2 = $int2, $intento3 = $int3, $intento4 = $int4, $intento5 = $int5, $intento6 = $int6];
        return $resumenJugador;
    }
}

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "CARRO", "PASTA", "LETRA", "CARTA", "COSAS"
    ];

    return ($coleccionPalabras);
}

/* ... COMPLETAR ... */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/
