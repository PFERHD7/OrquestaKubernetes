<?php

require_once("base_datos.php"); // se necesita un archivo externo

    // verificar si es método GET
	if($_SERVER['REQUEST_METHOD'] == 'GET') // consulta de información
	{
		// cotenido de proceso GET
		// Paso 1. Obtener pares clave valor

		// web service 1, Consultar por folio
		// isset() -> determinar si existe una variable o valor
		if(isset($_GET['id'])) {
			// buscar producto
			$id = $_GET['id'];

			// búsqueda por número de folio en base de datos
			$solicitud = buscar_id($id);

			// responder la solicitud
			if ($solicitud != null) { // si se encontró el producto
				# sí lo encontró
				header('Content-Type: application/json');
				$respuesta = [
					"solicitud" => (object)[
						"id" => $solicitud->id,
                        "fecha" => $solicitud->fecha,
						"nombres" => $solicitud->nombres,
						"apellidoP" => $solicitud->apellidoP,
						"apellidoM" => $solicitud->apellidoM,
						"sexo" => $solicitud->sexo,
						"edad" => $solicitud->edad,
                        "edo_civil" => $solicitud->edo_civil,
                        "curp" => $solicitud->curp,
                        "nivel" => $solicitud->nivel,
                        "grado" => $solicitud->grado
					]
				];

				// enviando respuesta
				echo json_encode($respuesta);
			} else {
				// no lo encontró
				header('Content-Type: application/json');
				$respuesta = [
					"solicitud" => (object)[]
				];

				// enviando respuesta
				echo json_encode($respuesta);
			}

		} else {
			// web service 2. Consultar todo

			// obteniendo todos los productos de la base de datos
			$solicitud = buscar_todo();

			if (is_array($solicitud) && sizeof($solicitud) > 0) { // sí tiene elementos (productos)
				// sí hay elementos
				header ('Content-Type: application/json'); // la respuesta es en JSON

				$array_solicitud = [];
				// obtener todos los productos del resultado de la base de datos
				foreach($solicitud as $item) { 
					$array_solicitud[] = $item; // agrego cada producto al arrglo de productos
				}

				$respuesta = [
					"mensaje" => "Proceso exitoso",
					"solicitud" => $array_solicitud
				];

				echo json_encode($respuesta);
			} else {
				// no hay elementos
				header ('Content-Type: application/json'); // la respuesta es en JSON
				$respuesta = [
					"mensaje" => "Proceso exitoso",
					"solicitud" => []
				];

				echo json_encode($respuesta);
			}

		}
		

		// algoritmo o proceso
	} else if($_SERVER['REQUEST_METHOD'] == 'POST') // registrar
	{
		// contenido de proceso POST

		// Paso 1. Obtener valores de la solicitud
		$datos_recibidos = json_decode(
			file_get_contents("php://input")
		);
        
        $fecha = $datos_recibidos->fecha;
		$nombres = $datos_recibidos->nombres;
		$apellidoP = $datos_recibidos->apellidoP;
		$apellidoM = $datos_recibidos->apellidoM;
		$sexo = $datos_recibidos->sexo;
		$edad = $datos_recibidos->edad;
        $edo_civil = $datos_recibidos->edo_civil;
        $curp = $datos_recibidos->curp;
        $nivel = $datos_recibidos->nivel;
        $grado = $datos_recibidos->grado;

		// registrar en la base de datos
		$resultado = insertar($fecha, $nombres, $apellidoP, $apellidoM, $sexo, $edad, $edo_civil, $curp, $nivel, $grado);

		if ($resultado != null) { 
			# Sí se realizó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "Registro exitoso"
			];

			echo json_encode($respuesta);
		} else {
			// no se realizó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "No se pudo registar"
			];

			echo json_encode($respuesta);
		}

	} else if($_SERVER['REQUEST_METHOD'] == 'PUT') // actualizar
	{
		error_log(file_get_contents("php://input"));
		// contenido de proceso PUT
		$datos_recibidos = json_decode(
			file_get_contents("php://input")
		);

		$id = $datos_recibidos->id;
        $fecha = $datos_recibidos->fecha;
		$nombres = $datos_recibidos->nombres;
		$apellidoP = $datos_recibidos->apellidoP;
		$apellidoM = $datos_recibidos->apellidoM;
		$sexo = $datos_recibidos->sexo;
		$edad = $datos_recibidos->edad;
        $edo_civil = $datos_recibidos->edo_civil;
        $curp = $datos_recibidos->curp;
        $nivel = $datos_recibidos->nivel;
        $grado = $datos_recibidos->grado;
		// procesar algoritmo
		$resultado = actualizar($id, $fecha, $nombres, $apellidoP, $apellidoM, $sexo, $edad, $edo_civil, $curp, $nivel, $grado);
        
		if ($resultado !=null ) {
			# sí se actualizó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "Actualización correcta"
			];

			echo json_encode($respuesta);
		} else {
			// no se actualizó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "No se pudo actualizar"
			];

			echo json_encode($respuesta);
		}

	} else if($_SERVER['REQUEST_METHOD'] == 'DELETE') // eliminar
	{
		// contenido de proceso DELETE
		$id = $_GET['id'];

		$resultado = eliminar($id);

		if ($resultado != null) {
			# Sí se eliminó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "Eliminación correcta" // agregar a la cadena
			];

			echo json_encode($respuesta);
		} else {
			// no se eliminó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "No se pudo eliminar" // agregar a la cadena
			];

			echo json_encode($respuesta);
		}
	} else {
		// procesar error y responder
	}
?>
