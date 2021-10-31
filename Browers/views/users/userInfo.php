<?php
    session_start();
    if(!$_SESSION['id']){
        header("location: ../../login.php");
    }
    $us_id = $_SESSION["id"];
    include("../../config/header.php");
?>
<?php
    include("../../config/category.php");
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




<?php
    include("../../config/footer.php");
?>