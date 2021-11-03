<?php
    include("../config/db.php");
    $pl_id = $_POST['id_pl'];
    $sql_owned_pl = $sql_pl . "where pl_id = $pl_id";
    $result_owned_pl = mysqli_query($conn,$sql_owned_pl);
    if(mysqli_num_rows($result_owned_pl) > 0){
        while($row_owned_pl = mysqli_fetch_assoc($result_owned_pl)){
            echo $row_owned_pl;
        }
    }