<?php
    include("../config/db.php");

    $email = $_POST["txtEmail"];
    $pass = $_POST["txtPassword"];
    $sql = $sql_ac . " where ac_email='$email'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $pass_saved = $row["ac_pass"];
        echo $email;
        if(password_verify( $pass, $pass_saved) and $row['ac_status'] == 1){
            echo "ok";
        }else{
            echo "Pass ko đúng";
        }
    }else{
        echo "Email ko đúng";
    }
    