<?php
include './connect.php';
if(isset($_POST['sales_add'])){
    $date= $_POST['date'];
    $product= $_POST['product'];
    $amt= $_POST['amt'];
    $qty= $_POST['qty'];
    $q= "INSERT INTO `mill_sales`(mill_id,`product`, `quantity`, `date`, `price`) VALUES ({$_SESSION['mill_id']},'$product',$qty,'$date',$amt)";
    // echo $q;
    $q = mysqli_query($conn,$q);
    if($q){
        echo "Sales Added";
    }else{
        echo "Sales Not Added";
    }
}

if (isset($_POST['del_sales'])) {
    $id = $_POST['id'];
    $q = "DELETE from mill_sales where sale_id=$id";
    // echo $q;
    $q = mysqli_query($conn, $q);
    if ($q) {
        echo "Sales Deleted";
    } else {
        echo "Sales Not Deleted";
    }
}
?>