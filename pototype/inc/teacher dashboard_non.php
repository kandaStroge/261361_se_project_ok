<!DOCTYPE html>
<html lang="en">
<head>
  <title>OK System dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>

  </style>
</head>
<body>

    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">OK System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li>
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                <span class="glyphicon glyphicon-menu-hamburger"></span>
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Add/Edit assignment</a></li>
                    <li><a href="#">view total score</a></li>
                </ul>
            </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="jumbotron">
    <h1>USER PROFILE HERE</h1> 
  </div>
</div>

<div class="row">
  <div class="col-sm-8">
    <div class="panel panel-default">
    <div class="panel-heading">Corse overview</div>
    <div class="panel-body">
    
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Course</a></li>
            <li><a data-toggle="tab" href="#menu1">Work</a></li>
        </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">


        <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Assignment1</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">Assignment detail and progress </div>
    </div>
  </div>
  </div>


      </div>
      <div id="menu1" class="tab-pane fade">


        <h3>Assignment here</h3>
        
      </div>
  
    </div>

    </div>
    </div>
  </div>

  
</div>

</body>
</html>