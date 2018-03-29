<?php
$page['title'] = "Student Dashboard";
include_once ('config.inc.php');
include_once 'database_connect.inc.php';
include_once (realpath('templates/stapped/header.php'));
$sql = "SELECT id, name, time, checked FROM tbl_activity";
$result = $connect->query($sql);
$fin_work = 0;
$data = array(
    "name"=>array(),
    "id" => array(),
    "checked" => array()
);
while($row = $result->fetch_assoc()) {
    if($row['checked'] > 0 ){
        $fin_work += 1;
    }
    array_push($data["name"], $row["name"]);
    array_push($data["id"], $row["id"]);
    array_push($data["checked"], $row["checked"]);
}
$percentage = $fin_work/$result->num_rows * 100;
?>
<body>
<div class="container">

    <small><?=$_SESSION['user']?><a href="logout.php">[logout]</a></small>
    <h1 class="mt-5 <?php  echo $percentage >= 100 ? "text-success" : "" ?>">Subject 262 <span class="badge <?php  echo $percentage >= 100 ? "badge-success" : "badge-secondary" ?>"><font style="color:<?php  echo $percentage >= 100 ? "white" : "yellow" ?>"><?=$fin_work?></font><small>/<?=$result->num_rows?></small></span></h1>
    
    <div class="row">
    <div class="col-sm-12">
        <div class="progress">
            <div class="progress-bar <?php  echo $percentage >= 100 ? "bg-success" : "" ?>" role="progressbar" style="width: <?=$percentage?>%" aria-valuenow="<?=$percentage?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
    <div class="col-sm-12">

    <table class="table">
            <?php
           // print_r($data);
            
            if ($result->num_rows > 0) {
               
    
                
                    
                    for($i = 0; $i < count($data["name"]); $i++){
                        echo '<tr>';
                        echo '<td>'.$data["name"][$i].'</td>';
                        echo '<td><a href="activity.php?id='.$data["id"][$i].'">';
                    
               
                        if($data['checked'][$i] > 0 ){
                            
                            echo '<button type="button" class="btn btn-primary btn-sm">Check OK</button>';
    
                        }else{
    
                            echo '<img src="img/tick.png" width="16" height="16">[NOT ok]';
    
                        }
                        echo '</a>';
    
                        echo '</td>';
        
                        echo '</tr>';
                    }
                    
                   
                
            } else {
                echo "0 results";
            }
            
            $connect->close();
            ?>
      
    </div>
</div>
</table>
</div>
</body>
<?php
include_once (realpath('templates/stapped/footer.php'));
?>