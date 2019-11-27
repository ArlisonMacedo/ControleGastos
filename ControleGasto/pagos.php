<!--
=========================================================
 Material Dashboard - v2.1.1
=========================================================

 Product Page: https://www.creative-tim.com/product/material-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/material-dashboard/blob/master/LICENSE.md)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<?php
    session_start();
 ?>
<!doctype html>
<html lang="en">

<head>
  <title>Hello, world!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />

</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          CG
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Controle De Gastos
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Todos</p>
            </a>
          </li>
          <li class="nav-item active">
              <a href="./inserir.php" class="nav-link">
                  <i class="material-icons">dashboard</i>
                  <p>Inserir</p>
              </a>
          </li>
          <li class="nav-item active">
              <a href="./pendentes.php" class="nav-link">
                  <i class="material-icons">dashboard</i>
                  <p>Pendentes</p>
              </a>
          </li>
          <li class="nav-item active">
              <a href="#" class="nav-link">
                  <i class="material-icons">dashboard</i>
                  <p>Pagos</p>
              </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#">Pagos</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">

                </a>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <table class="table table-striped">
              <thead class="thead-dark">
                  <th>Nome do Gasto</th>
                  <th>Valor</th>
                  <th>Data de Venc.</th>
                  <th>Data e Horário Criada</th>
                  <th colspan="3">Ações</th>
              </thead>
              <tbody>



                  <?php
                    include_once './Models/conexao.php';

                    $stmt = $conn->query("SELECT * FROM gasto");
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                            if($row->checked == 1){
                        ?>
                        <tr>
                            <td><?= $row->NOME_GASTO ?></td>
                            <td><?= $row->VALOR ?></td>
                            <td><?= date("d/m/Y", strtotime($row->DATA_VENC)) ?></td>
                            <td><?= date("d/m/Y H:i:s", strtotime($row->DATA_CREATE)) ?></td>
                            <td> <button type="button" disabled class="btn btn-info btn-md"name="button"> Pago <i class="material-icons">check</i> </button> </td>
                        </tr>

                        <?php
                        }
                    }
                   ?>



              </tbody>
          </table>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">A7xDev </a>
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
</body>

</html>
