<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>EJERCICIO VIDEOJUEGOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
    <!--Crear formulario y su validacion, patrones(videojuegos)
    titulo: entre 1 y 60 caracteres(letras o numeros)
    consola(radio button); 
    PC, Nintendo Switch, PS4, PS5, XBOX Series X, XBOX Series S)
    Descripcion(text area):opcional, y maximo 255 caracteres. 
    solo admite letras, numeros, comas y puntos.
    Fecha de lanzamiento: entre 1de enero de 1947 y dentro de 10 años(dinamico)
    
    -->
    <style>
        nav {
            display: grid;
            grid-template-columns: 2fr 2fr 2fr 2fr 2fr 2fr 2fr;
        }

        .boton {
            height: 50px;
            width: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_titulo = $_POST["titulo"];
            if(isset($_POST["consola"])) {
                $tmp_consola=$_POST["consola"];
                $consola=$tmp_consola;
            }elseif(!isset($_POST["consola"])){
                //error consola
                $err_consola = "Es obligatorio escoger una consola"; 
            }
            $tmp_descripcion = $_POST["descripcion"];
            $tmp_fechaL = $_POST["fechaL"];
            if ($tmp_titulo == '') {
                $err_titulo = "El título es obligatorio";
            } else {
                $patron = "/^[a-zA-Z0-9 ]{1,60}$/";
                if (!preg_match($patron, $tmp_titulo)) {
                    $err_titulo = "El título puede tener 60 caracteres como máximo, 
                    solo admite letras y números";
                } else {
                    $titulo = $tmp_titulo;
                }
            }
            
            //error descripcion
            if (strlen($tmp_descripcion) > 60) {
                $err_descripcion = "La descripción no puede superar los 60 caractereces";
            }

            //Fecha de lanzamiento: entre 1de enero de 1947 y dentro de 10 años(dinamico)
            if ($tmp_fechaL == '') {
                $err_fechaL = "La fecha de lanzamiento es obligatoria";
            } else {
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if (!preg_match($patron, $tmp_fechaL)) {
                    $err_fechaL = "El formato de la fecha es incorrecto";
                } else {
                    $fecha_actual = date("Y-m-d");
                    list($year_actual, $mes_actual, $dia_actual) = explode('-', $fecha_actual);
                    $fecha_inicial = date("1947-01-01");
                    list($year_inicial, $mes_inicial, $dia_inicial) = explode('-', $fecha_inicial);
                    $year10 = $year_actual + 10;
                    $fecha10 = date("$year10-$mes_actual-$dia_actual");
                    list($year10, $mes10, $dia10) = explode('-', $fecha10);
                    list($yearL, $mesL, $diaL) = explode('-', $tmp_fechaL);
                    if ($yearL > $year10) {
                        $err_fechaL = "La fecha futura que has seleccionado es mayor a 10 años de la actual,
                        por favor, pon una fecha que no sea mayor a 10 años de la actual";
                    } elseif ($yearL < $year_inicial) {
                        $err_fechaL = "El primer videojuego se inventó en 1947, 
                        por favor pon una fecha a partir de ese año";
                    } else {
                        if ($yearL == $year10 && $mesL > $mes_actual) {
                            $err_fechaL = "La fecha futura que has seleccionado es mayor a 10 años de la actual,
                            por favor, pon una fecha que no sea mayor a 10 años de la actual";
                        } else {
                            if ($yearL == $year10 && $mesL == $mes_actual && $diaL > $dia_actual) {
                                $err_fechaL = "La fecha futura que has seleccionado es mayor a 10 años de la actual,
                                por favor, pon una fecha que no sea mayor a 10 años de la actual";
                            }else{
                                $fechaL=$tmp_fechaL;
                            }
                        }
                    }
                }
            }
        }
        ?>
        <form action="" method="post">
            <h1>EJERCICIO CLASE FORMULARIO VIDEOJUEGOS</h1>
            <br><br>

            <h3>TITULO:</h3>
            <input type="text" name="titulo">
            <?php if (isset($err_titulo)) echo "<span class='error' style='color:red'>$err_titulo</span>"; ?>
            <br><br>
            <nav>
                <h3>CONSOLA:</h3>
                <label>
                    <p>PC</p>
                    <input type="radio" name="consola" value="PC">
                </label>
                <label>
                    <p>Nintendo Switch</p>
                    <input type="radio" name="consola" value="Nintendo Switch">
                </label>
                <label>
                    <p>PS4</p>
                    <input type="radio" name="consola" value="PS4">
                </label>
                <label>
                    <p>PS5</p>
                    <input type="radio" name="consola" value="PS5">
                </label>
                <label>
                    <p>XBOX Series X</p>
                    <input type="radio" name="consola" value="XBOX Series X">
                </label>
                <label>
                    <p>XBOX Series S</p>
                    <input type="radio" name="consola" value="XBOX Series S">
                </label>
                <br>
                <?php if (isset($err_consola)) echo "<span class='error' style='color:red'>$err_consola</span>"; ?>
                <br>
            </nav>
            <br><br>
            <h3>DESCRIPCIÓN(opcional):</h3>
            <textarea name="descripcion" rows="6px" cols="100" placeholder="No hay descripción"></textarea>
            <?php if (isset($err_descripcion)) echo "<span class='error' style='color:red'>$err_descripcion</span>"; ?>
            <br><br>
            <h3>FECHA DE LANZAMIENTO:</h3>
            <input type="date" name="fechaL">
            <?php if (isset($err_fechaL)) echo "<span class='error' style='color:red'>$err_fechaL</span>"; ?>
            <br><br>
            <input class="boton" type="submit" value="Registrar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>