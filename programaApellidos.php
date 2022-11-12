<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
//Cruz Ovieso Juan Ignacio, FAI - 2558, Tec. en Desarrollo Web, juan.cruz@est.fi.uncoma.edu.com.ar, DevJuani
//De Philippis Daniel, FAI - 4328, Tec. en Desarrollo Web, daniel.dephilippis@est.fi.uncoma.edu.ar. DePhilippisdani



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

//punto 1

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
 //punto 2
/**
 * Retorna una coleccion de datos con ejemplos de partidas
 * @return array
 */
function cargarColeccionPartidas(){
    // Comentario de programador, habría que usar las variables que guardan el nombre, la palabra del intento
    // la cantidad de intentos y el puntaje?, Habria que actualizarla con cada partida?
    $coleccionPartidas = [
        [
            "palabraWordix" => "QUESO",
            "jugador" => "majo",
            "intentos" => 0,
            "puntaje" => 0
        ],
        [
            "palabraWordix" => "CASAS",
            "jugador" => "rudolf",
            "intentos" => 3,
            "puntaje" => 14
        ],
        [
            "palabraWordix" => "QUESO",
            "jugador" => "pink2000",
            "intentos" => 6,
            "puntaje" => 10
        ],
        [
            "palabraWordix" => "CARTA",
            "jugador" => "winston",
            "intentos" => 3,
            "puntaje" => 14
        ],
        [
            "palabraWordix" => "HUEVO",
            "jugador" => "tracer",
            "intentos" => 2,
            "puntaje" => 13
        ],
        [
            "palabraWordix" => "PIANO",
            "jugador" => "duende",
            "intentos" => 5,
            "puntaje" => 11
        ],
        [
            "palabraWordix" => "TINTO",
            "jugador" => "moira",
            "intentos" => 4,
            "puntaje" => 14
        ],
        [
            "palabraWordix" => "PASTA",
            "jugador" => "aroy",
            "intentos" => 6,
            "puntaje" => 12
        ],
        [
            "palabraWordix" => "VERDE",
            "jugador" => "aroy",
            "intentos" => 1,
            "puntaje" => 16
        ],
        [
            "palabraWordix" => "MUJER",
            "jugador" => "duende",
            "intentos" => 6,
            "puntaje" => 0
        ]
    ];
    return ($coleccionPartidas);
}
//punto 3
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
                
                break;
            case "8":
                echo "Gracias por jugar Wordix";
                break;
            default:
                echo "Opcion incorrecta, ingrese una opcion valida: ";
            }
    } while ($opcion < 1 || $opcion > 8);
}
//punto 4
/**
 * funcion que pide al usuario ingresar una palabra de 5 letras
 * @return string
 */
function palabraPorJugador(){
    // string $palabra
    $palabra = leerPalabra5Letras();
    return $palabra;
}

// punto 5
/** Funcion que solicita un numero entre dos valores 
 * @param int $min
 * @param int $max
 * @return int
 */
// $min=1 (porq hay siempre minimo hay una palabra y como maximo el resultado de count ($coleccionPalabras))
function numeroUsuario ($min, $max) {
    //int $numero
   echo "ingrese un numero entre";  
   $numero=solicitarNumeroEntre($min,$max);
return $numero; 
  }


// punto 6
// ver si se puede optimizar (que entre por parametro formal $nro)
// function que devuelve el resumen de una partida
/**
 * @param $min
 * @param $maxP
 */
   
  function resumenPartida ($min,$maxP) {
     //int $nro
     $coleccionPartidas = cargarColeccionPartidas ();
      echo "ingrese el núemro de partida";
      $nro= solicitarNumeroEntre ($min, $maxP);
      echo $coleccionPartidas [$nro] ["palabraWordix"] ."\n".$coleccionPartidas [$nro] ["jugador"]."\n". $coleccionPartidas [$nro] ["intentos"] .
      "\n". $coleccionPartidas [$nro] ["puntajes"];
  }
//punto 7
/**
 * Agrega una palabra a la colección de palabras
 */
function agregarPalabra ($colecionPalabras,$nuevaPalabra){
    
    do{
       
        if(!in_array($nuevaPalabra, $colecionPalabras)){
            array_push($colecionPalabras, $nuevaPalabra);
            echo "La palabra " . $nuevaPalabra . " fue agregada a la coleccion de palabras";
            $respuesta = "N";
        } else {
            echo "La palabra ya existe . \n ";
            echo "Desea intentar de nuevo? (s/n): ";
            $respuesta = trim(fgets(STDIN));
        }
    } while($respuesta == "s");

return $colecionPalabras;  
}

//punto 8

// funcion que retorna primera victoria
// ver si se puede utilizar el modulo 
/**
 *@param array $coleccionPartidas
 *@param string $nombreJugador
 *@return int
 */


function primeraVictoria ($coleccionPartidas,$nombreJugador) {
       $partidaEncontrada=false;
       $i=0;
       $indiceVictoria=-1;
       $max=count($coleccionPartidas);
        while (!$partidaEncontrada && $max>=$i) {
    
           $coleccionPartidas [$i];
           if ($coleccionPartidas [$i] ["jugador"] == $nombreJugador && $coleccionPartidas [$i] ["intentos"] >0 && $coleccionPartidas [$i] ["puntaje"]>0) {

            $indiceVictoria=$i;
            $partidaEncontrada=true;
        
           }

           $i++;

        }
        return $indiceVictoria;
    }



/**
 * 
 */
 
 

 
//punto 9
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



<<<<<<< Updated upstream

=======
/**
<<<<<<< Updated upstream
 * Agrega una palabra a la colección de palabras
=======
 * Convierte el nombre de un jugador en minúsculas
 * @return string $nombreJugador
 */
function solicitarJugador() {
    //String nombreJugador
    echo "Ingrese el nombre de un jugador.";
    $nombreJugador = trim(fgets(STDIN));
    $nombreJugador = strtolower($nombreJugador);
    return $nombreJugador;
}

/**
 * Obtiene una colección de palabras
 * @return array
>>>>>>> Stashed changes
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
>>>>>>> Stashed changes

<<<<<<< Updated upstream



=======
/**
 * Ordena por nombre y palabra un arreglo ingresado y lo muestra.
 * @param array $coleccionPartidas
 */
function ordenarColeccion() {
    uasort($coleccionPartidas)
}
>>>>>>> Stashed changes

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
