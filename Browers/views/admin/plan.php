<?php
        session_start();
        if(!$_SESSION['id']){
                header("location: ../../login.php");
        }
        $us_id = $_SESSION["id"];

    include("header-admin.php");
    include("../../config/db.php");
?>
<?php
        $sql_pl = $sql_pl . " where pl_userid = $us_id ";
        $result_pl = mysqli_query($conn,$sql_pl);
        if(mysqli_num_rows($result_pl) > 0){
                $row_pl = mysqli_fetch_assoc($result_pl);
?>
        <div id="content" class="row">
                <div class="contentMain mx-3">
                        <div class="pb-4 d-flex justify-content-between border-bottom border-3">
                                <div>
                                        <h1 class="m-3"><?php echo $row_pl['pl_name'] ?></h1>
                                        <div><b>Start: </b><?php echo $row_pl['pl_datestart'] ?></div>
                                        <div><b>Dateline: </b><?php echo $row_pl['pl_deadline'] ?></div>
                                </div>
                        </div>  
                        <div class="myText">
                                <h4>Nội dung: </h4>
                                <div class="ms-4">
                                        <?php echo $row_pl['pl_contents'] ?>
                                </div>
                        </div>
                </div>
        </div>                
        
        <?php
        }               
    
?>
<?php
    include("../../config/footer.php");
?>