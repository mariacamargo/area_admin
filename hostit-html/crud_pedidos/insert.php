<?php include 'conn.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['cliente_id'];
    $carro_id = $_POST['carro_id'];

    $sql = "INSERT INTO pedidos (cliente_id, carro_id, status) VALUES ('$cliente_id', '$carro_id', '$status')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../crud_pagamento/index.php");
        exit;
    } else {
        echo "Erro ao adicionar pedido: " . $conn->error;
    }
}
$conn->close();
?>
