<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="../images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Adicionar Pessoas</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="../css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
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
            Cadastro
          </h2>
        </div>
        <div class="row">
          <div class="col-md-8 col-lg-6 mx-auto">
            <div class="form_container">
              <form action="insert.php" method="post">
                <div>
                  <input type="text" name="nome" placeholder="nome">
                </div>
                <div>
                  <input type="email" name="email" placeholder="email">
                </div>
                <div>
                  <input type="text" name="telefone" placeholder="telefone">
                </div>
                <div>
                  <input type="password" name="senha" placeholder="senha">
                </div>
                <div>
                  <input type="text" name="cep" placeholder="cep">
                </div>
                <div>
                  <input type="text" name="rua" placeholder="rua">
                </div>
                <div>
                  <input type="text" name="cidade" placeholder="cidade">
                </div>
                <div>
                  <input type="text" name="estado" placeholder="estado">
                </div>
                <div class="btn_box">
                  <button type="submit">
                    Enviar
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="../js/jquery-3.4.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="../js/bootstrap.js"></script>
  </body>
</body>

</html>