<?php
    
    include("../config/db.php");

        $name = $_POST["txtName"];
        $email = $_POST["txtEmail"];
        $pass1 = $_POST["txtpass1"];
        
        $sql_email_ac= $sql_ac . " where ac_email='$email'";
        $result_ac = mysqli_query($conn,$sql_email_ac);
        if(mysqli_num_rows($result_ac) > 0){
            $response = "existEmail";
            // header("location: ../register.php?response=$reponsive");
        }else{
            $pass = password_hash($pass1, PASSWORD_DEFAULT);
            $sql_add_ac = "INSERT INTO account(ac_email,ac_pass)
                            VALUE ('$email','$pass')";
            $result_ac = mysqli_query($conn,$sql_add_ac);
            
            $sql_add_us = "INSERT INTO user(us_name,us_email)
                            VALUE ('$name','$email')";
            $result_us = mysqli_query($conn,$sql_add_us);
    
            
            $response = "success";
            // header("location: ../register.php?response=$response");
        }
        echo $response;