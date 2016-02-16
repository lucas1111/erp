<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ERP</title>

    <!-- Bootstrap core CSS -->
    <link href="/style/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/style/bootstrap/css/mycss/mydashboard.css" rel="stylesheet">
    <?php
      // if(!isset($_SESSION['logionState'])&&$action!='register'){
      //   echo '<link href="/style//bootstrap/css/mycss/mycover.css" rel="stylesheet">';
      // }
    ?>
  </head>

  <body>
     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand " href="/"><span class="glyphicon glyphicon-home">Home</span></a>
          </div>

          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
              <li ><a href="/?action=management" >Management</a></li> 

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>             
            </ul>         
            <ul class="nav navbar-nav navbar-right">
              <?php 
                //session_start();
                if(isset($_SESSION['logionState'])){
                  echo'<li><a href="#"><span class="glyphicon glyphicon-user">：'.$_SESSION['username'].'</span></a></li>';
                  echo'<li><a href="/?logout=logout&user='.$_SESSION['username'].'" title="log-out"><span class="glyphicon glyphicon-log-out"></span></a></li>';
                }else{
                  echo '<li><a href="/?action=register">SignUp</a></li>';
                }

              ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">About</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Help</a></li>
                </ul>
              </li>           
            </ul>
            <form class="navbar-form navbar-right">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button" >
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
                </span>
              </div>
            </form>
          </div><!--/.nav-collapse -->

        </div>
      </nav>

        



