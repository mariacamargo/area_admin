<?php include 'conexao2.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Avaliação</title>
</head>
<body>
    <h2>Adicionar Avaliação</h2>
    <form action="insert.php" method="post">
        Cliente ID: <input type="text" name="cliente_id"><br>
        Carro ID: <input type="text" name="carro_id"><br>
        Nota: <input type="number" name="nota" min="1" max="5"><br>
        Comentário: <textarea name="comentario"></textarea><br>
        Data da Avaliação: <input type="date" name="data_avaliacao"><br>
        <input type="submit" value="Adicionar">
    </form>
</body>
</html>
