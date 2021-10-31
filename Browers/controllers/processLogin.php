<?php
    session_start();
    include("../config/db.php");

    $email = $_POST["txtEmail"];
    $pass = $_POST["txtPassword"];
    $sql = $sql_ac . " where ac_email='$email'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $sql_query_us = $sql_us . " where us_email='$email'";
        $result_us = mysqli_query($conn,$sql_query_us);
        if(mysqli_num_rows($result_us) > 0){
            $row_us = mysqli_fetch_assoc($result_us);
        }
        $pass_saved = $row["ac_pass"];
        if(password_verify($pass, $pass_saved) and $row['ac_status'] == 1 and $row['ac_level'] == 1){
            $_SESSION["id"] = $row_us['us_id'];
            header("location: ../views/admin/index.php");
        }else if(password_verify($pass, $pass_saved) and $row['ac_status'] == 1 and $row['ac_level'] == 0){
            $_SESSION["id"] = $row_us['us_id'];
            header("location: ../views/users/index.php");
        }else if(password_verify($pass, $pass_saved) and $row['ac_status'] == 0){
            $response = "noAccuracy";
            header("location: ./login.php");
        }else{
            $response = "pass";
            header("location: ./login.php");
        }
    }else{
        $response = "email";
        header("location: ./login.php/");
    }
    