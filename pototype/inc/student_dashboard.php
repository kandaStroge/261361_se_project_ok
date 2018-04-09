<?php
$page['title'] = "Student Dashboard";
include_once ('config.inc.php');
include_once 'database_connect.inc.php';
include_once (realpath('templates/stapped/header.php'));
include_once (realpath('templates/stapped/navbar.php'));
?>

<!--Date/Month/Year
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
-->

<body>
  <!--header-->
  <div class="jumbotron jumbotron-fluid" >
    <div class="container">
      <div class="row">
        <div clss="col">
          <img src="people.png" alt="Responsive image" class="rounded float-left" style="width:100%;height: 130px;">
        </div>
        <div class="col">
          <h1 class="display-3">Student's name</h1>
          <p class="lead">'s Dashboard</p>
        </div>
      </div>
    </div>
  </div>  

  <!--contain-->
  <div class="container">
      <div class="row"><h1>Course Overview</h1></div>
      <div class ="row">
        <div class="col">
          <a class="btn btn-primary" href="course.php" role="button">Subject 262</a>
        </div>
      </div>
  </div>
<!--Data in Tab 
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
</div>-->
 
 
 <!--ส่วนที่ 2
 <div class = "col-md-4" align = "center">
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
    <p>More Events</p>-->
</body>

<?php include_once (realpath('templates/stapped/footer.php')); ?>
