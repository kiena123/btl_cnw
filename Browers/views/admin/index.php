<?php
    session_start();
    if(!$_SESSION['id']){
        header("location: ../../login.php");
    }
    $id_us = $_SESSION['id'];
    include("header-admin.php");
    $conn = mysqli_connect('localhost', 'root', '', 'db_manage_website');
    if (!$conn) {
     die("Kết nối thất bại  .Kiểm tra lại các tham số    khai báo kết nối");
    }

?>
    <main class="bg-white">
    <div id="content" class="row">
        <div class="container">
            <a href="add-user.php" class="mt-4 "><button class="btn btn-dark mt-4">Thêm người dùng</button></a>
            <div class="row">
                <div></div>
                <div class="directory-table">
                    <div class="table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Họ và Tên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">chi tiết</th>
                                    <th scope="col">Sửa</th>
                                    <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT us.us_id, us.us_name, us.us_email, us.us_phone from user us ";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                            <td><?php echo $row['us_name']; ?></td>
                                            <td><?php echo $row['us_email']; ?></td>
                                            <td><?php echo $row['us_phone']; ?></td>
                                            <td><a href="detail-user.php?userid=<?php echo $row['us_id']; ?>"><i class="fas fa-info-circle"></i></a></td>
                                            <td><a href="fix-user.php?userid=<?php echo $row['us_id']; ?>"><i class="text-dark fas fa-edit"></i></a></td>
                                            <td><a href="delete-user.php?userid=<?php echo $row['us_id']; ?>"><i class="text-dark fas fa-trash-alt"></i></a></td>
                                        </tr>
                                <?php
                                        $i++;
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>