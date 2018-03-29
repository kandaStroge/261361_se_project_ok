<nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas" role="navigation"> 
  <div class="container">
  </div>
</nav>
<div class="navbar sticky-top navbar-light" style="background-color: #f8f8f8;" >
  <button class="navbar-toggler" type="button" data-toggle="offcanvas" data-target="#myNavmenu" data-canvas="body" aria-controls="myNavmenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <small><?=$_SESSION['user']?><a href="logout.php">[logout]</a></small>
</div>