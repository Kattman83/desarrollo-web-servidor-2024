<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Usuario</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tmp_usuario=$_POST["usuario"];
        $tmp_nombre=$_POST["nombre"];
        $tmp_apellidos=$_POST["apellidos"];
        $tmp_fecha_nacimiento=$_POST["fecha_nacimiento"];

        //comporbar usuario
        if($tmp_usuario=''){
            $err_usuario="El usuario es obligatorio";
        }else{
            $patron="/^[a-zA-Z0-9_]{4,12}$/";
            if(!preg_match($patron,$tmp_usuario)){
                $err_usuario="El usuario debe teenr 4 a 12 caracteres y contener letras, números o barrabaja";
            }else{
                $usuario=$tmp_usuario;
            }
        }

        //comprobar nombre
        if($tmp_nombre=''){
            $err_nombre="El nombre es obligatorio";
        }else{
            
            if(strlen($tmp_nombre)<2 || strlen($tmp_nombre)>30){
                $err_nombre="El nombre debe tener  de 2 a 30 caracteres";
            }else{
                $patron="/^[a-zA-Z\ áéíóúÁÉÍÓÚ]+$/";
                if(!preg_match($patron, $tmp_nombre)){
                    $err_nombre="El nombre solo puede contener letras o espacios en blanco";
                }else{
                    $nombre=$tmp_nombre;
                }
            }
        }

        //comprobar apellidos
        if($tmp_apellidos=''){
            $err_apellidos="El nombre es obligatorio";
        }else{
            
            if(strlen($tmp_apellidos)<2 || strlen($tmp_apellidos)>30){
                $err_apellidos="El nombre debe tener  de 2 a 30 caracteres";
            }else{
                $patron="/^[a-zA-Z\ áéíóúÁÉÍÓÚ]+$/";
                if(!preg_match($patron, $tmp_apellidos)){
                    $err_apellidos="El nombre solo puede contener letras o espacios en blanco";
                }else{
                    $apellidos=$tmp_apellidos;
                }
            }
        }

        //comporbar fecha de nacimiento
        if($tmp_fecha_nacimiento==''){
            $err_fecha_nacimiento="La fecha de nacimiento es obligatoria";
        }else{
            $patron="[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if(!preg_match($patron,$tmp_fecha_nacimiento)) {
                $err_fecha_nacimiento="El formato de la fecha es incorrecto";
            } else {
                $fecha_actual=date("Y-m-d");
                list($anno_actual,$mes_actual,$dia_actual)=explode('-',$fecha_actual);
                list($anno_nacimiento,$mes_nacimiento,$dia_nacimiento)=explode('-',$tmp_fecha_nacimiento);
                if($anno_actual-$anno_nacimiento>120){
                    $err_fecha_nacimiento="La fecha de nacimiento introducida no es valido";
                }elseif($anno_actual-$anno_nacimiento=120&&$mes_actual>$mes_nacimiento){
                    $err_fecha_nacimiento="La fecha de nacimiento introducida no es valida";
                }elseif($anno_actual-$anno_nacimiento=120&&$mes_actual=$mes_nacimiento&&$dia_actual>=$dia_nacimiento){
                    $err_fecha_nacimiento="La fecha de nacimiento introducida no es valida";
                }else{
                    $fecha_nacimiento=$tmp_fecha_nacimiento;
                }
            }
        }
        
    }
    ?>
    <form action="" method="post">
        <input type="text" name="usuario" id="usuario " placeholder="Usuario"><br><br>
        <?php if(isset($tmp_usuario)) echo "<span class='error'>$err_usuario</span>"; ?>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre"><br><br>
        <?php if(isset($tmp_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos"><br><br>
        <?php if(isset($tmp_apellidos)) echo "<span class='error'>$err_apellidos</span>"; ?>
        <label>Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" ><br><br>
        <input type="submit" value="REGISTRARSE" ><br><br>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
    }
    ?>
</body>
</html>