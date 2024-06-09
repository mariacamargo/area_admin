<?php
// Conectar ao banco de dados
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "carros";

$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Selecionar todos os usuários
$email = $_POST['email'];
$senha = $_POST['senha'];

$senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

// Consultar o banco de dados para obter os valores atuais do registro
$sql = "SELECT id, usu_admin, senha FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Se houver uma linha correspondente, obtém a senha criptografada do banco de dados
    $row = $result->fetch_assoc();
    $senha_hashed_db = $row['senha'];
    $id = $row['id'];
    $admin = $row['usu_admin'];

    // Verifica se a senha fornecida corresponde à senha criptografada do banco de dados
    if (password_verify($senha, $senha_hashed_db)) {
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['admin'] = $admin;
        header("Location: ../index.html");
        exit();
    } else {
        echo "<script>alert('Senha incorreta. Por favor, tente novamente.');</script>";
    }
} else {
    echo "0 resultados";
}
$conn->close();
