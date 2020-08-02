<?php
include './connect.php';

if(isset($_POST['crop_add'])){
    $start_date= $_POST['start_date'];
    $end_date= $_POST['end_date'];
    $address= $_POST['address'];
    $acers= $_POST['acers'];
    $type= $_POST['type'];
    $query = "INSERT INTO `crops`(far_id,`crop_start`, `crop_end`, `crop_address`, `crop_acers`, `crop_type`) VALUES ('{$_SESSION['far_id']}','$start_date','$end_date','$address','$acers','$type')";
    $q = mysqli_query($conn,$query);
    if($q){
        echo "Crop Added Successfully";
    }else{
        echo "Crop Not Added";
    }
}

if(isset($_POST['add_invest'])){
    $crop_id = $_POST['crop_id'];
    $invest_reason= $_POST['invest_reason'];
    $invest_amt= $_POST['invest_amt'];
    $invest_date= $_POST['invest_date'];
    $add_invest = "INSERT INTO `crop_investment`(`crop_id`, `farmer_id`, `invest_reason`, `invest_amt`, `invest_date`) VALUES ('$crop_id','{$_SESSION['far_id']}','$invest_reason','$invest_amt','$invest_date')";
    // echo $add_invest;
    $add_invest = mysqli_query($conn,$add_invest);
    if ($add_invest) {
        echo "Investements Added Successfully";
    } else {
        echo "Investements Not Added";
    }

}

if (isset($_POST['sell_crop'])) {
    $crop_id = $_POST['crop_id'];
    $sell_price = $_POST['sell_price'];
    $qty = $_POST['qty'];
    $mill_id = $_POST['mill_id'];
    $sold= "INSERT INTO `sold_mill`(crop_id,`mill_id`, `sell_qty`, `sell_price`) VALUES ($crop_id,$mill_id, $qty, $sell_price)";
    // echo $sold;
    $sold = mysqli_query($conn, $sold);
    if ($sold) {
        echo "Investements Added Successfully";
    } else {
        echo "Investements Not Added";
    }
}

if (isset($_POST['income_add'])) {
    $crop_id = $_POST['crop_id'];
    $income_amt = $_POST['income_amt'];
    
    $income_source = $_POST['income_source'];
    $income_date = $_POST['date'];
    $sold = "INSERT INTO `income_source`(crop_id,`far_id`, `income_source`, `income_amt`,income_date) VALUES ($crop_id,{$_SESSION['far_id']}, '$income_source', '$income_amt','$income_date')";
    echo $sold;
    $sold = mysqli_query($conn, $sold);
    if ($sold) {
        echo "Income Added Successfully";
    } else {
        echo "Income Not Added";
    }
}

if (isset($_POST['del_crop'])) {
    $crop_id = $_POST['crop_id'];
    $sold = "delete from crops where crop_id=$crop_id";
    $sold = mysqli_query($conn, $sold);
    if ($sold) {
        echo "Crop Deleted";
    } else {
        echo "Failed To Delete";
    }
}



?>