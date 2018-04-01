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
  padding: 14px 16px;
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
        <p class="lead"> &nbsp;&nbsp;&nbsp;&nbsp;รหัสนักศึกษา 5806XXXXX</p>
        <hr class="my-2">
        <p>Computer Engineering</p>
        <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">More</a>
        </p>
    </div>  

    <!--กล่องข้อความ -->
    <div class = "row">
        <div class = "col-md-6" align = "center">
            <div class="card border-primary" style="max-width: 50rem;"align = "left"> 
                <div class="card-header">Course Overview</div>
                <div class="card text-center">
                <div class="card-header">  
                <!--Tab -->
                <ul class="nav nav-tabs">
                <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#home"> Course</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#profile"> News For Studen</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#sat"> Other</a>
                </li>
                </ul>
                <div class = "rows">
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3">					
                   <label for="year-selector" ></label>
                    <select id="year-selector"class="form-control">
                        <option>Sort by</option>
                        <option>----</option>
                        <option>----</option> 
                    </select>					
        </div></div>
	</div>
<!--Data in Tab -->
<div class="list-group">
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active show" id="home">
    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
    <div class="d-flex w-100 justify-content-between">
      <img style="height: 15%; width: 15%;"  src="sub.png" alt="People"><h3 class="mb-1">261xxx</h3> 
	  
    </div>	
    <p class="mb-1"><h4>Micro</h4></p>
    <small></h6>XXXXXX</h6></small>
  </a>
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
    <div class="d-flex w-100 justify-content-between">
      <img style="height: 15%; width: 15%;"  src="sub.png" alt="People"><h3 class="mb-1">261xxx</h3>      
    </div>
    <p class="mb-1"><h4>Logic</h4></p>
    <small></h6>XXXXXX</h6></small>
  </a> 
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
    <div class="d-flex w-100 justify-content-between">
      <img style="height: 15%; width: 15%;"  src="sub.png" alt="People"><h3 class="mb-1">261xxx</h3>      
    </div>
    <p class="mb-1"><h4>Embress</h4></p>
    <small></h6>XXXXXX</h6></small>
  </a> 
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
    <div class="d-flex w-100 justify-content-between">
      <img style="height: 15%; width: 15%;"  src="sub.png" alt="People"><h3 class="mb-1">261xxx</h3>       
    </div>
    <p class="mb-1"><h4>CAD</h4></p>
   <small></h6>XXXXXX</h6></small>
  </a>   
  </div>
  
  <div class="tab-pane fade" id="profile">
    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
    <div class="d-flex w-100 justify-content-between">
      <img style="height: 15%; width: 15%;"  src="sub.png" alt="People"><h3 class="mb-1">261xxx</h3>       
    </div>
    <p class="mb-1"><h4>R lang</h4></p>
    <small></h6>XXXXXX</h6></small>
  </a> 
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
    <div class="d-flex w-100 justify-content-between">
      <img style="height: 15%; width: 15%;"  src="sub.png" alt="People"><h3 class="mb-1">261xxx</h3>      
    </div>
    <p class="mb-1"><h4>C++</h4></p>
    <small></h6>XXXXXX</h6></small>
  </a> 
 </div>
 
 <div class="tab-pane fade" id="sat">
 <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
    <div class="d-flex w-100 justify-content-between">
      <img style="height: 15%; width: 15%;" src="sub.png" alt="People"><h3 class="mb-1">261xxx</h3>       
    </div>
    <p class="mb-1">Sofeware.</p>
    <small></h6>XXXXXX</h6></small>
  </a>
 </div> 
 </div> 
 </div>
 </div> 
 </div>
</div> 
 
 
 <!--ส่วนที่ 2  --> 
 <div class = "col-md-6" align = "center">
<div class="card border-primary mb-3" style="max-width: 50rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h4 class="card-title">Primary card title</h4>
    <script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>

<body onload="startTime()">
<div class = "col-md-3"></div>
<h3>Time : <div id="txt"></h3></div>
  </body>    
 <div class="card border-secondary mb-3" style="max-width: 50rem;">
  <div class="card-header">Update Event</div>
  <div class="card-body">
    <h4 class="card-title">Today List</h4>
    <p>More Events</p>
  </div>

</div>
  </div>
</div>


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
