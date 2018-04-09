<?php
$page['title'] = "Teacher Course";
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
                    <h1 class="display-3">Course_name</h1>
                    <p class="lead">Couese_ID</p>
                </div>
            </div>
        </div>
    </div>
     <!--Contain-->
     <div class ="container">
        <div class="card">
            <div class="card-header">
                Coruse Overview
            </div>
            <div class="card-body">
                <!--h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p-->
                <a class="btn btn-primary" href="process.php" role="button">Project Process</a>
            </div>
        </div>
    </div>
</body>

<?php include_once (realpath('templates/stapped/footer.php')); ?>