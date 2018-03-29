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
                    <h1 class="display-3">Course_name</h1>
                    <p class="lead">Couese_ID</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container border border-primary">
        <div class ="row">
            <h1>Course</h1>
        </div>
    </div>
</body>

<?php include_once (realpath('templates/stapped/footer.php'));?>