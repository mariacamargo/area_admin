<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "carros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$modelo = $_POST['modelo'];
$tipo_carros_id = $_POST['tipo_carros_id'];
$marca = $_POST['marca'];
$ano = $_POST['ano'];
$preco = $_POST['preco'];
$cor = $_POST['cor'];
$transmissao = $_POST['transmissao_id'];

$stmt = $conn->prepare("INSERT INTO carros (modelo, tipo_carros_id, marca, ano, preco, cor, transmissao_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sissssi", $modelo, $tipo_carros_id, $marca, $ano, $preco, $cor, $transmissao);

if ($stmt->execute() === TRUE) {
    header("Location: read.php");
    exit;
} else {
    echo "Erro ao criar usuário: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
