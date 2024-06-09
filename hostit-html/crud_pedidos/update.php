<?php include 'conn.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $sql = "UPDATE pedidos SET status='Aprovado' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao atualizar pedido: " . $conn->error;
    }
}

$conn->close();
?>
