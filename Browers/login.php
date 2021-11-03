<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../../assets/css/config.css">
  <!-- Javascript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container-fluid mt-5 h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid"
          alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="./controllers/processLogin.php" method="POST">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="txtEmail" name="txtEmail" class="form-control form-control-lg"
              placeholder="Enter a valid username" />
            <label class="form-label" for="txtEmail">Email</label>
          </div>
  
          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="txtPassword" name="txtPassword" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="txtPassword">Mật khẩu</label>
          </div>
                  <?php
                    if(isset($_GET['response'])){
                      if($_GET['response'] == 'noAccuracy'){
                        echo "<p class='text-danger'>Vào email để xác minh</p>";
                      }else if($_GET['response'] == 'pass'){
                        echo "<p class='text-danger'>Sai mật khẩu</p>";
                      }else if($_GET['response'] == 'email'){
                        echo "<p class='text-danger'>Sai email</p>";
                      }

                      // if($_GET['response'] == 'existed'){
                      //   echo "<p class='text-danger'>Email đã tồn tại</p>";
                      // }
                    }

                ?>
          <!-- <div class="d-flex justify-content-between align-items-center"> -->
  
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg" name="btnDangNhap"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng nhập</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
   <!-- Form Đăng nhập-->
<!-- <section class="vh-100 mt-5">
</section> -->