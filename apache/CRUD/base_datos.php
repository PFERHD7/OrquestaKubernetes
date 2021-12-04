<?php
    define('DB_HOST','database');
    define('DB_USER','pablo');
    define('DB_PASS','pablo123');
    define('DB_NAME','formulario');

function conectar() {
	try {
		return new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	} catch (PDOException $e) {
		exit("Error: " . $e->getMessage());
	}
}

	function buscar_todo() {
		$connect = conectar();
		$sql = "SELECT * FROM solicitud"; 
		$query = $connect -> prepare($sql); 
		$query -> execute(); 
		$results = $query -> fetchAll(PDO::FETCH_OBJ); 
		
		if (is_array($results)) {
			return $results;
		} else {
			return false;
		}
	}

	function buscar_id($id) {
		$connect = conectar();
		$sql = "SELECT * FROM solicitud where id = :id"; 
		$query = $connect->prepare($sql);
		$query->bindParam(':id', $id);
		$query->execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ); 

		if (isset($results[0]) && is_array($results)) {
			return $results[0];
		} else {
			return false;
		}
	}

	function insertar($fecha, $nombres, $apellidoP, $apellidoM, $sexo, $edad, $edo_civil, $curp, $nivel, $grado) {
		$connect = conectar();
		$sql="INSERT INTO solicitud (fecha,nombres,apellidoP,apellidoM,sexo,edad,edo_civil,curp,nivel,grado)
			VALUES ('$fecha','$nombres','$apellidoP','$apellidoM','$sexo','$edad','$edo_civil','$curp','$nivel','$grado')";
		
		$sql = $connect->prepare($sql);
		$sql->execute();

		$id_insertado = $connect->lastInsertId();

		$connect = null;

		return ($id_insertado) ? true : false;
	}

	function actualizar($id, $fecha, $nombres, $apellidoP, $apellidoM, $sexo, $edad, $edo_civil, $curp, $nivel, $grado) {
		$connect = conectar();
	
		$sql="Update solicitud SET fecha='$fecha', nombres = '$nombres', apellidoP = '$apellidoP', 
		apellidoM = '$apellidoM', sexo = '$sexo', edad = '$edad', edo_civil = '$edo_civil', curp = '$curp',
		nivel = '$nivel', grado = '$grado' where id = '$id'";
	
		echo $sql;
		$sql = $connect->prepare($sql);
		$sql->execute();

		$connect = null;

		return ($sql->rowCount() > 0) ? true : false;
	}

	function eliminar($id) {
		$connect = conectar();
		$sql="delete from solicitud where id = :id";

		$sql = $connect->prepare($sql);
		$sql->bindParam(':id', $id);

		$sql->execute();

		$connect = null;

		return ($sql->rowCount() > 0) ? true : false;
	}
?>
