
$(document).ready(function(){
	// se manda llamar en cuanto carga la página
	obtener_formulario();

	// botón agregar - mostrar formulario para registrar
	$("#btn_agregar").click(function() {
		$("#formulario").attr('hidden', false);
		$("#btn_guardar").attr('hidden', false);
		$("#btn_editar").attr('hidden', false);
		
	});

	// accion de registro (web service)
	$("#btn_guardar").click(function() {
		registrar_formulario();
	});

	// accion de edición (web service)
	$("#btn_editar").click(function() {
		
	});
    $("#btn_cancelar").click(function() {
		$("#formulario").attr('hidden', true);
		$("#btn_guardar").attr('hidden', true);
	});
});


/* LIMPIAR EL FORMULARIO */
function limpiar_formulario() {
	
}
function recargar(){
    location.reload();
}
function obtener_formulario() {
	// COMPLETAR - CONFIGURAR LA SOLICITUD AJAX
	$.ajax({
        url: 'solicitudes.php', // Dónde está mi web service
        type: "GET", // MÉTODO DE ACCESO
        dataType: "JSON", // FORMATO DE LOS DATOS
        success: function (data) {
        	// COMPLETAR - VERIFICAR QUE EXISTAN LOS PRODUCTOS
            if (data.solicitud) {
            	// COMPLETAR - LOS DATOS EN LA TABLA
                mostrar_formularios(data.solicitud);
            } else {
                alert("No se obtuvieron datos");
            	$("#tbl_body").html("<tr><td colspan='6' class='text-center'>No se encontraron formularios</td></tr>");
            }
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error! " + status);
            console.log(xhr);
        }
    });
}

function mostrar_formularios(solicitud) {
	let html = '';
	for (let index in solicitud) {
		html += "<tr class='text-center'>" +
				"<td>"+solicitud[index].id+"</td>" +
                "<td>"+solicitud[index].fecha+"</td>" +
                "<td>"+solicitud[index].nombres+"</td>" +
				"<td>"+solicitud[index].apellidoP+"</td>" +
				"<td>"+solicitud[index].apellidoM+"</td>" +
				"<td>"+solicitud[index].sexo+"</td>" +
				"<td>"+solicitud[index].edad+"</td>" +
				"<td>"+solicitud[index].edo_civil+"</td>" +
                "<td>"+solicitud[index].curp+"</td>" +
                "<td>"+solicitud[index].nivel+"</td>" +
                "<td>"+solicitud[index].grado+"</td>" +
				"<td><button type=\"button\" class=\"btn btn-sm btn-warning\" onclick=\"cargar_formulario('"+solicitud[index].id+"')\">Editar</button>" +
				"<button type=\"button\" class=\"btn btn-sm btn-danger\" onclick=\"eliminar_formulario('"+solicitud[index].id+"')\">Eliminar</button></td>" +
			"</tr>";
	}

	$("#tbl_body").html(html);
}

function registrar_formulario() {
	// COMPLETAR - DEFINIR EL JSON A ENVIAR CON LOS DATOS DEL PRODUCTO
	let json_producto = {
    	id: $("#id").val(),
        fecha: $("#fecha").val(),
        nombres: $("#nombres").val(),
        apellidoP: $("#apellidoP").val(),
        apellidoM: $("#apellidoM").val(),
        sexo: $("#sexo").val(),
        edad: $("#edad").val(),
        edo_civil: $("#edo_civil").val(),
        curp: $("#curp").val(),
        nivel: $("#nivel").val(),
        grado: $("#grado").val()
    };

	$.ajax({
        url: 'solicitudes.php',
        type: "POST",
        // COMPLETAR - ENVIAR EL JSON DEL PRODUCTO
        data: JSON.stringify(json_producto), // CONVERTIR EN STRING JSON
        success: function (data) {
        	// COMPLETAR - PROCESAR RESPUESTA
            alert(data.mensaje);

            // cargar de nuevo la página
            location.reload();
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error! " + status);
            console.log(xhr);
        }
    });
}

function cargar_formulario(id) {
	$("#formulario").attr('hidden', false);
	$("#btn_guardar").attr('hidden', true);
	$("#btn_editar").attr('hidden', false);

	$.ajax({
        url: 'solicitudes.php',
        type: "GET",
        // COMPLETAR - ENVIAR EL FOLIO
        data: {
            id: id
        },
        success: function (data) {
        	// COMPLETAR - VERIFICAR QUE EXISTA EL PRODUCTO
            if (data.solicitud) {
            	let solicitud = data.solicitud;
                // COMPLETAR - CARGAR LOS DATOS EN EL FORMULARIO
                $("#id").val(solicitud.id);
                $("#fecha").val(solicitud.fecha);
                $("#nombres").val(solicitud.nombres);
                $("#apellidoP").val(solicitud.apellidoP);
                $("#apellidoM").val(solicitud.apellidoM);
                $("#sexo").val(solicitud.sexo);
                $("#edad").val(solicitud.edad);
                $("#edo_civil").val(solicitud.edo_civil);
                $("#curp").val(solicitud.curp);
                $("#nivel").val(solicitud.nivel);
                $("#grado").val(solicitud.grado);
            } else {
            	alert('No se encontró la solicitud');
            }
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error! " + status);
            console.log(xhr);
        }
    });
}

function actualiza_formulario() {
	// COMPLETAR - DEFINIR EL JSON A ENVIAR CON LOS DATOS DEL PRODUCTO
	let json_formulario = {
        id: $("#id").val(),
        fecha: $("#fecha").val(),
        nombres: $("#nombres").val(),
        apellidoP: $("#apellidoP").val(),
        apellidoM: $("#apellidoM").val(),
        sexo: $("#sexo").val(),
        edad: $("#edad").val(),
        edo_civil: $("#edo_civil").val(),
        curp: $("#curp").val(),
        nivel: $("#nivel").val(),
        grado: $("#grado").val()
    };
	$.ajax({
        url: 'solicitudes.php',
        type: "PUT",
        // COMPLETAR - ENVIAR EL JSON DEL PRODUCTO
        data: JSON.stringify(json_formulario), // CONVERTIR EN STRING JSON
        success: function (data) {
        	// COMPLETAR - PROCESAR RESPUESTA
            alert(data.mensaje);
            location.reload();
        },
        error: function (xhr, status) {
            location.reload();
            console.log(xhr);
        }
    });
}

function eliminar_formulario(id) {
	if (confirm('¿Está seguro de eliminar el registro con id: ' + id + '?')) {
		$.ajax({
			// COMPLETAR - ENVIAR EL FOLIO EN LA URL
	        url: 'solicitudes.php?id=' + id,
	        type: "DELETE",
	        success: function (data) {
	        	// COMPLETAR - PROCESAR RESPUESTA
                alert(data.mensaje);

                location.reload();
	            
	        },
	        error: function (xhr, status) {
	            alert("Ha ocurrido un error! " + status);
	            console.log(xhr);
	        }
	    });
	} else {
		return false;
	}
}
