<?php
	require_once("pescappc.php");

	function crearConexion() {
		// Datos de conexión
		$database = "pescapp";
		$host = "localhost";
		$user = "root";
		$password = "";

		// Establecemos la conexión con la base de datos
		$conexion =	mysqli_connect($host,$user,$password,$database);
//		$conexion = mysqli_connect($host, $user, $password, $database);
		// Si hay un error en la conexión, lo mostramos y detenemos.
		if (!$conexion)
			die("<br>Error de conexión con la base de datos: " . mysqli_connect_error());
		// Si está todo correcto, enviamos la conexión con la base de datos.
		return $conexion;
	}

	function cerrarConexion($conexion) {
		mysqli_close($conexion);
	}


	function guardarManga($pescador, $manga, $puntos, $capturas_string) {
		$conexion = crearConexion();

		// Sentencia preparada
		$stmt = $conexion->prepare("INSERT INTO resultados (pescador, manga, puntos, capturas) VALUES (?, ?, ?, ?)");

		if ($stmt === false) {
			// Manejar el error de preparación de la consulta
			echo "Error al preparar la consulta: " . $conexion->error;
			$conexion->close();
			return; // Salir de la función para evitar errores posteriores
		}
	
		$stmt->bind_param("ssis", $pescador, $manga, $puntos, $capturas_string); // "ssis": string, string, integer, string
	
		if ($stmt->execute()) {
			echo "<br>Manga guardada correctamente.";
		} else {
			echo "<br>Error al guardar la manga: " . $stmt->error;
		}
	
		$stmt->close();
		$conexion->close();
	}


// esta es la que tenia yo, en vez de la de arriba, pero la bbdd daba error porque habia muchos |||| y lo interpreteba como sql injection, 
// y con sentencias preparadas como arriba funciona bien
    /*function guardarManga($pescador,$manga,$puntos,$capturas_string){
        $conexion=crearConexion();
		
        $consulta = "INSERT INTO resultados (pescador, manga, puntos,capturas) VALUES ('$pescador', '$manga', $puntos, $capturas_string)";
        if (mysqli_query($conexion, $consulta)) {
            echo "<br>Manga guardada correctamente.";
        } else {
            echo "<br>Error al guardar la manga: " . mysqli_error($conexion);
        }
	
	mysqli_close($conexion);
	}*/
       

    ?>


<?php

	function getpuntuacion() {
		$conexion=crearConexion();
		// Definimos la consulta para obtener todos los datos de la tabla city.
		$consulta = "SELECT pescador, manga, puntos,capturas FROM resultados ORDER BY manga ASC, puntos DESC"; 
		// Hacemos la consulta y guardamos el resultado en $result
		$result = mysqli_query($conexion, $consulta);
		// Si la consulta ha devuelto algún valor, devolvemos los valores.
		if (mysqli_num_rows($result) > 0) {
			return $result;
		} else { // Si no, enviamos un mensaje de error.
			echo "error";
		}
		// Cerramos la conexion
		mysqli_close($conexion);

	}
	function getmanga1() {
		$conexion=crearConexion();
		// Definimos la consulta para obtener todos los datos de la tabla city.
		$consulta = "SELECT pescador, manga, puntos, capturas FROM resultados WHERE manga=1 ORDER BY puntos DESC"; 
		// Hacemos la consulta y guardamos el resultado en $result
		$result = mysqli_query($conexion, $consulta);
		// Si la consulta ha devuelto algún valor, devolvemos los valores.
		if (mysqli_num_rows($result) > 0) {
			return $result;
		} else { // Si no, enviamos un mensaje de error.
			echo "error";
		}
		// Cerramos la conexion
		mysqli_close($conexion);

	}

	function getmanga2() {
		$conexion=crearConexion();
		// Definimos la consulta para obtener todos los datos de la tabla city.
		$consulta = "SELECT pescador, manga, puntos, capturas FROM resultados WHERE manga=2 ORDER BY puntos DESC"; 
		// Hacemos la consulta y guardamos el resultado en $result
		$result = mysqli_query($conexion, $consulta);
		// Si la consulta ha devuelto algún valor, devolvemos los valores.
		if (mysqli_num_rows($result) > 0) {
			return $result;
		} else { // Si no, enviamos un mensaje de error.
			echo "error";
		}
		// Cerramos la conexion
		mysqli_close($conexion);

	}

	function getmanga3() {
		$conexion=crearConexion();
		// Definimos la consulta para obtener todos los datos de la tabla city.
		$consulta = "SELECT pescador, manga, puntos, capturas FROM resultados WHERE manga=3 ORDER BY puntos DESC"; 
		// Hacemos la consulta y guardamos el resultado en $result
		$result = mysqli_query($conexion, $consulta);
		// Si la consulta ha devuelto algún valor, devolvemos los valores.
		if (mysqli_num_rows($result) > 0) {
			return $result;
		} else { // Si no, enviamos un mensaje de error.
			echo "error";
		}
		// Cerramos la conexion
		mysqli_close($conexion);

	}
	function getmanga4() {
		$conexion=crearConexion();
		// Definimos la consulta para obtener todos los datos de la tabla city.
		$consulta = "SELECT pescador, manga, puntos, capturas FROM resultados WHERE manga=4 ORDER BY puntos DESC"; 
		// Hacemos la consulta y guardamos el resultado en $result
		$result = mysqli_query($conexion, $consulta);
		// Si la consulta ha devuelto algún valor, devolvemos los valores.
		if (mysqli_num_rows($result) > 0) {
			return $result;
		} else { // Si no, enviamos un mensaje de error.
			echo "error";
		}
		// Cerramos la conexion
		mysqli_close($conexion);

	}
    ?>