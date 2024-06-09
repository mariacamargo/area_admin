<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "carros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista de Pagamentos</title>
    <link rel="stylesheet" type="text/css" href="../css/grid.css">
</head>

<body>
    <?php
    $sql = "SELECT * FROM pagamentos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Pedido</th>
    <th>Valor</th>
    <th>Metodo</th>
    <th>Data Pagamento</th>
    </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["pedido_id"] . "</td>
        <td>" . $row["valor"] . "</td>
        <td>" . $row["metodo_pagamento"] . "</td>
        <td>" . $row["data_pagamento"] . "</td>
        </tr>";
        }
        echo "</table>";
    } else {
        echo "0 resultados";
    }
    $conn->close();
    ?>
</body>

</html>