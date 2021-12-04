<html>
<head>
    <title>Contraseña</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>  <!--Para caracteres especiales -->
    <link rel="stylesheet" type="text/css" href="crud.css" media="screen" />
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>App productos</title>
	<!-- Importando estilos de bootstrap -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="eventos.js"></script>
	<!-- Importando jQuery -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div id="barra" style="position: fixed";>
        <style type="text/css">
			a { color: black; font-family: Calibri; font-size: large; margin-left: 40%;}
		</style>
        <a href="index.php">Regresar al Registro</a>
    </div>
    <br><br><br>

	<div class="container">
		<div class="w-100">
			<div class="text-center">
				<h1>Formulario</h1>
				<p class="text-center h3">Lista de formularios registrados</p>
			</div>
			<br>
			<table class="table table-hover table-bordered table-striped">
				<thead>
					<tr class="text-center">
						<th>Id</th>
						<th>Fecha</th>
						<th>Nombre</th>
						<th>Apellido Materno</th>
						<th>Apellido Paterno</th>
						<th>Sexo</th>
						<th>Edad</th>
						<th>Estado civil</th>
						<th>CURP</th>
						<th>Nivel</th>
						<th>Grado</th>
					</tr>
				</thead>
				<tbody id="tbl_body">
					<tr>
						<td colspan="6" class="text-center">No se encontraron registros</td>
					</tr>
				</tbody>
			</table>
			<hr>
			<div id="formulario" hidden="">
				<p class="text-center h3">Formulario de productos</p>
				<form action = "modificacion.php">
					<div class="form-group">
						<label for="id">Id</label>
						<input type="text" class="form-control" id="id" name="id" required="">
					</div>
					<div class="form-group">
						<label for="fecha">Fecha</label>
						<input type="date" class="form-control" id="fecha" name="fecha" required="">
					</div>
					<div class="form-group">
						<label for="nombres">Nombres</label>
						<input type="text" class="form-control" id="nombres" name="nombres" required="">
					</div>
					<div class="form-group">
						<label for="apellidoP">Apellido paterno</label>
						<input type="text" class="form-control" id="apellidoP" name="apellidoP" required="">
					</div>
					<div class="form-group">
						<label for="apellidoM">Apellido materno</label>
						<input type="text" class="form-control" id="apellidoM" name="apellidoM" required="">
					</div>
					<div class="form-group">
						<label for="sexo">Sexo</label>
						<SELECT NAME="sexo" size="1" class="form-control" id="sexo">
							<OPTION VALUE="H">H</OPTION>
							<OPTION VALUE="M">M</OPTION>
						</SELECT>
					</div>
					<div class="form-group">
						<label for="edad">Edad</label>
						<input type="number" class="form-control" id="edad" name="edad">
					</div>
					<div class="form-group">
						<label for="edo_civil">Estado Civil</label>
						<SELECT NAME="edo_civil" size="1" class="form-control" id="edo_civil">
							<OPTION VALUE="SOLTERO(A)">SOLTERO(A)</OPTION>
							<OPTION VALUE="CASADO(A)">CASADO(A)</OPTION>
							<OPTION VALUE="DIVORCIADO(A)">DIVORCIADO(A)</OPTION>
						</SELECT>
					</div>
					<div class="form-group">
						<label for="curp">CURP</label>
						<input type="text" class="form-control" id="curp" name="curp">
					</div>
					<div class="form-group">
						<label for="nivel">Nivel</label>
						<SELECT NAME="nivel" size="1" id="nivel" class="form-control">
							<OPTION VALUE="PRIMARIA">PRIMARIA</OPTION>
							<OPTION VALUE="SECUNDARIA">SECUNDARIA</OPTION>
							<OPTION VALUE="BACHILLERATO">BACHILLERATO</OPTION>
							<OPTION VALUE="LICENCIATURA">LICENCIATURA</OPTION>
							<OPTION VALUE="POST GRADO">POST GRADO</OPTION>
							<OPTION VALUE="NINGUNO">NINGUNO</OPTION>
						</SELECT>
					</div>
					<div class="form-group">
						<label for="grado">Grado</label>
						<input type="text" class="form-control" id="grado" name="grado">
					</div>
					<div class="text-center">
						<button type="button" class="btn btn-success" id="btn_guardar" hidden>Registrar</button>
						<button type="submit" class="btn btn-success" id="btn_editar" hidden>Cambiar</button>
						<button type="button" class="btn btn-warning" id="btn_cancelar">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
