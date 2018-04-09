<?php
$page['title'] = "Student Dashboard";
include_once ('config.inc.php');
include_once 'database_connect.inc.php';
include_once (realpath('templates/stapped/header.php'));
include_once (realpath('templates/stapped/navbar.php'));

$sql = "SELECT * FROM coruse";
$result = $connect->query($sql);
$fin_work = 0;
$data = array(
    "id"=>array(),
    "name" => array()
);
while($row = $result->fetch_assoc()) {
    array_push($data["id"], $row["id"]);
    array_push($data["name"], $row["name"]);
}

?>

<body>

  <!--header-->
  <div class="jumbotron jumbotron-fluid" >
    <div class="container">
      <div class="row">
        <div clss="col">
          <img src="people.png" alt="Responsive image" class="rounded float-left" style="width:100%;height: 130px;">
        </div>
        <div class="col">
          <h1 class="display-3">Student's Name
          <!--?php 
          
          echo $data['name'][0];
          
          ?-->
          </h1>
          <p class="lead">'s Dashboard</p>
        </div>
      </div>
    </div>
  </div>  

  <!--Contain-->
  <div class="container">
      <div class="row"><h1>Course Overview</h1></div>
      <div class ="row">
        <div class="col">
          <a class="btn btn-primary" href="course.php" role="button">Subject 262</a>
          <table>

          <?php
            //print_r($data);
            if ($result->num_rows > 0) {

                    for($i = 0; $i < count($data["name"]); $i++){
                        echo '<tr>';
                        echo '<td>'.$data["id"][$i].'</td>';
                        echo '<td>'.$data["name"][$i].'</td>';
                        echo '</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
            } else {
                echo "0 results";
            }
            $connect->close();
            ?>

            </table>
        </div>
      </div>
  </div>

</body>

<?php include_once (realpath('templates/stapped/footer.php')); ?>
