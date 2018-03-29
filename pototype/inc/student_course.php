<?php
$page['title'] = "Student Course";
include_once ('config.inc.php');
include_once 'database_connect.inc.php';
include_once (realpath('templates/stapped/header.php'));
include_once (realpath('templates/stapped/navbar.php'));
?>

<body>
    <div class="container">
        <h1 class="mt-5">Student Course</h1>
        <div class="row">
            <a href="dashboard.php" class="badge badge-primary">Student dashboard</a>
        </div>
    </div>
</body>

<?php include_once (realpath('templates/stapped/footer.php'));?>