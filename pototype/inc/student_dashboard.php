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
            <h1 class="display-3">Fluid jumbotron</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h1 class="mt-5">Student Dashboard</h1>
        </div>
        <div class="row">
            <a href="course.php" class="badge badge-primary">Student Course</a>
        </div>
    </div>
</body>

<?php include_once (realpath('templates/stapped/footer.php'));?>