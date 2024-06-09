<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "carros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

session_start();

$cliente_id = $_SESSION['id'];

$query = "SELECT MAX(id) as id FROM pedidos WHERE cliente_id = $cliente_id";
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $query_ped = "SELECT pedidos.*, carros.preco 
          FROM pedidos 
          INNER JOIN carros ON pedidos.carro_id = carros.id 
          WHERE pedidos.id = " . $row["id"];
    $result_ped = mysqli_query($conn, $query_ped);
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="../images/fevicon.png" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Pagamento</title>


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

    <body>
        <section class="contact_section layout_padding-bottom">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Pagamento
                    </h2>
                </div>
                <div class="row">
                    <div class="col-md-8 col-lg-6 mx-auto">
                        <div class="form_container">
                            <form action="insert.php" method="post">
                                <?php
                                if ($result_ped->num_rows > 0) {
                                    $row_ped = mysqli_fetch_assoc($result_ped);

                                    echo "Pedido: <input type='text' name='pedido_id' value='" . $row_ped['id'] . "'><br>";
                                    echo "Valor: <input type='text' name='valor' value='" . $row_ped['preco'] . "'><br>";
                                    echo "Metodo: <input type='text' name='metodo_pagamento'><br>";
                                } else {
                                    echo "Nenhum resultado encontrado.";
                                }
                                ?>

                                <div class="btn_box">
                                    <button type="submit">
                                        Pagar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</body>

</html>