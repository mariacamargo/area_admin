<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "carros";

// Verificar se todos os campos obrigatórios foram enviados e não estão vazios
if(isset($_POST['id'], $_POST['cliente_id'], $_POST['carro_id'], $_POST['nota'], $_POST['comentario']) &&
!empty($_POST['id']) && !empty($_POST['cliente_id']) && !empty($_POST['carro_id']) &&
!empty($_POST['nota']) && !empty($_POST['comentario']) ) {
    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Receber dados do formulário
    $id = $_POST['id'];
    $cliente_id = $_POST['cliente_id'];
    $carro_id = $_POST['carro_id'];
    $nota = $_POST['nota'];
    $comentario = $_POST['comentario'];
    $data_avaliacao = date('Y-d-m');

    // Atualizar usuário no banco de dados
    $sql = "UPDATE avaliacoes SET cliente_id='$cliente_id', carro_id='$carro_id', nota='$nota', comentario='$comentario', 
    data_avaliacao='$data_avaliacao' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit;
    } else {
        echo "Erro ao atualizar usuário: " . $conn->error;
    }

    // Fechar conexão
    $conn->close();
} else {
    echo "Dados do formulário incompletos ou vazios.";
}
?>
