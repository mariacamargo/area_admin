<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "carros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id = $_POST['id'];
$modelo = $_POST['modelo'];
$tipo_carros_id = $_POST['tipo_carros_id'];
$marca = $_POST['marca'];
$ano = $_POST['ano'];
$preco = $_POST['preco'];
$cor = $_POST['cor'];
$transmissao = $_POST['transmissao_id'];

$sql = "UPDATE carros SET modelo='$modelo', tipo_carros_id='$tipo_carros_id', marca='$marca', ano='$ano', preco='$preco', 
    cor='$cor', transmissao_id='$transmissao' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: read.php");
    exit;
} else {
    echo "Erro ao atualizar usuário: " . $conn->error;
}

$conn->close();
