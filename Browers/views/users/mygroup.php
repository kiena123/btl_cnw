<?php
         session_start();
         if(!$_SESSION['id']){
             header("location: ../../login.php");
         }
         $us_id = $_SESSION["id"];
    include("../../config/header.php");
    include("../../config/db.php");
    include("../../config/category.php");
?>
<?php

?>

        <div id="content" class="row">
                <?php   
                        $sql_search_mb  = $sql_mb . ",team tm where tm.tm_id = mb.mb_teamid and mb.mb_userid = '$us_id'";
                        $result_search_mb = mysqli_query($conn,$sql_search_mb);
                        if(isset($_POST['btnTim'])){
                                $tennv = $_POST['txtHoTen'];
                                $chucvu = $_POST['txtChucVu'];
                                $mayban = $_POST['txtMayBan'];
                                $email = $_POST['txtEmail'];
                                $sodidong = $_POST['txtDiDong'];
                                $madv = $_POST['sltMaDV'];
                        
                                if($tennv != ""){
                                    $sql = $sql . " and (nv.tennv like '%$tennv' or nv.tennv like '$tennv%' or nv.tennv like '%$tennv%')";
                                }
                                if($chucvu  != ""){
                                    $sql = $sql . " and (nv.chucvu like '%$chucvu' or nv.chucvu like '$chucvu%' or nv.chucvu like '%$chucvu%')";
                                }
                                if($mayban  != ""){
                                    $sql = $sql . " and (nv.mayban like '%$mayban' or nv.mayban like '$mayban%' or nv.mayban like '%$mayban%')";
                                }
                                if($email  != ""){
                                    $sql = $sql . " and (nv.email like '%$email' or nv.email like '$email%' or nv.email like '%$email%')";
                                }
                                if($sodidong  != ""){
                                    $sql = $sql . " and (nv.sodidong like '%$sodidong' or nv.sodidong like '$sodidong%' or nv.sodidong like '%$sodidong%')";
                                }
                                if($madv  != ""){
                                    $sql = $sql . " and (nv.madv like '%$madv' or nv.madv like '$madv%' or nv.madv like '%$madv%')";
                                }
                        }
                ?>
                <div id="mid">
                        <div class="contentMain">
                                <div class="border-bottom boder-3 py-2">
                                                <h1 class="mx-5 py-2">Nhóm của người dùng</h1>
                                                <form action="" method="post" class="ms-5">
                                                        <input type="text" name="txtSearchGroup">
                                                        <button type="submit" name="btnSubmit" class="btn btn-outline-primary">Tìm</button>
                                                </form>
                                </div>
                                <ul class="">
                                <?php
                                                if($result_search_mb != "0"){
                                                while($row_search_mb = mysqli_fetch_assoc($result_search_mb)){
                                        ?>
                                        <li>
                                                <h4 class="m-3"><?php echo $row_search_mb["tm_name"]; ?></h4>
                                                <div class="ms-5">
                                                        <ul>
                                                                <?php
                                                                        $sql_listed_mb_us = $sql_us .",member mb where us_id = mb_userid and mb_teamid =". $row_search_mb["tm_id"];
                                                                        $result_listed_mb_us =  mysqli_query($conn,$sql_listed_mb_us);
                                                                        if($result_listed_mb_us != "0"){
                                                                                while($row_listed_mb_us = mysqli_fetch_assoc($result_listed_mb_us)){
                                                                ?>
                                                                        <li class="text-dark"><a href="./userInfo.php?userid=<?php echo $row_listed_mb_us["us_id"]; ?>"><?php echo $row_listed_mb_us["us_name"]; ?></a></li>
                                                                <?php
                                                                                }
                                                                        }
                                                                ?>
                                                        </ul>
                                                </div>
                                        <?php
                                        }
                                        }else{
                                                echo "<div class='m-3'>";
                                                echo "<h2 class='mx-5'>Bạn không có nhóm nào</h2>";
                                                echo "</div>";
                                        }
                                        ?>
                                        </li>
                                </ul>
                        </div>
                </div>
        </div>


<?php
    include("../../config/footer.php");
?>