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

// Verificar se o ID foi fornecido
if (!isset($_GET['id'])) {
    echo "ID não fornecido!";
    exit;
}

$id = $_GET['id'];

// Consultar o banco de dados para obter os valores atuais do registro
$sql = "SELECT * FROM avaliacoes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Preencher os valores nos campos do formulário
    $cliente_id = $row['cliente_id'];
    $carro_id = $row['carro_id'];
    $nota = $row['nota'];
    $comentario = $row['comentario'];
    // Não preenchemos a senha por motivos de segurança
} else {
    echo "Registro não encontrado!";
    exit;
}

// Fechar a conexão
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Usuário</title>
</head>
<body>
    <h1>Atualizar Usuário</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Cliente: <input type="text" name="cliente_id" value="<?php echo $cliente_id; ?>"><br>
        Carro: <input type="text" name="carro_id" value="<?php echo $carro_id; ?>"><br>
        Nota: <input type="text" name="nota" value="<?php echo $nota; ?>"><br>
        Comentario: <input type="text" name="comentario" value="<?php echo $comentario; ?>"><br>
        <!-- Você pode incluir outros campos aqui -->
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
