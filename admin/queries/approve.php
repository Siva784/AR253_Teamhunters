<?php 
include 'connect.php';
if(isset($_POST['far_approve'])){
    $id = $_POST['far_id'];
    $app = "UPDATE farmers set status=1 where far_id=$id";
    $app = mysqli_query($conn,$app);
    if($app){
       echo  "Approved";
    }else{
        echo "Not Approved";
    }

}

if (isset($_POST['mill_approve'])) {
    $id = $_POST['mill_id'];
    $app = "UPDATE mills set status=1 where mill_id=$id";
    $app = mysqli_query($conn, $app);
    if ($app) {
        echo  "Approved";
    } else {
        echo "Not Approved";
    }
}

?>