<?php

if ( isset( $_GET['submit'] ) ) {

$category = $_GET['category'];
$title = $_GET['title'];
$link1 = $_GET['link'];
$language = $_GET['language'];


$link = mysqli_connect("localhost","root","","sih");

$query =  "INSERT INTO training_videos (category,title,link,language) VALUES ('$category','$title','$link1','$language')";

$res = mysqli_query($link,$query);


}
if($res){
    echo "<script>alert('Content added Successfully')</script>";
}

header("refresh:1; url=training-upload.php");
?>