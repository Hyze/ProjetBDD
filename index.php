<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
     <link rel="stylesheet" href="css/bootstrap.css">
     <link rel="stylesheet" href="css/bootstrap-reboot.css">
     <link rel="stylesheet" href="css/bootstrap-grid.css">
     <link defer rel="stylesheet" href="css/style.css">
     <script src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
     <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<body>

<div class="container-fluid">
  <div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <form class="form-signin" action="php/checklog.php" method="post">
            <div class="form-label-group">
              <input type="login" id="inputlog" class="form-control" placeholder="login" name="login"required autofocus>
              <label for="login">Login</label>
            </div>

            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pwd" required>
              <label for="inputPassword">Password</label>
            </div>

            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input" id="customCheck1">
              <label class="custom-control-label" for="customCheck1">Remember password</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
            <hr class="my-4">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>

<script defer src="js/jquery-3.3.1.js" type="text/javascript"></script>
<script defer type="text/javascript" src="js/login.js">

</script>
<script async src="js/bootstrap.js" type="text/javascript"></script>
<script async src="js/bootstrap.bundle.js"></script>
<script async src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script async type="text/javascript" src="js/pace.min.js"></script>
<script defer type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script async type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</html>
