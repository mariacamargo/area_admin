<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "carros";

$id = $_GET['id'];

// Verificar se o ID do usuário foi enviado
if(isset($id) && !empty($id)) {
    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Receber o ID do usuário a ser excluído
    $id_excluir = $id;

    // Excluir o usuário do banco de dados
    $sql = "DELETE FROM avaliacoes WHERE id = $id_excluir";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit;
    } else {
        echo "Erro ao excluir usuário: " . $conn->error;
    }

    // Fechar conexão
    $conn->close();
} else {
    echo "ID do usuário a excluir não fornecido.";
}
?>
