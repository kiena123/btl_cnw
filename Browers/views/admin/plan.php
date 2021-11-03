<?php
    session_start();
    if(!$_SESSION['id']){
        header("location: ../../login.php");
    }
    $id_us = $_SESSION['id'];
    include("header-admin.php");
?>
    <div id="content" class="row">
        <h4>Thông tin người dùng</h4>
        <div id="mid">
            <div class="contentMain">
                    <h4>Nhóm 1</h4>
            </div>
            <div class="contentMain">
                    <h4>Nhóm 2</h4>
            </div>
            <div class="contentMain">
                    <h4>Nhóm 3</h4>
            </div>
            <div class="contentMain">
                    <h4>Nhóm 4</h4>
            </div>
            <div class="contentMain">
                    <h4>Nhóm 5</h4>
            </div>
        </div>
    </div>