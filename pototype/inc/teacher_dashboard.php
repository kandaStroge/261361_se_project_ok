<?php
$page['title'] = "Student Dashboard";
include_once ('config.inc.php');
include_once 'database_connect.inc.php';
include_once (realpath('templates/stapped/header.php'));
?>
<body>
    <script>
    function showplus(){
        $('#addon').toggle();
    }
    </script>
<div class="container">
<small><?=$_SESSION['user']?><a href="logout.php">[logout]</a></small>
    <h1 class="mt-5">Subject 262<small> <a href="#" onclick="javascript:showplus()">[+]</a></small></h1>
    <div class="row" style="display:none" id="addon">
        <div class="d-flex p-2">
            <form action="createAction.php" method="get">
                <input type="text" name="act_name" id="" placeholder="Activity Name" >
                <input type="submit" value="เพิ่มกิจกรรม">
            </form>
        </div>
    </div>
    <div class="row">
    <table class="table">
            <?php
            $sql = "SELECT id, name, time, checked FROM tbl_activity";
            $result = $connect->query($sql);
            
            if ($result->num_rows > 0) {
               
                while($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td class="col-sm-3">'.$row["name"].'</td>';
                    echo '<td><a href="activity_remove.php?id='.$row["id"].'">[Delete]';
                
           
                    
                    echo '</a>';

                    echo '</td>';
    
                    echo '</tr>';
                }
            } else {
                echo "<tr><td>0 results</td></tr>";
            }
            
         
            ?>
      
      </table>
    </div>
<h2>Group List</h2>

     <table class="table">
            <?php
            $sql = "SELECT id, name, time, checked FROM tbl_activity";
            $result = $connect->query($sql);
            echo '<tr>';
            echo '<td class="col col-sm-3">Group 01</td>';
            if ($result->num_rows > 0) {
               
                while($row = $result->fetch_assoc()) {
                    if($row["checked"] > 0){
                        echo '<td><img src="img/tick.png" width="16" height="16"></td>';
                    }else{
                        echo '<td><img src="img/not.png" width="16" height="16"></td>';
                    }
                    
                   
    
                   
                }
            } else {
                echo "<td>0 results</td>";
            }
            echo '</tr>';
            
            $connect->close();
            ?>
      
      </table>
    </div>
    
</div>

</body>
<?php
include_once (realpath('templates/stapped/footer.php'));
?>