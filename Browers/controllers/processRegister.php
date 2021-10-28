<?php
    include("../config/db.php");

        $name = $_POST["txtName"];
        $email = $_POST["txtEmail"];
        $pass1 = $_POST["txtpass1"];
        
        $sql_email_us= $sql_us . " where email='$email'";
        $result_us = mysqli_query($conn,$sql_email_us);
        if(mysqli_num_rows($result_us) > 0){
            $reponsive = "existEmail";
            header("location: ../register.php?response=$reponsive");
        }else{
            $sql_add_us = "INSERT INTO user(us_name,us_email)
                            VALUE ('$name','$email')";
            $result_us = mysqli_query($conn,$sql_add_us);
    
            $pass = password_hash($pass1, PASSWORD_DEFAULT);
            $sql_add_ac = "INSERT INTO account(ac_email,ac_pass)
                            VALUE ('$email','$pass')";
            $result_ac = mysqli_query($conn,$sql_add_ac);
            
            $response = "success";
            header("location: ../register.php?response=$response");
        }