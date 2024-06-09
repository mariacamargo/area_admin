<?php
session_start();

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
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// Consulta para verificar se o usuário existe no banco de dados
$stmt = $conn->prepare("SELECT id, senha FROM usuarios WHERE nome = ? OR email = ?");
$stmt->bind_param("ss", $usuario, $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // Usuário encontrado
    $row = $result->fetch_assoc();
    $senha_hashed = $row['senha'];

    // Verificar se a senha está correta
    if (password_verify($senha, $senha_hashed)) {
        // Senha correta, redirecionar para página de sucesso ou outra página
        $_SESSION['usuario_id'] = $row['id'];
        header("Location: pagina_de_sucesso.php");
    } else {
        // Senha incorreta
        echo "Senha incorreta. Tente novamente.";
    }
} else {
    // Usuário não encontrado
    echo "Nome de usuário ou email não encontrado.";
}

// Fechar conexão
$stmt->close();
$conn->close();
?>
