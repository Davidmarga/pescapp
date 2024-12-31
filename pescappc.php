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
	        $capturas_string = implode("-", $capturas); // Convierte el array a una cadena separada por espacios
            $manga = [
        "Pescador" => $_POST['Pescador'],
        "Manga" => $_POST["manga"],
        "Puntuacion" => $puntos,
		"Capturas"=>$capturas_string
    ];
            echo "<pre>"; // Para una mejor visualización del array
    print_r($manga);
    echo "</pre>";
    guardarManga($_POST['Pescador'],$_POST["manga"],$puntos);
    } 
}





function showpuntuaciones(){
	$datos=getpuntuacion();
	if (is_string($datos)){
		echo $datos;
	
	}else{
		while ($fila = mysqli_fetch_assoc($datos)){
			echo "<tr>\n
			<td> ". $fila ["pescador"] ."</td>\n
			<td> ". $fila ["manga"] ."</td>\n
			<td> ". $fila ["puntos"] ."</td>\n
			</tr>";
		};
		
	}





}


?>


<?php



/*		if (anadirNoticia($_POST['titulo'], $_POST['cuerpo'], $_POST['autor'])) {
			echo "Noticia guardada";





aaaa
}

?>










	function showClasificacion() {
		$datos = getClasificacion();
		// Si hemos recibido un menasje de error lo mostramos.
		if (is_string($datos)) {
			echo $datos;
		} else { // Si hemos recibido datos
		// Obtenemos cada una de las filas de datos que nos devolvió la consulta.
		// mysqli_fetch_assoc avanza entre cada uno de los elementos del array 
		// que contiene cada vez que se llama, hasta que no haya más, por eso se puede usar en un while.
			while ($fila = mysqli_fetch_assoc($datos)) {
				echo "<tr>\n
						<td>" . $fila["ID"] . "</td>\n
						<td>" . $fila["nombre"] . "</td>\n
						<td>" . $fila["puntuacion"] . "</td>\n
						<td>" . $fila["District"] . "</td>\n
						<td>" . $fila["Population"] . "</td>\n
					</tr>";
			};
			/*
			foreach ($datos as $fila) {
				echo "<tr>\n
						<td>" . $fila["ID"] . "</td>\n
						<td>" . $fila["Name"] . "</td>\n
						<td>" . $fila["CountryCode"] . "</td>\n
						<td>" . $fila["District"] . "</td>\n
						<td>" . $fila["Population"] . "</td>\n
					</tr>";
			};
			*/
            ?>
