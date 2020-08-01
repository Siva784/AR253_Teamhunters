<?php

if(isset($_POST['far_register'])){
    $ad_no = $_POST['faadharno'];
    $fname=$_POST['fname'];
    $fstate = $_POST['fstate'];
    $fvillage = $_POST['fvname'];
    $faddress = $_POST['faddress'];
    $phnum = $_POST['phnum'];
    $fpassword = $_POST['fpassword'];

    $query = "INSERT INTO `farmers`(`far_name`, `far_phnum`, `far_passwd`, `far_adhaar`, `far_state`, `far_village`, `far_address`) VALUES ('$fname','$phnum','$fpassword','$ad_no','$fstate','$fvillage','$faddress')";
    $q = mysqli_query($conn,$query);
    if($q){
        echo "Farmer Registered";
    }
}

?>