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

    function guardarManga($pescador,$manga,$puntos){
        $conexion=crearConexion();
		
        $consulta = "INSERT INTO resultados (pescador, manga, puntos) VALUES ('$pescador', '$manga', $puntos)";
        if (mysqli_query($conexion, $consulta)) {
            echo "<br>Manga guardada correctamente.";
        } else {
            echo "<br>Error al guardar la manga: " . mysqli_error($conexion);
        }
	
	mysqli_close($conexion);
	}
       

    ?>


<?php

	function getpuntuacion() {
		$conexion=crearConexion();
		// Definimos la consulta para obtener todos los datos de la tabla city.
		$consulta = "SELECT pescador, manga, puntos FROM resultados ORDER BY manga ASC, puntos DESC"; 
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
		$consulta = "SELECT pescador, manga, puntos FROM resultados WHERE manga=1 ORDER BY puntos DESC"; 
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
		$consulta = "SELECT pescador, manga, puntos FROM resultados WHERE manga=2 ORDER BY puntos DESC"; 
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
		$consulta = "SELECT pescador, manga, puntos FROM resultados WHERE manga=3 ORDER BY puntos DESC"; 
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
		$consulta = "SELECT pescador, manga, puntos FROM resultados WHERE manga=4 ORDER BY puntos DESC"; 
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