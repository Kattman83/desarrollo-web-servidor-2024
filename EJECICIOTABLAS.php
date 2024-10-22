<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>TABLAS MULTIPLICAR</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
    <style>
        section{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            padding:100px;
        }
        @media (max-width:780px){
            section{
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr 1fr 1fr 1fr;
            padding:20px;
        }
        }

    </style>
</head>
<body>
    <h1>Tablas de Multiplicar</h1>
    <section>
    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo "<div class='tabla'>
                <h2>Tabla del $i</h2>
                <table border=1px black>";
    
        for ($j = 1; $j <= 10; $j++) {
            $resultado = $i * $j;
            echo "<tr>
                    <td>$i x $j = $resultado</td>
                  </tr>";
        }
        echo "    </table>
              </div>";
    }
    
    // Finalizamos el HTML
    echo "</body>
    </html>";
    ?>
    </section>
</body>
</html>