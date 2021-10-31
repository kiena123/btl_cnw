<?php
        session_start();
        if(!$_SESSION['id']){
        header("location: ../../login.php");
        }
    include("../../config/header.php");
?>
<?php
    include("../../config/category.php");
?>
        <div id="content" class="row">
            <div class="contentMain mx-3">
                <div class="pb-4 border-bottom border-3">
                    <h1 class="m-3">Kế hoạch 1</h1>
                    <div><b>Start: </b></div>
                    <div><b>Dateline: </b></div>
                </div>
                <div class="myText">
                    Nội dung
                </div>
            </div>
                <!-- <form action="" method="post">
                        <input type="text" name="txtSearchPlan">
                        <select name="sltFilter" id="">
                                <option value="0">Tất cả</option>
                                <option value="1">Đang xảy ra</option>
                        </select>
                        <button name="btnSubmit" class="btn btn-outline-primary">OK</button>
                </form>
                <div id="mid">
                        <div class="contentMain">
                                <h4>Kế hoạch 1</h4>
                        </div>
                        <div class="contentMain">
                                <h4>Kế hoạch 2</h4>
                        </div>
                        <div class="contentMain">
                                <h4>Kế hoạch 3</h4>
                        </div>
                        <div class="contentMain">
                                <h4>Kế hoạch 4</h4>
                        </div>
                        <div class="contentMain">
                                <h4>Kế hoạch 5</h4>
                        </div>
                </div> -->
        </div>

<?php
    
?>
<?php
    include("../../config/footer.php");
?>