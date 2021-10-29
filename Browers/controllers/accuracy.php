<?php
    include("../config/db.php");
    $confirmed = $_GET["confirmed"];
    $email = $_GET["email"];

    $sql = $sql_ac . " where ac_email='$email'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if($confirmed == $row['ac_confirmed']){
            $sql_update_ac = "UPDATE account set ac_status = 1 where ac_email='$email' ";
        }
        echo "Đã thành công";
    }