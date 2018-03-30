<nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas" role="navigation" style="background-color: #009fe5;">
    <img src="img/cmu-cpe-logo-side-by-side-mono.png" alt="" class="navmenu-brand" style="width:100%;height: 100px;">
    <div class ="container">
        <ul class="list-group">
        <li class="list-group-item"><a href="dashboard.php">Dashborad</a></li>
        <li class="list-group-item"><a href="course.php">Course</a></li>
        </ul>
    </div>
</nav>
<!--009fe5-->
<div class="navbar sticky-top navbar-light" style="background-color: #f8f8f8;">
    <button class="navbar-toggler" type="button" data-toggle="offcanvas" data-target="#myNavmenu" data-canvas="body" aria-controls="myNavmenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <small><?=$_SESSION['user']?><a href="logout.php">[logout]</a></small>
</div>