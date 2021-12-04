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

    $fecha = $_POST['fecha'];
    $nombres = $_POST['nombres'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $sexo = $_POST['sexo'];
    $edad = $_POST['edad'];
    $edo_civil = $_POST['edo_civil'];
    $curp = $_POST['curp'];
    $nivel = $_POST['nivel'];
    $grado = $_POST['grado'];

    function insertar($fecha, $nombres, $apellidoP, $apellidoM, $sexo, $edad, $edo_civil, $curp, $nivel, $grado) {
		$connect = conectar();
		$sql="INSERT INTO solicitud (fecha,nombres,apellidoP,apellidoM,sexo,edad,edo_civil,curp,nivel,grado)
			VALUES ('$fecha','$nombres','$apellidoP','$apellidoM','$sexo','$edad','$edo_civil','$curp','$nivel','$grado')";
		
		$sql = $connect->prepare($sql);
		$sql->execute();

		$id_insertado = $connect->lastInsertId();

		$connect = null;

		
	}
    insertar($fecha, $nombres, $apellidoP, $apellidoM, $sexo, $edad, $edo_civil, $curp, $nivel, $grado);
    header("Location: crud.php");
?>

