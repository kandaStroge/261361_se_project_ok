<?php
$page['title'] = "Student Dashboard";
include_once ('config.inc.php');
include_once 'database_connect.inc.php';
include_once (realpath('templates/stapped/header.php'));
include_once (realpath('templates/stapped/navbar.php'));
?>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <!--User_picture-->
            <h1 class="display-3">User_name</h1>
            <p class="lead">Dashboard</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h1 class="mt-5">Student Dashboard</h1>
        </div>
    </div>
</body>

<?php include_once (realpath('templates/stapped/footer.php'));?>