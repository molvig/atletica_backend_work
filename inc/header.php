<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atletica_backend</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<nav class="navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">ATLETICA</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!--<ul class="nav navbar-nav">
        <li class="active"><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>-->
      <!--<form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Vad letar du efter?">
        </div>
        <button type="submit" class="btn btn-default">Sök</button>
      </form> -->
      <ul class="nav navbar-nav navbar-left">
        <li><a href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> Överblick</a></li>
        <li><a href="medlem.php"><span class="glyphicon glyphicon-user"></span> Medlemmar</a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-list-alt"></span> Schema<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="schema_var.php">Vår</a></li>
            <li><a href="#">Sommar</a></li>
            <li><a href="#">Höst</a></li>
            <li class="divider"></li>
            <li><a href="#">Påsk</a></li>
            <li><a href="#">Jul</a></li>
            <li class="divider"></li>
            <li><a href="andra_pass.php">Lägg till nytt pass</a></li>
          </ul>
          <li><a href="statistik.php">  <span class="glyphicon glyphicon-stats"></span> Statistik</a></li>
          <li><a href="installningar.php"><span class="glyphicon glyphicon-wrench"></span> Inställningar</a></li>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin.php"><span class="glyphicon glyphicon-log-out"></span>  Logga ut</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
