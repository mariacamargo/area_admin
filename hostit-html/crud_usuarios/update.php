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
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$data_registro = date('Y-m-d');

// Atualizar usuário no banco de dados
$sql_usu = "UPDATE usuarios SET nome='$nome', telefone='$telefone', data_de_registro='$data_registro' WHERE id=$id";

$cep = $_POST['cep'];
$rua = $_POST['rua'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

// Atualizar endereco no banco de dados
$sql_ende = "UPDATE enderecos SET cep='$cep', rua='$rua', cidade='$cidade', estado='$estado' WHERE usuario_id=$id";

if ($conn->query($sql_ende) === TRUE && $conn->query($sql_usu) === TRUE) {
    header("Location: ../contact.php");
    exit;
} else {
    echo "Erro ao atualizar usuário: " . $conn->error;
}

// Fechar conexão
$conn->close();
