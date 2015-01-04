<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ATLETICA LOGGA IN</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include('inc/db_con.php');?>
    <?php include('inc/login.php');?>
    <div class="container">

      <form class="form-signin" role="form" action="" method="POST">
        <h2 class="form-signin-heading">Logga in i ATLETICAS administrationssystem</h2>
        <input type="text" name="admin-namn" class="form-control" placeholder="Användarnamn" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Lösenord" required>
        <div class="checkbox">
        </div>
        <button class="btn btn-lg btn-default btn-block" name="submit-login" type="submit">Logga in</button>
        <?php echo $error;?>
      </form>

    </div>







    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
