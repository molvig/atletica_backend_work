<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atleticas bokningssystem</title>

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
        <li><a href="schema_start.php"> <span class="glyphicon glyphicon-calendar"></span> Schema</a></li>
        <!--<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-calendar"></span> Schema<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="schema.php?schemaid=1&date=<?=$mandagen;?>" id="1">Vår</a></li>
            <li><a href="schema.php?schemaid=2&date=<?=$mandagen;?>" id="2">Sommar</a></li>
            <li><a href="schema.php?schemaid=3&date=<?=$mandagen;?>" id="3">Höst</a></li>
            <li><a href="schema.php?schemaid=4&date=<?=$mandagen;?>"id="4">Vinter</a></li> 
              </ul>
      -->

        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logga ut <?php echo  $admin_check ;?></a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
