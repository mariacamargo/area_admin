<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "carros";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 
    <link rel="icon" href="../images/fevicon.png" type="image/gif" />

    <title>Lista de Carros</title>

    <link rel="stylesheet" type="text/css" href="../css/grid.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/responsive.css" rel="stylesheet" />
</head>


<body class="sub_page">

    <div class="hero_area">

        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="../index.html">
                        <span>CARROS</span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  ml-auto">
                            <li class="nav-item ">
                                <a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../about.html"> Nossa História</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../service.php">Modelos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../price.html">Serviços</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="../contact.php">Login</a>
                            </li>
                        </ul>
                        <div class="quote_btn-container">
                            <form class="form-inline">
                                <button class="btn   nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call : +55 123455678990
                                </span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </div>

    <?php

    $id = $_GET['id'];

    $sql = "SELECT c.*, tc.tipo AS tipo_carro, t.tipo AS tipo_transmissao
            FROM carros c
            INNER JOIN tipo_carros tc ON c.tipo_carros_id = tc.id
            INNER JOIN transmissao t ON c.transmissao_id = t.id
            WHERE c.tipo_carros_id = $id";
            
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Lista de Carros</h2>";
        echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Modelo</th>
    <th>Tipo</th>
    <th>Marca</th>
    <th>Ano</th>
    <th>Preço</th>
    <th>Cor</th>
    <th>Transmissão</th>
    </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["modelo"] . "</td>
        <td>" . $row["tipo_carro"] . "</td>
        <td>" . $row["marca"] . "</td>
        <td>" . $row["ano"] . "</td>
        <td>" . $row["preco"] . "</td>
        <td>" . $row["cor"] . "</td>
        <td>" . $row["tipo_transmissao"] . "</td>
        </tr>";
        }
        echo "</table>";
    } else {
        echo "0 resultados";
    }
    $conn->close();
    ?>

</body>

</html>