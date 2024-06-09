<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "carros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$pedido_id = $_POST['pedido_id'];
$valor = $_POST['valor'];
$metodo_pagamento = $_POST['metodo_pagamento'];

$stmt = $conn->prepare("INSERT INTO pagamentos (pedido_id, valor, metodo_pagamento) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $pedido_id, $valor, $metodo_pagamento);

if ($stmt->execute() === TRUE) {
    header("Location: ../index.html");
    exit;
} else {
    echo "Erro ao criar usuário: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
