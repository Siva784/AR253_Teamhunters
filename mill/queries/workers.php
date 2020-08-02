<?php 

include './connect.php';

if(isset($_POST['worker_add'])){
    $date = $_POST['date'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phnum = $_POST['phnum'];
    $type = $_POST['type'];
    $add_worker = "INSERT INTO `mill_workers`(`mill_id`, `name`, `joining_date`, `phnum`, `address`, `type`) VALUES ('{$_SESSION['mill_id']}','$name','$date','$phnum','$address','$type')";
    // echo $add_worker;
    $add_worker = mysqli_query($conn , $add_worker);
    if($add_worker){
        echo "Worker Added";
    }else{
        echo "Failed To Add";
    }
}

if(isset($_POST['worker_wage'])){

    $amt=$_POST['amt'];
    $date=$_POST['date'];
    $id=$_POST['id'];
    $mill_id  = $_POST['mill_id'];

    $wage = "INSERT INTO `worker_wages`(`worker_id`, `mill_id`, `date`, `amt`) VALUES ($id,$mill_id,'$date',$amt)";
    $wage = mysqli_query($conn,$wage);
    if($wage){
        echo "Wages Added";
    }else{
        echo "Wages Not Added";
    }

    
}

?>