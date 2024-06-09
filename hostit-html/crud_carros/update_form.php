<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "carros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if (!isset($_GET['id'])) {
    echo "ID não fornecido!";
    exit;
}

session_start();

$query_tipo = "SELECT id, tipo FROM tipo_carros";
$result_tipo = mysqli_query($conn, $query_tipo);

$query_trans = "SELECT id, tipo FROM transmissao";
$result_trans = mysqli_query($conn, $query_trans);

$id = $_GET['id'];

$sql = "SELECT * FROM carros WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $modelo = $row['modelo'];
    $tipo_carros_id = $row['tipo_carros_id'];
    $marca = $row['marca'];
    $ano = $row['ano'];
    $preco = $row['preco'];
    $cor = $row['cor'];
    $transmissao_id = $row['transmissao_id'];
} else {
    echo "Registro não encontrado!";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="../images/fevicon.png" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Alterar Carro</title>

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

    <body>
        <section class="contact_section layout_padding-bottom">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Atualizar Carro
                    </h2>
                </div>
                <div class="row">
                    <div class="col-md-8 col-lg-6 mx-auto">
                        <div class="form_container">
                            <h1>Atualizar Usuário</h1>
                            <form action="update.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div>
                                    <input type="text" name="modelo" value="<?php echo $modelo; ?>">
                                </div>
                                <label style="font-size: 20px">Tipo: </label>
                                <select name="tipo_carros_id" style="width: 100%; 
                                border: 1px solid #b0b0b0; height: 50px;
                                margin-bottom: 25px; padding-left: 15px; background-color: white;
                                outline: none;">
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result_tipo)) {
                                        $selected = ($row['id'] == $tipo_carros_id) ? 'selected' : '';
                                        echo "<option value='" . $row['id'] . "' $selected>" . $row['tipo'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <div>
                                    <input type="text" name="marca" value="<?php echo $marca; ?>">
                                </div>
                                <div>
                                    <input type="text" name="ano" value="<?php echo $ano; ?>">
                                </div>
                                <div>
                                    <input type="text" name="preco" value="<?php echo $preco; ?>">
                                </div>
                                <div>
                                    <input type="text" name="cor" value="<?php echo $cor; ?>">
                                </div>
                                <label style="font-size: 20px"> Transmissao: </label>
                                <select name="transmissao_id" style="width: 100%; 
                                border: 1px solid #b0b0b0; height: 50px;
                                margin-bottom: 25px; padding-left: 15px; background-color: white;
                                outline: none;">
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result_trans)) {
                                        $selected = ($row['id'] == $transmissao_id) ? 'selected' : '';
                                        echo "<option value='" . $row['id'] . "' $selected>" . $row['tipo'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <div class="btn_box">
                                    <button type="submit">
                                        Atualizar
                                    </button>
                                </div>
                            </form>
    </body>
</body>

</html>