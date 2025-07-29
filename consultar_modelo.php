<!-- consultar_modelo.php -->
<?php
// Conexión a la base de datos (ajusta los valores a tu entorno)
$conexion = new mysqli("localhost", "root", "", "diamante");

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta SQL
$sql = "SELECT id_modelo, nombre_modelo, descripcion FROM modelo";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Modelos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef7ff;
            max-width: 700px;
            margin: 40px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h1 {
            text-align: center;
            color: #003366;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #aaa;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .volver {
            margin-top: 30px;
            text-align: center;
        }
        .volver a {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .volver a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h1>Consulta de Modelos</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre del Modelo</th>
        <th>Descripción</th>
    </tr>
    <?php
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila["id_modelo"] . "</td>";
            echo "<td>" . $fila["nombre_modelo"] . "</td>";
            echo "<td>" . $fila["descripcion"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No hay datos.</td></tr>";
    }

    $conexion->close();
    ?>
</table>

<div class="volver">
    <a href="consultas.html">← Volver a Consultas</a>
</div>

</body>
</html>
