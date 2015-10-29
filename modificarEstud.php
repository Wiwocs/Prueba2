<div id="content" xmlns="http://www.w3.org/1999/html">
    <script>
        function enviarformulario(tabla){
            $cod = $('.codigo option:selected').text();
            var urlAjax = "verificarMod.php?tabla="+tabla+"&cod="+$cod+"&dat1="+$('.dat1').val()+"&dat2="+$('.dat2').val()+"&dat3="+$('.dat3').val();
            urlAjax = encodeURI(urlAjax);
            console.log(urlAjax);
            $.colorbox({href: urlAjax, title: "Resultado Modificacion"});
        };
        $(document).ready(function(){
            $('#codigo').change(function(){
                var lista = $('#codigo').val().split(",");
                $('#dat1').val(lista[0]);
                $('#dat2').val(lista[1]);
                $('#dat3').val(lista[2]);
            });
        });
    </script>
    <?php

    $enlace = mysql_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
    mysql_select_db('universidad') or die('No se pudo seleccionar la base de datos');
    ?>
    <form class="formulario" method="get">
        <div id=""titulo>
            <h1>Escoja los datos del estudiante que quiere modificar</h1>
        </div>
        <div id="selector">
            <label>ID: </label>
            <select id="codigo">
                <?php
                $consulta = "SELECT * FROM estudiante;";
                $resultado = mysql_query($consulta) or die('Consulta fallida: ' . mysql_error());
                while ($linea = mysql_fetch_array($resultado)) {
                    $codigo = $linea['CODIGOESTUDIANTE'];
                    $nombre = $linea['NOMBREESTUDIANTE'];
                    $carr = $linea['CARRERA'];
                    $ano = $linea['ANO'];
                    echo "\t<option value='$nombre,$carr,$ano'>$codigo</option>option>\n";
                }
                ?>
            </select>
            </br>
            <label>Nombre Estudiante: </label>
            <input type="text" id="dat1">
            </br>
            <label>Carrera: </label>
            <input type="text" id="dat2">
            </br>
            <label>A&#241;o: </label>
            <input type="text" id="dat3">
            </br>
        </div>
        <div id="envio">
            <input type="button" value="Enviar" id="enviar" onclick="javascript:enviarformulario('profesor');"/>
        </div>
    </form>
    </br>
    <a href="index.php" style="text-align: center">Volver</a>
</div>
