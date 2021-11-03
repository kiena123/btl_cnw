<?php
    session_start();
    if(!$_SESSION['id']){
        header("location: ../../login.php");
    }
    $id_us = $_SESSION['id'];
    include("../../config/header.php");
?>
<?php
    include("../../config/category.php");
?>
        <div id="content" class="row">
            <div id="mid" class="left">
                <img src="../../assets/images/cac-phan-mem-quan-ly-cong-viec-tot-nhat.png" class="w-100" alt="Manager">
            </div>
            <div class="right">
                <div class="contentMain">
                    <h4>Kế hoạch gần hết hạn</h4>
                </div>
                <div class="contentMain">
                    <h4>Thời khóa biểu trong ngày</h4>
                    <div><?php
                        echo $id_us;
                    ?></div>
                </div>
            </div>
        </div>


<?php
    include("../../config/footer.php");
?>