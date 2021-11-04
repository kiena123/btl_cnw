<?php
    session_start();
    if(!$_SESSION['id']){
        header("location: ../../login.php");
    }
    $us_id = $_SESSION['id'];
    include("../../config/db.php");
    if(isset($_POST["submit"])){
        $cl_id = $_POST["cl_id"];
        $cl_planid = $_POST["sltPlan"];
        $cl_time_start = $_POST["txtTimeStart"];
        $cl_date_start = $_POST["txtDateStart"];
        $cl_time_end = $_POST["txtTimeEnd"];
        $cl_date_end = $_POST["txtDateEnd"];
        $cl_name = $_POST["txtNameSchedule"];
        $cl_contents = $_POST["txtContentSchedule"];

        $cl_start = $cl_date_start."  ".$cl_time_start;
        $cl_end = $cl_date_end."  ".$cl_time_end;
        
        if(!isset($_POST["cl_id"])){
            $sql_add_pl = "INSERT INTO calendar(cl_planid,cl_start,cl_end,cl_name,cl_contents)
                            VALUE ($cl_planid,'$cl_start','$cl_end','$cl_name','$cl_contents')";
            $result_add_pl = mysqli_query($conn,$sql_add_pl);
            header("location: ../../views/users/detailsPlan.php?pl_id=$cl_planid");
        }else{
            $sql_fix_pl = "UPDATE calendar SET cl_planid = $cl_planid, cl_start = '$cl_start',cl_end = '$cl_end',
                            cl_name = '$cl_name',cl_contents = '$cl_contents' where cl_id = $cl_id";
            $result_fix_pl = mysqli_query($conn,$sql_fix_pl);
            header("location: ../../views/users/detailsPlan.php?pl_id=$cl_planid");
        }
    }