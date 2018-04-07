<?php
$page['title'] = "Student Dashboard";
include_once ('config.inc.php');
include_once 'database_connect.inc.php';
include_once (realpath('templates/stapped/header.php'));
include_once (realpath('templates/stapped/navbar.php'));
?>

<style>
*{box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 20px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>
	
<!--Background พื้นหลัง -->
	<style type="text/css">	
	body{
	background-image:url(BG.png);
	background-size:cover;
	background-attachment:fixed;	
	}
	.content{
	background:black;
	width : 50%;
	padding:40px;
	margin:100px auto;
	}
	p{
	font-size :25px;
	color :black;
	}
	</style>

<body>
<!--Date/Month/Year-->

  <!--Tab-->
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>

 <body>
 <!--contain-->
 <div class="jumbotron" >
        <P align = "center-left"><img style="height: 10%; width: 100px;" src="people.png" alt="People"><h2 class="display-5"><b>Name : NM KomNa</b></h2></P>
        <hr class="my-2">
        <p class="lead">
        </p>
  </div>  

<div class="row">
  <div class="col-sm-8">
    <div class="jumbotron">
      <ul class="nav">
        <li class="nav-item">
        <a class="nav-link active" id="Assignment-tab" data-toggle="tab" href="#Assignment" role="tab" aria-controls="Assignment" aria-selected="true">Assignment</a>
        </li>          
        <li class="nav-item">
          <a class="nav-link " id="Project-tab" data-toggle="tab" href="#Project" role="tab" aria-controls="Project" aria-selected="false">Project</a>
        </li>
        <li class="nav-item">
        <a class="nav-link " id="Quiz-tab" data-toggle="tab" href="#Quiz" role="tab" aria-controls="Quiz" aria-selected="false">Quiz</a>
        </li>
        <li class="nav-item">
        <a class="nav-link " id="etc-tab" data-toggle="tab" href="#etc" role="tab" aria-controls="etc" aria-selected="false">etc</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Add</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#Addassignment">Assignment</a>
            <a class="dropdown-item" href="#Addproject">Project</a>
            <a class="dropdown-item" href="#AddQuiz">Quiz</a>
            <a class="dropdown-item" href="#Addetc">etc</a>
          </div>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade" id="Assignment" role="tabpanel" aria-labelledby="Assignment-tab">
  <!-- Collapse start -->
  <div id="accordion">
  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#Assignment1">
        Assignment #1
      </a>
    </div>
    <div id="Assignment1" class="collapse" data-parent="#accordion">
      <div class="card-body">
        Assignment detail........
        <button type="button" class="btn btn-primary float-right">edit</button>
        <button type="button" class="btn float-right">Chack Progress</button>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#Assignment2">
        Assignment #2
      </a>
    </div>
    <div id="Assignment2" class="collapse" data-parent="#accordion">
      <div class="card-body">
        Assignment detail.......
        <button type="button" class="btn btn-primary float-right">edit</button>
        <button type="button" class="btn float-right">Chack Progress</button>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#Assignment3">
        Assignment #3
      </a>
    </div>
    <div id="Assignment3" class="collapse" data-parent="#accordion">
      <div class="card-body">
        Assignment detail.......
        <button type="button" class="btn btn-primary float-right">edit</button>
        <button type="button" class="btn float-right">Chack Progress</button>
      </div>
    </div>
  </div>

</div>
  <!-- Collapse end -->
  </div>
  <div class="tab-pane fade" id="Project" role="tabpanel" aria-labelledby="Project-tab">
  <!-- Collapse start -->
  <div id="accordion">

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#Project1">
        Project #1
      </a>
    </div>
    <div id="Project1" class="collapse" data-parent="#accordion">
      <div class="card-body">
        Project detail........
        <button type="button" class="btn btn-primary float-right">edit</button>
        <button type="button" class="btn float-right">Chack Progress</button>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#Project2">
        Project #2
      </a>
    </div>
    <div id="Project2" class="collapse" data-parent="#accordion">
      <div class="card-body">
      Project detail........
      <button type="button" class="btn btn-primary float-right">edit</button>
      <button type="button" class="btn float-right">Chack Progress</button>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#Project3">
        Project #3
      </a>
    </div>
    <div id="Project3" class="collapse" data-parent="#accordion">
      <div class="card-body">
      Project detail........
      <button type="button" class="btn btn-primary float-right">edit</button>
      <button type="button" class="btn float-right">Chack Progress</button>
      </div>
    </div>
  </div>

</div>
  <!-- Collapse end -->
  </div>
  <div class="tab-pane fade" id="Quiz" role="tabpanel" aria-labelledby="Quiz-tab">
  <!-- Collapse start -->
  <div id="accordion">

<div class="card">
  <div class="card-header">
    <a class="card-link" data-toggle="collapse" href="#Quiz1">
      Quiz #1
    </a>
  </div>
  <div id="Quiz1" class="collapse" data-parent="#accordion">
    <div class="card-body">
      Quiz detail........
      <button type="button" class="btn btn-primary float-right">edit</button>
      <button type="button" class="btn float-right">Chack Progress</button>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <a class="collapsed card-link" data-toggle="collapse" href="#Quiz2">
      Quiz #2
    </a>
  </div>
  <div id="Quiz2" class="collapse" data-parent="#accordion">
    <div class="card-body">
    Quiz detail........
    <button type="button" class="btn btn-primary float-right">edit</button>
    <button type="button" class="btn float-right">Chack Progress</button>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <a class="collapsed card-link" data-toggle="collapse" href="#Quiz3">
      Quiz #3
    </a>
  </div>
  <div id="Quiz3" class="collapse" data-parent="#accordion">
    <div class="card-body">
    Quiz detail........
    <button type="button" class="btn btn-primary float-right">edit</button>
    <button type="button" class="btn float-right">Chack Progress</button>
    </div>
  </div>
</div>

</div>
  <!-- Collapse end -->
  </div>
  <div class="tab-pane fade" id="etc" role="tabpanel" aria-labelledby="etc-tab">
  <!-- Collapse start -->
  <div class="card">
  <div class="card-header">
    <a class="collapsed card-link" data-toggle="collapse" href="#Bootcamp">
      [Notice!] Bootcamp week
    </a>
  </div>
  <div id="Bootcamp" class="collapse" data-parent="#accordion">
    <div class="card-body">
    Event detail......
    </div>
  </div>
</div>
  <!-- Collapse end -->
  </div>
</div>
    </div>
  </div>

  <div class="col-sm-4">
  </div>
</div>



<!-- Optional JavaScript -->
    
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
     
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
  
</html>
</body>

<?php include_once (realpath('templates/stapped/footer.php')); ?>
