<?php
$page['title'] = "Student Course";
include_once ('config.inc.php');
include_once 'database_connect.inc.php';
include_once (realpath('templates/stapped/header.php'));
include_once (realpath('templates/stapped/navbar.php'));
?>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div clss="col">
                    <img src="img/pic.png" alt="Responsive image" class="rounded float-left" style="width:100%;height: 130px;">
                </div>
                <div class="col">
                    <h1 class="display-3">Course's name</h1>
                    <p class="lead">Couese's ID</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row"><h1><!--header something--></h1></div>
        <div class ="row">
            <div class="col">
                <a class="btn btn-primary" href="process.php" role="button">Project Process</a>
            </div>
            <div class="col">
               <!--empty-->
            </div>
        </div>
    </div>
</body>

<?php include_once (realpath('templates/stapped/footer.php'));?>