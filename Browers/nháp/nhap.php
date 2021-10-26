<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Javascript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </head>
    <body>
        <header class="border border-bottom-1 bg-light">
            <div class="m-2 d-flex justify-content-between">
                <div class="ms-2">
                    <button id="menuBtn" class="border"><i class="fas fa-bars m-2"></i></button>
                    <img src="./images/logoDHTL.jfif" class="ms-3" width="50" alt="logo">
                </div>
                <div class="me-2">
                    <button class="btn btn-warning">Đăng ký</button>
                    <button class="btn btn-warning">Đăng nhập</button>
                </div>
            </div>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div id="category" class="col col-md-3 bg-dark text-light position-fixed overflow-auto" style="left: -700px; height: 670px">
                        <div class="text-light my-2">
                            <a href="" class="text-decoration-none text-danger">Trang chủ</a>
                        </div>
                        <div class="text-light my-2">
                            Lịch
                            <ul class="">

                            </ul>
                        </div>
                        <div class="text-light my-2">
                            Các kế hoạch
                            <ul></ul>
                        </div>
                        <div class="text-light my-2">
                            Nhóm của bạn
                            <ul></ul>
                        </div>
                    </div>
                    <div class="overflow-auto h-100">


                    </div>
                </div>
            </div>
        </main>
        <footer>

        </footer>
        <script src="./js/config.js"></script>
    </body>
</html>