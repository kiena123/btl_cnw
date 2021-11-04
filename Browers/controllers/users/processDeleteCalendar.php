<?php
session_start();
if(!$_SESSION['id']){
    header("location: ../../login.php");
}
$us_id = $_SESSION['id'];
if(isset($_GET["cl_id"])){
    $cl_id =  $_GET["cl_id"];
}
include("../../config/header.php");
include("../../config/db.php");

    if(isset($_GET['cl_id'])) {
        $id = $_GET['cl_id'];
        $sql_delete_cl = "DELETE FROM calendar where cl_id = $id";
        $result_delete_cl = mysqli_query($conn, $sql_delete_cl);
        header('location: ../../views/users/calendar.php');
    }