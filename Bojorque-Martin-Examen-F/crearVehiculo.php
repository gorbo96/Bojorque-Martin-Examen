<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Vehiculos</title>
    <link href="estilo1.css" type="text/css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Vehiculo</h1>        
    </header>
    <h2>Creacion de Vehiculo</h2>
    <?php
        include 'conexionBD.php';
        $cedula=isset($_POST["cedula"]) ? trim($_POST["cedula"]):null;
        $placa=isset($_POST["placa"]) ? mb_strtoupper(trim($_POST["placa"]),"UTF-8"):null;
        $modelo=isset($_POST["modelo"]) ? mb_strtoupper(trim($_POST["modelo"]),"UTF-8"):null;
        $marca=isset($_POST["marca"]) ? mb_strtoupper(trim($_POST["marca"]),"UTF-8"):null;
        $sql="INSERT INTO vehiculo VALUES('$cedula','$placa','$marca','$modelo')";       
        
        if($conn->query($sql)===TRUE){
            echo "<p>Se ha creado los datos del vehiculo</p>";
        }else{
            if($conn->errno ==1062){
                echo "<p class='error'>El vehiculo ya esta registrada en el sistemas </p>";
                
            }else{
                echo"<p class='error' Error: ".mysql_error($conn). "</p>";
            }
        }        
        $conn->close();
        echo "<button><a href='index.php'>Regresar</a></button> "
    ?>   
</body>
</html>
