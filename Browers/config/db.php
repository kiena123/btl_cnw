<?php
    $conn = mysqli_connect("localhost","root","","db_manage_website");
    if(!$conn){
        die("Lỗi kết nối SQL");
    }
    
    $sql_ac = "SELECT * FROM account ac ";
    $sql_cl = "SELECT * FROM calendar cl ";
    $sql_pl = "SELECT * FROM plan pl ";
    $sql_tm = "SELECT * FROM team tm ";
    $sql_us = "SELECT * FROM user us ";
    $sql_mb = "SELECT * FROM member mb ";
 