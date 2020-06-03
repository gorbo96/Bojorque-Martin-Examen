<?php 
include "conexionBD.php";
$cedula = $_GET['cedula']; 
$sql = "SELECT us.usu_cedula,us.usu_nombre,us.usu_direccion,us.usu_telefono,vh.veh_placa,vh.veh_marca,vh.veh_modelo,tc.tck_fecha_ingreso,tc.tck_fecha_salida FROM usuario us NATURAL JOIN vehiculo vh NATURAL JOIN ticket tc WHERE us.usu_cedula LIKE concat('$cedula','%')"; //cambiar la consulta para puede buscar por ocurrencias de letras
$result = $conn->query($sql);
echo " <table> <tr> <th>Cedula</th> <th>Nombre Cliente</th> <th>Direccion Cliente</th> <th>Telefono Cliente</th> <th>Placa Vehiculo</th> <th>Marca Vehiculo</th> <th>Modelo Vehiculo</th> <th>Fecha Ingreso</th><th>Fecha Salida</th></tr>";
if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {        
        echo "<tr>";        
        echo " <td  align=center>" . $row['usu_cedula'] . "</td>";
        echo " <td  align=center>" . $row['usu_nombre'] . "</td>";
        echo " <td  align=center>" . $row['usu_direccion'] . "</td>";
        echo " <td  align=center>" . $row['usu_telefono'] . "</td>";
        echo " <td  align=center>" . $row['veh_placa'] . "</td>";
        echo " <td  align=center>" . $row['veh_marca'] . "</td>";        
        echo " <td  align=center>" . $row['veh_modelo'] . "</td>";
        echo " <td  align=center>" . $row['tck_fecha_ingreso'] . "</td>";
        echo " <td  align=center>" . $row['tck_fecha_salida'] . "</td>";
         echo "</tr>";
    }
} else {
    echo "<tr>";
    echo " <td colspan='10'> No existen usuarios registradas en el sistema </td>";
    echo "</tr>";
}
echo "</table>";
 $conn->close();
?>