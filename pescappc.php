<?php 

	include "pescappm.php";


    function calcularPuntuacion() {
        $sumapuntos=0;

        if (isset($_POST['Pescador'])){
        $usuario=$_POST['Pescador'] ;
    echo "usuario: ". $usuario."<br>";
	
} 


        for ($i = 1; $i<=9; $i++) {
			$valor=0;
            if (isset($_POST[$i])){
				$valor=20+((int)$_POST[$i]*20);}
				else
				{
					$valor=0;
				}
			
        $sumapuntos+=$valor;
}
	return $sumapuntos;
    
        }

    
$puntos=calcularPuntuacion();



if ($puntos !== null) {
    if (isset($_POST["manga"])) {
		$capturas = []; // Array para almacenar las capturas
        for ($i = 1; $i <= 9; $i++) {
		$capturas[]=isset($_POST[$i])?$_POST[$i]:0;
	}
	        $capturas_string = $capturas[0] ."|". $capturas[1] ."|". $capturas[2] ."|". $capturas[3]  . "|". $capturas[4]  ."|". $capturas[5]  ."|". $capturas[6]  ."|". $capturas[7]  ."|". $capturas[8];  // implode("-", $capturas);  // Convierte el array a una cadena separada por espacios
            $manga = [
        "Pescador" => $_POST['Pescador'],
        "Manga" => $_POST["manga"],
        "Puntuacion" => $puntos,
		"Capturas"=>$capturas_string
    ];
            echo "<pre>"; // Para una mejor visualización del array
    print_r($manga);
    echo "</pre>";
    guardarManga($_POST['Pescador'],$_POST["manga"],$puntos,$capturas_string);
    } 
}


function procesarPuntuaciones1(){
	$resultado=array();
	$datos=getmanga1();
	if (is_string($datos)){
		echo $datos;
	
	}else{
		$posicion=1;
		while ($fila = mysqli_fetch_assoc($datos)){
			$fila["posicion"]=$posicion;
			$resultado[]=$fila;
			$posicion++;
			
		};
		
		$acumulada_manga1=array();
		foreach ($resultado as $pescador) {
           $acumulada_manga1[$pescador["pescador"]]=$pescador["posicion"]; 
        }
		
// Formateo de la salida original (opcional, si aún lo necesitas)
foreach ($resultado as $pescador) {
	echo "Posición: " . $pescador['posicion'] . ", Pescador: " . $pescador['pescador'] . ", Puntos: " . $pescador['puntos'] . ", capturas: " . $pescador["capturas"] . "<br>";
	
	}


  }
  return $resultado;
}

function procesarPuntuaciones2(){
	$resultado=array();
	$datos=getmanga2();
	if (is_string($datos)){
		echo $datos;
	
	}else{
		$posicion=1;
		while ($fila = mysqli_fetch_assoc($datos)){
			$fila["posicion"]=$posicion;
			$resultado[]=$fila;
			$posicion++;
			
		};
		
		$acumulada_manga2=array();
		foreach ($resultado as $pescador) {
           $acumulada_manga2[$pescador["pescador"]]=$pescador["posicion"]; 
        }
		
// Formateo de la salida original (opcional, si aún lo necesitas)
foreach ($resultado as $pescador) {
	echo "Posición: " . $pescador['posicion'] . ", Pescador: " . $pescador['pescador'] . ", Puntos: " . $pescador['puntos'] . ", capturas: " . $pescador["capturas"] . "<br>";
	
	}
  }
  return $resultado;
}

function procesarPuntuaciones3(){
	$resultado=array();
	$datos=getmanga3();
	if (is_string($datos)){
		echo $datos;
	
	}else{
		$posicion=1;
		while ($fila = mysqli_fetch_assoc($datos)){
			$fila["posicion"]=$posicion;
			$resultado[]=$fila;
			$posicion++;
			
		};
		
		$acumulada_manga3=array();
		foreach ($resultado as $pescador) {
           $acumulada_manga3[$pescador["pescador"]]=$pescador["posicion"]; 
        }
		
// Formateo de la salida original (opcional, si aún lo necesitas)
foreach ($resultado as $pescador) {
	echo "Posición: " . $pescador['posicion'] . ", Pescador: " . $pescador['pescador'] . ", Puntos: " . $pescador['puntos'] . ", capturas: " . $pescador["capturas"] . "<br>";
	
	}
  }
  return $resultado;
}

function procesarPuntuaciones4(){
	$resultado=array();
	$datos=getmanga4();
	if (is_string($datos)){
		echo $datos;
	
	}else{
		$posicion=1;
		while ($fila = mysqli_fetch_assoc($datos)){
			$fila["posicion"]=$posicion;
			$resultado[]=$fila;
			$posicion++;
			
		};
		
		$acumulada_manga4=array();
		foreach ($resultado as $pescador) {
           $acumulada_manga4[$pescador["pescador"]]=$pescador["posicion"]; 
        }
		
// Formateo de la salida original (opcional, si aún lo necesitas)
foreach ($resultado as $pescador) {
	echo "Posición: " . $pescador['posicion'] . ", Pescador: " . $pescador['pescador'] . ", Puntos: " . $pescador['puntos'] . ", capturas: " . $pescador["capturas"] ."<br>";
	
	}
  }
  return $resultado;
}




// Función interna para procesar los resultados de UNA manga (sin impresión interna)
function procesarPuntuacionesInterna($datos){
    $resultado = array();
    if (is_string($datos)){
        return array();//Devolver array vacio en caso de error para que no de fallo el resto del codigo
    }else{
        $posicion = 1;
        while ($fila = mysqli_fetch_assoc($datos)){
            $resultado[] = $fila;
            $posicion++;
        }
        $acumulada = array();
        foreach ($resultado as $pescador) {
            $acumulada[$pescador["pescador"]] = array_search($pescador,$resultado)+1;//Calculo de la posicion
        }
        return $acumulada;
    }
}

function clasiFinal(){
    $mangas = array(
        "manga1" => procesarPuntuacionesInterna(getmanga1()),
        "manga2" => procesarPuntuacionesInterna(getmanga2()),
        "manga3" => procesarPuntuacionesInterna(getmanga3()),
        "manga4" => procesarPuntuacionesInterna(getmanga4()),
    );

    $posiciones_totales = array();

    // Recorrer los resultados de cada manga y sumar posiciones
    foreach ($mangas as $manga_resultados) {
        foreach ($manga_resultados as $pescador => $posicion) {
            if (isset($posiciones_totales[$pescador])) {
                $posiciones_totales[$pescador] += $posicion;
            } else {
                $posiciones_totales[$pescador] = $posicion;
            }
        }
    }

    $pescadores_en_todas = array();
    //Filtrar pescadores que estan en las 4 mangas
    foreach ($posiciones_totales as $pescador => $posicion) {
        $contador = 0;
        foreach ($mangas as $manga_resultados) {
            if (array_key_exists($pescador, $manga_resultados)) {
                $contador++;
            }
        }
        if ($contador == 4) {
            $pescadores_en_todas[$pescador] = $posicion;
        }

    }

    // Ordenar por puntuación (posición total) ascendente
    asort($pescadores_en_todas);

	foreach($pescadores_en_todas as $pescador=>$posicion){
		echo"<tr>
		<td>" . $pescador . "</td>
		<td>" . $posicion . "</td>
		</tr>";
	
	}
    
}

?>

<a href="index.php" class="btn btn-primary">Volver al inicio</a>;
