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
$sql = "SELECT * FROM avaliacoes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibir os dados em uma tabela HTML
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Cliente</th>
    <th>Carro</th>
    <th>Nota</th>
    <th>Comentario</th>
    <th>Data</th>
    <th>Ações</th>
    </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["cliente_id"]."</td>
        <td>".$row["carro_id"]."</td>
        <td>".$row["nota"]."</td>
        <td>".$row["comentario"]."</td>
        <td>".$row["data_avaliacao"]."</td>
        <td><a href='update_form.php?id=".$row["id"]."'>Editar</a> | <a href='delete.php?id=".$row["id"]."'>Deletar</a></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
$conn->close();
?>
