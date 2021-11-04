<?php
    session_start();
    if(!$_SESSION['id']){
        header("location: ../../login.php");
    }
    
    if(isset($_GET["userid"])){
        $us_id = $_GET["userid"];
    }else{
        $us_id = $_SESSION["id"];
    }
    include("../../config/header.php");
    include("../../config/category.php");
    include("../../config/db.php");
?>
<?php
    $sql_details_us = $sql_us . " where us_id = $us_id";
    $result_details_us = mysqli_query($conn,$sql_details_us);
    if($result_details_us != "0"){
        $row_details_us = mysqli_fetch_assoc($result_details_us);
?>

    <div id="content">
        <div class="contentMain">
            <div class="container emp-profile">
                <form method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-head my-4 ms-5">
                                <h2>Chi tiết thông tin người dùng</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 my-3">
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Tên người dùng</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $row_details_us["us_name"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $row_details_us["us_email"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 my-2">
                                            <label>Số điện thoại</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="my-2"><?php echo $row_details_us["us_phone"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 my-2">
                                            <label>Ngày đăng ký</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="my-2"><?php echo $row_details_us["us_regdate"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Nút process -->
                            </div>
                        </div>
                    </div>
                </form>           
            </div>
        </div>
    </div>


<?php
    }
?>

<?php
    include("../../config/footer.php");
?>