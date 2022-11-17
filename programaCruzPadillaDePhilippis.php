<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
//Cruz Oviedo Juan Ignacio, FAI - 2558, Tec. en Desarrollo Web, juan.cruz@est.fi.uncoma.edu.com.ar, DevJuani
//De Philippis Daniel, FAI - 4328, Tec. en Desarrollo Web, daniel.dephilippis@est.fi.uncoma.edu.ar. DePhilippisDani
//Francisco Padilla, FAI - 3168, Tec. en Desarrollo Web, francisco.padilla@est.fi.uncoma.edu.ar, FranPadilla0154



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
    //Array $coleccionPalabras
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
    //Array $coleccionPartidas
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
    //String $opcion
        echo "\n**********************Wordix**********************
        \n1) Jugar al Wordix con una palabra elegida
        \n2) Jugar al Wordix con una palabra aleatoria
        \n3) Mostrar una partida
        \n4) Mostrar la primer partida gandora
        \n5) Mostrar resumen jugador
        \n6) Mostrar listado de partidas ordenadas por jugador y por palabra
        \n7) Agregar una palabra de 5 letras a Wordix
        \n8) Salir\n";
        $opcion = trim(fgets(STDIN));
    return $opcion;
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
function numeroUsuario ($min, $max) {
    //int $numero
    echo "ingrese un numero entre $min y $max.\n";
    $numero=solicitarNumeroEntre($min,$max);
    return $numero; 
}

// punto 6
// function que devuelve el resumen de una partida
/**
 * @param $nro
 */   
function resumenPartida ($nro, $coleccionPartidas) {
    if($nro > -1 && $coleccionPartidas [$nro] ["puntaje"] >= 0 && $coleccionPartidas [$nro] ["intentos"] >= 0){
        echo "**********************************".
        "\nPartida WORDIX " . $nro+1 .": palabra " .$coleccionPartidas [$nro] ["palabraWordix"] . "\n".
        "Jugador: " .$coleccionPartidas [$nro] ["jugador"] . "\n".
        "Puntaje: " .$coleccionPartidas [$nro] ["puntaje"] . "\n".
        "Intentos: ";
        if($coleccionPartidas [$nro] ["puntaje"] > 0){
            echo "Adivinó la palabra en ". $coleccionPartidas [$nro] ["intentos"] . " intentos\n";
        } else {
            echo "No adivinó la palabra\n";
        }
    } elseif($nro == -1){
        echo "El jugador no ganó ninguna partida\n";
    }else if($nro == -2){
        echo "El jugador no existe\n";
    }
}

//punto 7
/**
 * Agrega una palabra a la colección de palabras
 * @param array $coleccionPalabras
 * @param string $nuevaPalabra
 * @return array
 */
function agregarPalabra ($coleccionPalabras,$nuevaPalabra){
    if(!in_array($nuevaPalabra, $coleccionPalabras)){
        array_push($coleccionPalabras, $nuevaPalabra);                      //trata al array como si fuera una pila y empuja la variable que se le pasa al final del array. El tamaño del array será incrementado por el número de variables insertados
        echo "La palabra se ha agregado a la colección de palabras";
    } else {
        echo "La palabra ya se encuentra en la colección de palabras";
    }
return $coleccionPalabras;
}

//punto 8
/**
 *funcion que retorna primera victoria
 *@param array $coleccionPartidas
 *@param string $nombreJugador
 *@return int
 */
function primeraVictoria ($coleccionPartidas,$nombreJugador) {
    //boolean $partidaEncontrada
    //int $i, $indiceVictoria, $max 
    $partidaEncontrada=false;
    //inicializacion de variables. $indiceVictoria comienza en -1 porque??
    $i=0;
    $indiceVictoria=-1;
    $max=count($coleccionPartidas)-1;
        while ($partidaEncontrada == false && $max>=$i) {
            $coleccionPartidas [$i];
            if ($coleccionPartidas [$i] ["jugador"] == $nombreJugador && $coleccionPartidas [$i] ["intentos"] >=0 && $coleccionPartidas [$i] ["puntaje"]>0) {
                $indiceVictoria=$i;
                $partidaEncontrada=true;        
            }
            $i++;
        }
        if(!existenciaUsuario($nombreJugador, $coleccionPartidas)){
            $indiceVictoria = -2;
        }
    return $indiceVictoria;
}

//punto 9
/**
 * Retorna el resumen de un jugador
 * @param array $coleccionPartidas
 * @param string $nombreJugador
 * @return array $estadisticasJugador
 */
function resumenJugador($coleccionPartidas, $nombreJugador) {
    //Int puntajeResumen, victoriasResumen, $partidasTotal, $int1, $int2, $int3, $int4, $int5, $int6, $n, $i, $porcentajeVictorias
    //boolean $nombreEncontrado
    $puntajeResumen = 0;
    $victoriasResumen = 0;
    $partidasTotal = 0;
    $int1 = 0;
    $int2 = 0;
    $int3 = 0;
    $int4 = 0;
    $int5 = 0;
    $int6 = 0;
    $n = count($coleccionPartidas);
    $nombreEncontrado = false;
    for ($i=0; $i < $n; $i++) {
        if ($coleccionPartidas[$i]["jugador"] == $nombreJugador) {
            if ($coleccionPartidas[$i]["puntaje"] <> 0) {
                $puntajeResumen = $puntajeResumen + $coleccionPartidas[$i]["puntaje"];
                $victoriasResumen++;
                switch ($coleccionPartidas[$i]["intentos"]) {
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
            $partidasTotal++;
            $nombreEncontrado = true;
        }
    }
    if($nombreEncontrado && $victoriasResumen > 0){
        $procentajeVictorias = ($victoriasResumen / $partidasTotal) * 100;
        $estadisticasJugador = "
    ************************************************************
    Jugador: $nombreJugador\n
    Partidas: $partidasTotal\n
    Puntaje: $puntajeResumen\n
    Victorias: $victoriasResumen\n
    Porcentaje de victorias: $procentajeVictorias%\n
    Adivinadas: 
    Intento 1: $int1\n
    Intento 2: $int2\n
    Intento 3: $int3\n
    Intento 4: $int4\n
    Intento 5: $int5\n
    Intento 6: $int6\n
    ************************************************************";
    }elseif($nombreEncontrado == true && $partidasTotal> 0){
        $estadisticasJugador = "El jugador $nombreJugador no ganó ninguna partida";
    } else{
        $estadisticasJugador = "El jugador no existe";
    }
    return $estadisticasJugador;
}


// Punto 10
/**
 * Pide un nombre al usuario y lo convierte en minusculas
 * @return string $nombreJugador
 */
function solicitarJugador() {
    //String nombreJugador
    echo "Ingrese el nombre de un jugador: ";
    $nombreJugador = trim(fgets(STDIN));
    while (!ctype_alpha(substr($nombreJugador, 0, 1))) {
            echo "Error, el primer carácter no es una letra. Ingrese el nombre de un jugador: ";
            $nombreJugador = trim(fgets(STDIN));
    }
    $nombreJugador = strtolower($nombreJugador);  // devuelve el string en minusculas
    return $nombreJugador;
}

//Punto 11
/**
 * Ordena por nombre y palabra un arreglo ingresado y lo muestra.
 * @param array $coleccionPartidas
 */
function ordenarColeccion($coleccionPartidas) {
    uasort($coleccionPartidas, "compararNombres"); //uasort es una función que ordena un arreglo con una función de comparación
    print_r($coleccionPartidas);                   //definida por el usuario y mantiene la asociación de índices
}
/**
 * Compara dos strings y retorna el resultado de la comparación
 * @param array $a
 * @param array $b
 * @return int
 */
function compararNombres($a, $b) {
    //Array $a, $b
    if($a["jugador"] == $b["jugador"]){
        return $a["palabraWordix"] <=> $b["palabraWordix"];
    }
    return $a["jugador"] <=> $b["jugador"];
}


//FUNCIONES EXTRAS
/**
 * Agrega una partida con sus datos a la colecion de partidas
 * @param array $coleccionPartidas
 * @param string $nuevaPartida
 * @return array $coleccionPartidas
 */
function agregarPartida($coleccionPartidas, $nuevaPartida) {
    array_push($coleccionPartidas, $nuevaPartida);
    return $coleccionPartidas;
}

/**
 * Controla que el jugador no haya jugado una partida con la misma palabra
 * @param array $coleccionPartidas
 * @param string $nombreJugador
 * @param string $palabra
 * @return boolean
 */
function yaJugoPalabra($coleccionPartidas, $nombreJugador, $palabra) {
    //INT $i, $n
    //BOOLEAN $yaJugo
    $n = count($coleccionPartidas);
    $yaJugo = false;
    for ($i=0; $i < $n; $i++) {
        if ($coleccionPartidas[$i]["jugador"] == $nombreJugador && $coleccionPartidas[$i]["palabraWordix"] == $palabra) {
            $yaJugo = true;
        }
    }
    return $yaJugo;
}

/** 
* Funcion que comprueba la escistencia de un usuario en el arreglo de partidas
* @param String nombreJugador
* @param array $coleccionPartidas
* @return boolean
 */
function existenciaUsuario($nombreJugador, $coleccionPartidas){
    $n = count($coleccionPartidas);
    $existe = false;
    for ($i=0; $i < $n; $i++) {
        if ($coleccionPartidas[$i]["jugador"] == $nombreJugador) {
            $existe = true;
        }
    }
    return $existe;
}

//Punto 12

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/*
* INT $opcion, $numero,
* STRING $nombreJugador, $palabraAJugar, $palabra
* ARRAY $coleccionPartidas, $coleccionPalabras, $resultado
*/

//Inicialización de variables:
$coleccionPartidas = cargarColeccionPartidas();
$coleccionPalabras = cargarColeccionPalabras();

//Proceso:
    do {
        $opcion = seleccionarOpcion();
        switch ($opcion){
            case "1":
                $nombreJugador = solicitarJugador();
                $numero = numeroUsuario(1, count($coleccionPalabras)) - 1;
                while (yaJugoPalabra($coleccionPartidas, $nombreJugador, $coleccionPalabras[$numero])) {
                    echo "$nombreJugador ya ha jugado esa palabra, ingrese otro número:\n";
                    $numero = trim(fgets(STDIN));
                    $numero--;
                }
                $palabraAJugar = $coleccionPalabras[$numero];
                $resultado = jugarWordix($palabraAJugar, $nombreJugador);
                $coleccionPartidas = agregarPartida($coleccionPartidas, $resultado);
                break;
            case "2":
                //Sumar partida al arreglo de partidas
                $nombreJugador = solicitarJugador();
                $numero = rand(0, count($coleccionPalabras) - 1);
                while (yaJugoPalabra($coleccionPartidas, $nombreJugador, $coleccionPalabras[$numero])) {
                    $numero = rand(0, count($coleccionPalabras) - 1);
                }
                $palabraAJugar = $coleccionPalabras[$numero];
                $resultado = jugarWordix($palabraAJugar, $nombreJugador);
                $coleccionPartidas = agregarPartida($coleccionPartidas, $resultado);
                break;
            case "3":
                //Mostrar una partida
                echo "Ingrese el número de partida: ";
                $numero = solicitarNumeroEntre (1, count($coleccionPartidas));
                $numero--;
                resumenPartida($numero, $coleccionPartidas);
                break;
            case "4":
                //Mostrar primera partida ganadora
                $nombreJugador = solicitarJugador();
                $numero = primeraVictoria($coleccionPartidas, $nombreJugador);
                resumenPartida($numero, $coleccionPartidas);
                break;
            case "5":
                //Mostrar estadisticas del jugador
                $nombreJugador = solicitarJugador();
                echo resumenJugador($coleccionPartidas, $nombreJugador);
                break;
            case "6":
                //Mostrar listado de partidas ordenadas por jugador y por palabra
                ordenarColeccion($coleccionPartidas);
                break;
            case "7":
                //Agregar una palabra de 5 letras
                $palabra = leerPalabra5Letras();
                $coleccionPalabras = agregarPalabra($coleccionPalabras, $palabra);
                break;
            case "8":
                echo "Gracias por jugar Wordix";
                break;
            default:
                echo "Opcion incorrecta, ingrese una opcion valida.";
            }
    } while ($opcion != "8");

    //El swtich corresponde a la estructura if ya que dependiendo el valor de la variable a evaluar
    //Ingresara al caso correspondiente, si no se cumple ninguna condicion se ejecutara el default
    //y se utiliza el break para que el codigo no siga ejecutando los demas casos.