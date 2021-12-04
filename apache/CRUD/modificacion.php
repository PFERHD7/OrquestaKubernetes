<?php
error_reporting(0);
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
	
	$id = ($_GET['id']);
    $fecha = ($_GET['fecha']);
	$nombres = ($_GET['nombres']);
	$apellidoP = ($_GET['apellidoP']);
    $apellidoM = ($_GET['apellidoM']);
    $sexo = ($_GET['sexo']);
    $edad = ($_GET['edad']);
	$edo_civil = ($_GET['edo_civil']);
    $curp = ($_GET['curp']);
    $nivel = ($_GET['nivel']);
    $grado = ($_GET['grado']);
	
	function actualizar($id, $fecha, $nombres, $apellidoP, $apellidoM, $sexo, $edad, $edo_civil, $curp, $nivel, $grado) {
		$connect = conectar();
	
		$sql="Update solicitud SET fecha='$fecha', nombres = '$nombres', apellidoP = '$apellidoP', 
		apellidoM = '$apellidoM', sexo = '$sexo', edad = '$edad', edo_civil = '$edo_civil', curp = '$curp',
		nivel = '$nivel', grado = '$grado' where id = '$id'";
	
		
		$sql = $connect->prepare($sql);
		$sql->execute();

		$connect = null;

	}
	actualizar($id, $fecha, $nombres, $apellidoP, $apellidoM, $sexo, $edad, $edo_civil, $curp, $nivel, $grado);
	header("Location: crud.php");
?>