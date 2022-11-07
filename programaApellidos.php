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

/**
 * Agrega una palabra a la colección de palabras
 */
function nuevaPalabra (){
    $arrayDePalabras = cargarColeccionPalabras();
    do{
        $palabra = leerPalabra5Letras();
        if(!in_array($palabra, $arrayDePalabras)){
            array_push($arrayDePalabras, $palabra);
            echo "La palabra " . $palabra . " fue agregada a la coleccion de palabras";
            $respuesta = "N";
        } else {
            echo "La palabra ya existe . \n ";
            echo "Desea intentar de nuevo? (s/n): ";
            $respuesta = trim(fgets(STDIN));
        }
    } while($respuesta == "s");
}

/**
 * Retorna una coleccion de datos con ejemplos de partidas
 * @return array
 */
function cargarColeccionPartidas(){
    // Comentario de programador, habría que usar las variables que guardan el nombre, la palabra del intento
    // la cantidad de intentos y el puntaje?, Habria que actualizarla con cada partida?
    $coleccionPartidas = [
        [
            "palabraWordix" => "EJEMP",
            "jugador" => "Juan Perez",
            "intentos" => 3,
            "puntaje" => 100
        ],
        [
            "palabraWordix" => "EJEMP",
            "jugador" => "Juan Perez",
            "intentos" => 3,
            "puntaje" => 100
        ],
        [
            "palabraWordix" => "EJEMP",
            "jugador" => "Juan Perez",
            "intentos" => 3,
            "puntaje" => 100
        ],
        [
            "palabraWordix" => "EJEMP",
            "jugador" => "Juan Perez",
            "intentos" => 3,
            "puntaje" => 100
        ],
        [
            "palabraWordix" => "EJEMP",
            "jugador" => "Juan Perez",
            "intentos" => 3,
            "puntaje" => 100
        ],
        [
            "palabraWordix" => "EJEMP",
            "jugador" => "Juan Perez",
            "intentos" => 3,
            "puntaje" => 100
        ],
        [
            "palabraWordix" => "EJEMP",
            "jugador" => "Juan Perez",
            "intentos" => 3,
            "puntaje" => 100
        ],
        [
            "palabraWordix" => "EJEMP",
            "jugador" => "Juan Perez",
            "intentos" => 3,
            "puntaje" => 100
        ],
        [
            "palabraWordix" => "EJEMP",
            "jugador" => "Juan Perez",
            "intentos" => 3,
            "puntaje" => 100
        ],
        [
            "palabraWordix" => "EJEMP",
            "jugador" => "Juan Perez",
            "intentos" => 3,
            "puntaje" => 100
        ]
    ];
    return ($coleccionPartidas);
}

/**
 * Muestra el menú de opciones y retorna la opción elegida
 * @return string
 */
function seleccionarOpcion(){
    do{
        $opcion = trim((fgets(STDIN)));
        switch ($opcion){
            case "1":
                //Jugar wordix con palabra aleatoria
                break;
            case "2":
                //Jugar wordix con palabra elegida
                break;
            case "3":
                //Mostrar una partida
                break;
            case "4":
                //Mostrar primera partida ganadora
                break;
            case "5":
                //Mostrar estadisticas del jugador
                break;
            case "6":
                //Mostrar listado de partidas ordenadas por jugador y por palabra
                break;
            case "7":
                //Agregar una palabra de 5 letras
                nuevaPalabra();
                break;
            case "8":
                echo "Gracias por jugar Wordix";
                break;
            default:
                echo "Opcion incorrecta, ingrese una opcion valida: ";
            }
    } while ($opcion < 1 || $opcion > 8);
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
