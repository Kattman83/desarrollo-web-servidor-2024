<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Plantilla 2</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action="" method="post">
        <label for="numerito">METER NUMERO</label>
        <input type="number" name="numerito" id="numerito"><br><br>
        <label for="tipo">TIPO</label>
        <select name="tipo" id="tipo">
            <option value="par">PAR</option>
            <option value="primo">PRIMO</option>
            
        </select><br><br>
        <input type="submit" value="COMPROBAR">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $numerito=$_POST["numerito"];
        $tipo=$_POST["tipo"];

        if($tipo=="par"){
            if($numerito%2==0){
                echo "<p>El numero $numerito es par</p>";
            }
            else{
                echo "<p>El numero $numerito NO es par</p>";
            }
        }
        if($tipo=="primo"){
            function esPrimo($num){
                $esPrimo=true;
                for($i=2;$i<= sqrt($num);$i++){
                    if($num%$i==0){
                    return false;
                    }
                }
            return true;
            }
            if(esPrimo($numerito)){
                echo "<p>El numero $numerito es primo</p>";
            }
            else{
                echo "<p>El numero $numerito NO es par</p>";
            }
        }
    }
            
    
    ?>
</body>
</html>