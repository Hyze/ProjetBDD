<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/style.css">
 <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<body>
  <div class="wrapper">
      <!-- Sidebar Holder -->
      <nav id="sidebar">
          <div class="sidebar-header">
              <h3>Archive du Loiret</h3>
          </div>

          <ul class="list-unstyled components">
              <li class="active">
                  <a href="#Home">Statistique Generale</a>
              </li>
              <li>
                  <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Modifier les données</a>
                  <ul class="collapse list-unstyled" id="pageSubmenu">
                      <li>
                          <a href="#">Ajouter</a>
                      </li>
                      <li>
                          <a href="#">Supprimer</a>
                      </li>
                      <li>
                          <a href="#">Mettre a jour</a>
                      </li>
                  </ul>
              </li>
              <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Connexion Admin</a>
              </li>
          </ul>
      </nav>

      <!-- Page Content Holder -->
      <div id="content">

          <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">

                  <button type="button" id="sidebarCollapse" class="navbar-btn">
                      <span></span>
                      <span></span>
                      <span></span>
                  </button>
                  <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <i class="fas fa-align-justify"></i>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="nav navbar-nav ml-auto">
                          <li class="nav-item active">
                              <a class="nav-link" href="#Home">Statistique Generale</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Page</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Page</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Page</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>
          <section id="Home">
              <div class="container-fluid">
                <div class="card">
                  <div class="card-deck">

                  </div>

                </div>
              </div>


          <div class="container-fluid">
              <div class="card">
                  <div class="card-text" style="text-align: center">
                      <h1>Statistique générale</h1>
                  </div>
              <div class="card-deck">
                  <div class="card">
                      <div  class="card-img-top">
                          <canvas id="Pie"> </canvas>
                      </div>
                  </div>



                  <div class="card">
                      <canvas class="card-img-top" id="incomplet"> </canvas>

                  </div>
              </div>
              </div>

              <div class="card">
                  <canvas class="card-img-top" id="photoVille"> </canvas>
              </div>


          </div>
            </section>



        <section class "data">
          <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

              <thead>

                <tr>
                  <th>ID</th>

                  <th>Name of Product</th>


                  <th>Price of Product</th>

                  <th>Product Catrogy</th>

                  <th>Product Details</th>

                </tr>

              </thead>

              <tfoot>

                <tr>

                  <th>ID</th>

                  <th>Name of Product</th>

                  <th>Price of Product</th>

                  <th>Product Catrogy</th>

                  <th>Product Details</th>

                </tr>

              </tfoot>
</table>
        </section>
          <div class="line"></div>

          <h2>Lorem Ipsum Dolor</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

          <div class="line"></div>

          <h2>Lorem Ipsum Dolor</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

          <div class="line"></div>

          <h3>Lorem Ipsum Dolor</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
  </div>






</section>

<section id="recherche">

</section>

<section id="Modif">

</section>


</div>
</div>
</body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="js/bootstrap.bundle.js" ></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/Chart.js"></script>
 <script src="js/monjs.js" type="text/javascript"></script>
</html>
