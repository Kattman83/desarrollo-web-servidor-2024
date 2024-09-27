<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
    $numero=0;
    if($numero > 0){
        echo "<p>El número es positivo</p>";
    }elseif($numero==0){
        echo "<p>El número es cero</p>";
    }else{
        echo "<p>El número no es positivo</p>";
    }


    if($numero>0) echo "<p>El número es positivo</p>";
    elseif($numero==0) echo "<p>El número es cero</p>";
    else echo "<p>El número no es positivo</p>";


    if($numero > 0):
        echo "<p>El número es positivo</p>";
    elseif($numero==0):
        echo "<p>El número es cero</p>";
    else:
        echo "<p>El número no es positivo</p>";
    endif;
    ?>
</body>
</html>