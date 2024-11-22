<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>EJERCICIO EQUIPOS FUTBOL</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <div class="container">
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_equipo=$_POST["equipo"];
            $tmp_iniciales=$_POST["iniciales"];
            $tmp_liga=$_POST["liga"];
            $tmp_fechaF=$_POST["fechaFund"];
            if(!isset($tmp_equipo)){
                $err_equipo="Es obligatorio introducir un equipo";
            }
            else{
                $patron="/^[a-zA-Z\s.]{3,20}$/";
            }



        }
        ?>
        <form action="" method="post">
            <h3>EJERCICIO EQUIPOS FUTBOL</h3>
            <br><br>
            <label for="equipo">Equipo:</label>
            <input type="text" name="equipo" id="equipo">
            <?php if (isset($err_equipo)) echo "<span class='error' style='color:red'>$err_equipo</span>"; ?>
            <br><br>
            <label for="iniciales">Iniciales:</label>
            <input type="text" name="iniciales" id="iniciales">
            <?php if (isset($err_iniciales)) echo "<span class='error' style='color:red'>$err_iniciales</span>"; ?>
            <br><br>
            <label for="liga">LIGA:</label>
            <select name="liga" id="liga">
                <option value="Liga EA sports">Liga EA sports</option>
                <option value="Liga Hypermotion">Liga Hypermotion</option>
                <option value="Primera RFEF">Primera RFEF</option>
            </select>
            <?php if (isset($err_liga)) echo "<span class='error' style='color:red'>$err_liga</span>"; ?>
            <br><br>
            <label for="fechaFund">Fecha de fundación:</label>
            <input type="date" name="fechaFund">
            <?php if (isset($err_fecha)) echo "<span class='error' style='color:red'>$err_fecha</span>"; ?>
            <br><br>
            <input type="submit" value="ENVIAR">
        </form>
    </div>
</body>
</html>