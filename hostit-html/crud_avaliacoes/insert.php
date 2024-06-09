<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "carros";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receber dados do formulário
$cliente_id = $_POST['cliente_id'];
$carro_id = $_POST['carro_id'];
$nota = $_POST['nota'];
$comentario = $_POST['comentario'];
$data_avaliacao = date('Y-m-d');

// Preparar e vincular
$stmt = $conn->prepare("INSERT INTO avaliacoes (cliente_id, carro_id, nota, comentario, data_avaliacao) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("iiiss", $cliente_id, $carro_id, $nota, $comentario, $data_avaliacao);

// Executar a declaração
if ($stmt->execute() === TRUE) {
    header("Location: ../contact.php");
    exit;
} else {
    echo "Erro ao criar usuário: " . $stmt->error;
}

// Fechar conexão
$stmt->close();
$conn->close();
?>
