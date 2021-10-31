<?php
    $conn = mysqli_connect("localhost","root","","db_manage_website");
    if(!$conn){
        die("Lỗi kết nối SQL");
    }
    
    $sql_ac = "SELECT * FROM account ";
    $sql_cl = "SELECT * FROM calendar ";
    $sql_pl = "SELECT * FROM plan ";
    $sql_tm = "SELECT * FROM team ";
    $sql_us = "SELECT * FROM user ";
