<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Ticket</title>
    <link href="estilo1.css" type="text/css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Ticket</h1>        
    </header>
    <h2>Creacion de Ticket</h2>
    <?php
        include 'conexionBD.php';        
        $placa=isset($_POST["placa"]) ? mb_strtoupper(trim($_POST["placa"]),"UTF-8"):null;
        $cedula=isset($_POST["cedula"]) ? mb_strtoupper(trim($_POST["cedula"]),"UTF-8"):null;
        date_default_timezone_set("America/Guayaquil");
        $modificacion=date('Y-m-d',time());
        $sql="INSERT INTO ticket VALUES(0,'$cedula','$placa','$modificacion',null)";               
        if($conn->query($sql)===TRUE){
            echo "<p>Se ha creado el ticket</p>";
        }else{
            if($conn->errno ==1062){
                echo "<p class='error'>El ticket ya esta registrada en el sistema</p>";
                
            }else{
                echo"<p class='error' Error: ".mysql_error($conn). "</p>";
            }
        }        
        $conn->close();
        echo "<button><a href='index.php'>Regresar</a></button> "
    ?>   
</body>
</html>
