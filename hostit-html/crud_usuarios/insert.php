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
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

// Hash da senha antes de armazenar no banco de dados
$senha_hashed = password_hash($senha, PASSWORD_DEFAULT);
$data_banco = date('Y-m-d');

// Preparar e vincular
$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, telefone, data_de_registro, senha) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiss", $nome, $email, $telefone, $data_banco, $senha_hashed);

// Executar a declaração
if ($stmt->execute() === TRUE) {
    
    $usuario_id = $conn->insert_id;
    $rua = $_POST['rua'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    
    $stmt = $conn->prepare("INSERT INTO enderecos (usuario_id, rua, cidade, estado, cep) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $usuario_id, $rua, $cidade, $estado, $cep);

    if ($stmt->execute() === TRUE){
        header("Location: ../contact.php");
        exit;
    }else {
        echo "Erro ao criar usuário: " . $stmt->error;
    }
} else {
    echo "Erro ao criar usuário: " . $stmt->error;
}

// Fechar conexão
$stmt->close();
$conn->close();
?>
