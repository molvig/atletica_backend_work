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
    <link rel="stylesheet" type="text/css" href="css/tcal.css">
    <script type="text/javascript" src="js/tcal.js"></script> 
    <script type="text/javascript" src ="js/birthdate.js"></script> 
        <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.datetimepicker.js"></script>

    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

   <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
            tinymce.init({selector:'#veckansfokus_uppdatera', menubar: false, format_blocks: false, forced_root_block : false});
    </script> 
        <script>
            tinymce.init({selector:'#meddelande_text', menubar: false, format_blocks: false, forced_root_block : false});
    </script> 
<script>
    $('#myModal').modal(options)
</script> 



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

      <ul class="nav navbar-nav navbar-left">
        <li><a href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> Överblick</a></li>
        
        <li class="dropdown">
          <a href="medlem.php" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Medlemmar<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="medlem_search.php">Sök medlem</a></li>
            <li><a href="medlem_ny.php">Lägg till ny medlem</a></li>
            <li><a href="medlem_search.php">Uppdatera medlem</a></li>
            <li><a href="medlem_search_autogiro.php">Säga upp autogiro</a></li>
            <li><a href="medlem_search_frys.php">Frys/Tina kort</a></li>
            <li><a href="medlem_skuldlista.php">Skuldlista</a></li>
            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-calendar"></span> Schema<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="schema.php">Vår</a></li>
            <li><a href="schema.php">Sommar</a></li>
            <li><a href="schema.php">Höst</a></li>
            <li><a href="schema.php">Vinter</a></li>
          </ul>
        </li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-stats"></span> Statistik<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="statistik_bokade.php">Bokade pass</a></li>
            <li><a href="statistik_korttyp.php">Sök korttyp</a></li>
            <li><a href="statistik_nyamedlemmar.php">Nya medlemmar</a></li>
            <li><a href="statistik_frystakort.php">Frysta kort</a></li>
            <li><a href="statistik_uppsagda_autogiro.php">Uppsagda autogiro</a></li>
            <li><a href="statistik_aktuella_autogiro.php">Aktuella autogiro</a></li>
          </ul>
        </li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Systeminställningar<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="installningar_veckansfokus.php">Veckans fokus</a></li>
            <li><a href="installningar_aktuelltschema.php">Välj aktuellt schema</a></li>
            <li><a href="installningar_schema_uppdatera.php">Ändra i originalschema</a></li>
            <li><a href="installningar_nyinstruktor.php">Instruktörer</a></li>
            <li><a href="installningar_nyttpass.php">Pass</a></li>
            <li><a href="installningar_kontaktmedlemmar.php">Meddela alla medlemmar</a></li>
            <li class="divider"></li>
            <li><a href="medlem_tabort.php" style="color:red">Radera medlem</a></li>
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin.php"><span class="glyphicon glyphicon-log-out"></span>  Logga ut</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
