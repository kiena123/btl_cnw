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
            <div id="mid" class="left">
                <div class="contentMain">
                    <h4>Thời gian biểu của ngày theo tuần</h4>
                    <form method="post">
                        <input id="date" type="date" name="inputDate">
                        <button type="submit" class="btn btn-primary" name="btnDangNhap"> Đăng nhập</button>
                    </form>
                    <div class="schedule">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                            if(isset($_POST['btnDangNhap'])){
                                $date_str = $_POST['inputDate'];
                                $date = explode("-",$date_str);
                                echo "<pre>";
                                echo print_r($date);
                                echo "</pre>";
                                $a= mktime(00,00,00,$date[1], $date[2], $date[0]);
                                echo "<pre>";
                                echo print_r(getdate($a));
                                echo "</pre>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="contentMain">
                    <h4>Kế hoạch gần hết hạn</h4>
                </div>
            </div>
        </div>

<?php
    
?>
<?php
    include("../../config/footer.php");
?>