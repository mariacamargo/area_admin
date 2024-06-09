<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "carros";

$id = $_GET['id'];


if(isset($id) && !empty($id)) {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $id_excluir = $id;

    $sql = "DELETE FROM carros WHERE id = $id_excluir";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit;
    } else {
        echo "Erro ao excluir usuário: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID do usuário a excluir não fornecido.";
}
?>
