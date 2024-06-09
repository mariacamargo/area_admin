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

$query_tipo = "SELECT id, tipo FROM tipo_carros";
$result_tipo = mysqli_query($conn, $query_tipo);

$query_trans = "SELECT id, tipo FROM transmissao";
$result_trans = mysqli_query($conn, $query_trans);
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

    <title>Adicionar Pessoas</title>


    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <link href="../css/font-awesome.min.css" rel="stylesheet" />

    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/responsive.css" rel="stylesheet" />


</head>

<body class="sub_page">

    <div class="hero_area">
        <!-- header section strats -->
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
        <!-- end header section -->
    </div>
    <!--------------------------------------------->

    <body>
        <section class="contact_section layout_padding-bottom">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Adicionar Carro
                    </h2>
                </div>
                <div class="row">
                    <div class="col-md-8 col-lg-6 mx-auto">
                        <div class="form_container">
                            <form action="insert.php" method="post">
                                <div>
                                    <input type="text" name="modelo" placeholder="Modelo">
                                </div>
                                <label style="font-size: 20px">Tipo: </label>
                                <select name="tipo_carros_id" style="width: 100%; 
                                border: 1px solid #b0b0b0; height: 50px;
                                margin-bottom: 25px; padding-left: 15px; background-color: white;
                                outline: none;">
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result_tipo)) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['tipo'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <div>
                                    <input type="text" name="marca" placeholder="Marca">
                                </div>
                                <div>
                                    <input type="text" name="ano" placeholder="Ano">
                                </div>
                                <div>
                                    <input type="text" name="preco" placeholder="Preco">
                                </div>
                                <div>
                                    <input type="text" name="cor" placeholder="Cor">
                                </div>
                                <label style="font-size: 20px"> Transmissao: </label>
                                <select name="transmissao_id" style="width: 100%; 
                                border: 1px solid #b0b0b0; height: 50px;
                                margin-bottom: 25px; padding-left: 15px; background-color: white;
                                outline: none;">
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result_trans)) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['tipo'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <div class="btn_box">
                                    <button type="submit">
                                        Cadastrar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/bootstrap.js"></script>
    </body>
</body>

</html>