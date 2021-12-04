<html>
<head>
    <meta http-equiv = "Content-Type" content = "text/html; charset = utf-8"/> 
    <title>Sistema de Becas</title>
    <link rel = "stylesheet" type = "text/css" href = "estilo.css" media = "screen" />
    <script>
        function validar(formulario) {
            var patt = new RegExp(/^[A-Z\s]+$/g);
            var patt2 = new RegExp(/^[A-Z\s]+$/g);
            var patt3 = new RegExp(/^[A-Z\s]+$/g);
            
            if(!patt.test(formulario.nombres.value) || !patt2.test(formulario.apellidoP.value) || 
            !patt3.test(formulario.apellidoM.value)) {
                alert("Los nombres llevan solo letras en mayúscula");
                return false;
            }
            if(formulario.edad.value >= 30) {
                alert("Mayores a 30 años no son candidatos");
                return false;
            }    
            if(formulario.edad.value < 18) {
                alert("Menores a 18 años no son candidatos");
                return false;
            }
                
            if(confirm("¿Seguro que quieres enviar tus datos?") == false) {
                return false;
            } else {
                alert("Registro hecho con éxito");
                return true;
            }    
        }

        //Función para validar una CURP
        function curpValida(curp) {
            var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
            validado = curp.match(re);
        
            if (!validado) 
                return false;
        
        //Validar que coincida el dígito verificador
            function digitoVerificador(curp17) { //Fuente https://consultas.curp.gob.mx/CurpSP/
                var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
                lngSuma      = 0.0,
                lngDigito    = 0.0;
                for(var i = 0; i < 17; i++)
                    lngSuma = lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
                lngDigito = 10 - lngSuma % 10;
                if (lngDigito == 10) return 0;
                    return lngDigito;
            }
            
            if (validado[2] != digitoVerificador(validado[1])) 
                return false;  
            return true;
        }

        //Handler para el evento cuando cambia el input
        //Lleva la CURP a mayúsculas para validarlo
        function validarInput(input) {
            var curp = input.value.toUpperCase(),
            resultado = document.getElementById("resultado"),
            valido = "No válido";
            
            if (curpValida(curp)) { // ⬅️ Acá se comprueba
                valido = "Válido";
                resultado.classList.add("ok");
            } else {
                resultado.classList.remove("ok");
            }
                
            resultado.innerText = "Formato: " + valido;
        } 
    </script>
</head>
<body>
    <div id = "barra" style = "position: fixed";>
        <a href = "crud.php">Ver Listado de Usuarios Registrados</a>
    </div>
    <br>
    <center>
        <br><br>
        <img src = "gto.png" width = "120" height = "150">
        <br><br>
        <font face = "Calibri"  size = "4">
            SOLICITUD DE BECA (formato1) <br>
            SUBSECRETARÍA PARA EL DESARROLLO EDUCATIVO
        </font>
        <br>
        <font face = "Calibri"  size = "3">
            <b>
                FORMATO PARA PLANTELES PARTICULARES INCORPORADOS DE EDUCACIÓN TIPO BÁSICO<br>
                CICLO ESCOLAR 2020-2021
            </b>
        </font>
    </center>
    <br><br><br>
    <form action = "alta.php" method = "POST" name = "formulario" onsubmit = "return validar(this);">
        <font face = "Calibri" size = 2>
            <table align = "right">
                <tr>
                    <td>   
                        <b>  
                            FECHA:<input class = fecha type = "date" name = "fecha" required>
                        </b>
                    </td>
                </tr>
            </table>
        </font><br><br><br>
        <center>
            <p style = "background-color: #a6a6a4">
                <font face = "Calibri" size = "3">
                    <b>
                        DATOS DEL SOLICITANTE
                    </b>
                </font>
            </p>
        </center>
        <center>
            <font face = "Calibri" size = 3>
                <table>
                    <tr>
                        <td>
                            <input type = "text" name = "nombres" size = "58" required> 
                        </td>
                        <td>
                            <input type = "text" name = "apellidoP" size = "58" required>
                        </td>
                        <td>
                            <input type = "text" name = "apellidoM" size = "57" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            NOMBRE(S)
                        </td>
                        <td>
                            PRIMER APELLIDO
                        </td>
                        <td>
                            SEGUNDO APELLIDO
                        </td>
                    </tr>
                </table>          
                <table>
                    <tr>
                        <td>
                            <input type = "radio" name = "sexo" value = "H" required>H
                            <input type = "radio" name = "sexo" value = "M" required>M
                        </td>
                        <td><input type = "number" name = "edad" size = "28" required></td>
                        <td>
                            <SELECT NAME = "edo_civil" size = "1" required>
                                <OPTION VALUE = "SOLTERO(A)">SOLTERO(A)</OPTION>
                                <OPTION VALUE = "CASADO(A)">CASADO(A)</OPTION>
                                <OPTION VALUE = "DIVORCIADO(A)">DIVORCIADO(A)</OPTION>
                            </SELECT>
                        </td>
                        <td><input type = "text" name = "curp" size = "31" oninput = "validarInput(this)"><pre id = "resultado"></pre></td>
                        <td>
                            <SELECT NAME = "nivel" size = "1" required>
                                <OPTION VALUE = "PRIMARIA">PRIMARIA</OPTION>
                                <OPTION VALUE = "SECUNDARIA">SECUNDARIA</OPTION>
                                <OPTION VALUE = "BACHILLERATO">BACHILLERATO</OPTION>
                                <OPTION VALUE = "LICENCIATURA">LICENCIATURA</OPTION>
                                <OPTION VALUE = "POST GRADO">POST GRADO</OPTION>
                                <OPTION VALUE = "NINGUNO">NINGUNO</OPTION>
                            </SELECT>
                        </td>
                        <td><input type = "number" name = "grado" size = "31" required></td>
                </tr> <br>
                    <tr>
                        <td>SEXO</td>
                        <td>EDAD</td>
                        <td>ESTADO CIVIL</td>
                        <td>CURP</td>
                        <td>NIVEL</td>
                        <td>GRADO</td>
                    </tr>
                </table>           
            </font> 
            <p style = "background-color: #a6a6a4">
                <font face = "Calibri" size = "4">
                    <b>
                        -----
                    </b>
                </font>
            </p>
            <input class = "enviar" id = "enviar" type = "submit"><input type = "reset">
        </center>     
    </form>
</body>
</html>