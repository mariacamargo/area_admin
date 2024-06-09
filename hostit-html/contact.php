<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>CARROS</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>CARROS</span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
              <li class="nav-item ">
                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> Nossa História</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="service.php">Modelos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="price.html">Serviços</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="contact.php">Login</a>
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
    <div class="login-container">
      <div class="title-container">
        <h2>Página do Usuário</h2>
        <img src="images/imagem.png" alt="Imagem de Login">

      </div>
      <div class="login-box">
        <div class="login-content">
          <?php
          session_start();
          if (!isset($_SESSION['id'])) {
          ?>

            <div class="login-info">
              <p>Faça login em nosso site para ver as últimas promoções, agendar um test drive e explorar nosso estoque de veículos de alta qualidade. Estamos aqui para ajudar você!</p>
            </div>
            <div class="login-form">
              <form action="crud_usuarios/login.php" method="POST">
                <div class="form-group">
                  <label for="username">E-mail:</label>
                  <input type="text" id="username" name="email" required>
                </div>
                <div class="form-group">
                  <label for="password">Senha:</label>
                  <input type="password" id="password" name="senha" required>
                </div>
                <div class="button-group">
                  <input class="btn_box" type="submit" value="Entrar"></input>
                  <input class="btn_box" type="button" id="btn-criar" value="Criar Conta">
                </div>
              </form>
            </div>

          <?php
          } else {
          ?>
            <div class="button-group">
              <?php
              if ($_SESSION['admin']) {
              ?>
                <input class="btn_box" type="button" id="btn-carros" value="Cadastro de carros">
                <input class="btn_box" type="button" id="btn-ver-pedidos" value="Ver Pedidos">
              <?php
              } else {
              ?>
                <input class="btn_box" type="button" id="btn-avaliar" value="Avaliação">
                <input class="btn_box" type="button" id="btn-pedidos" value="Fazer um Pedido">
                <input class="btn_box" type="button" id="btn-alterar" value="Alterar Cadastro">
              <?php
              }
              ?>

              <input class="btn_box" type="button" id="btn-logout" value="Deslogar">
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </body>


  <!------------------------------------------------------------------>
  <!-- end contact section -->

  <!-- info section -->

  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h4>
              Endereço
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Localização
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Ligue +55 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  carros@gmail.com
                </span>
              </a>
            </div>
          </div>
          <div class="info_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_link_box">
            <h4>
              Links
            </h4>
            <div class="info_links">
              <a class="" href="index.html">
                <img src="images/nav-bullet.png" alt="">
                Home
              </a>
              <a class="" href="about.html">
                <img src="images/nav-bullet.png" alt="">
                Nossa História
              </a>
              <a class="" href="service.php">
                <img src="images/nav-bullet.png" alt="">
                Modelos
              </a>
              <a class="" href="price.html">
                <img src="images/nav-bullet.png" alt="">
                Serviços
              </a>
              <a class="active" href="contact.php">
                <img src="images/nav-bullet.png" alt="">
                Login
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Maria Templates</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <script>
    var btnCriar = document.getElementById('btn-criar');
    var btnLogout = document.getElementById('btn-logout');
    var btnAlterar = document.getElementById('btn-alterar');
    var btnPedidos = document.getElementById('btn-pedidos');
    var btnVerPedidos = document.getElementById('btn-ver-pedidos');
    var btnAvaliacao = document.getElementById('btn-avaliar');
    var btnCarros = document.getElementById('btn-carros');

    if (btnCriar) {
      document.getElementById("btn-criar").addEventListener("click", function() {
        window.location.href = "crud_usuarios/index.php";
      });
    }

    if (btnLogout) {
      document.getElementById("btn-logout").addEventListener("click", function() {
        window.location.href = "crud_usuarios/logout.php";
      });
    }

    if (btnAlterar) {
      document.getElementById("btn-alterar").addEventListener("click", function() {
        window.location.href = "crud_usuarios/update_form.php";
      });
    }

    if (btnPedidos) {
      document.getElementById("btn-pedidos").addEventListener("click", function() {
        window.location.href = "crud_pedidos/create.php";
      });
    }

    if (btnVerPedidos) {
      document.getElementById("btn-ver-pedidos").addEventListener("click", function() {
        window.location.href = "crud_pedidos/index.php";
      });
    }

    if (btnAvaliacao) {
      document.getElementById("btn-avaliar").addEventListener("click", function() {
        window.location.href = "crud_avaliacoes/index.php";
      });
    }

    if (btnCarros) {
      document.getElementById("btn-carros").addEventListener("click", function() {
        window.location.href = "crud_carros/read.php";
      });
    }
  </script>

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>

</body>

</html>