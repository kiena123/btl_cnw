<?php
         session_start();
         if(!$_SESSION['id']){
             header("location: ../../login.php");
         }
         $us_id = $_SESSION["id"];
    include("../../config/header.php");
    include("../../config/db.php");
?>
<?php
    include("../../config/category.php");
?>
        <div id="content" class="row">
                <?php   
                        $sql_search_tm  = $sql_tm . " where tm_userid = '$us_id'";
                        $result_search_tm = mysqli_query($conn,$sql_search_tm);
                ?>
                <div id="mid">
                        <div class="contentMain">
                                <div class="border-bottom boder-3 py-2">
                                                <h1 class="mx-5 py-2">Nhóm của người dùng</h1>
                                                <form action="" method="post" class="ms-5">
                                                        <input type="text" name="txtSearchGroup">
                                                        <button name="btnSubmit" class="btn btn-outline-primary">Tìm</button>
                                                </form>
                                </div>
                                <?php
                                                if($result_search_tm != "0"){
                                                while($row_search_tm = mysqli_fetch_assoc($result_search_tm)){
                                        ?>
                                <ul class="">
                                        <li>
                                                <h4 class="m-3"><?php echo $row_search_tm["tm_name"]; ?></h4>
                                                <div class="ms-5">
                                                        <div><b>Start: </b><?php echo $row_search_tm['tm_datestart'] ?></div>
                                                        <div><b>Dateline: </b><?php echo $row_search_tm['tm_deadline'] ?></div>
                                                </div>
                                        <?php
                                        }
                                        }else{
                                                echo "<div class='m-3'>";
                                                echo "<h2 class='mx-5'>Bạn không có nhóm nào</h2>";
                                                echo "</div>";
                                        }
                                        ?>
                        </div>
                </div>
        </div>


<?php
    include("../../config/footer.php");
?>