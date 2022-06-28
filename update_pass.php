<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>BookCoop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <meta name='description' content=''>
    <meta name='keywords' content='интернет каталог книг, книги, книга, магазин книг, каталог книг'>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">


</head>

<body>
    <!-- Шапка -->
    <header class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-4 logo mb-3">
                    <a href="/">BookCoop</a>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-6 col-lg-2 col-md-6 "><a href="/">Главная</a></div>
                        <div class="col-6 col-lg-2 col-md-6 "><a href="/catalog.php">Каталог</a></div>
                        <div class="col-12 col-lg-2 col-md-12 "><a href="/profile.php">Профиль</a></div>

                    </div>
                </div>
            </div>
    </header>


    <!--Форма авторизации  -->
    <section class="update_pass">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h2 class="text-center text-uppercase mb-4 fw-bold">Обновление пароля</h2>
                </div>
            </div>
            <div class="row justify-content-center ">
                <div class="col-12 col-lg-6 border p-4 pass_form">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Старый пароль</span>
                        <input type="password" name='pass' class="form-control" placeholder="Старый пароль">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"> Новый пароль</span>
                        <input type="password" name='new_pass' class="form-control" placeholder="Новый пароль">
                    </div>

                    <button  type="submit" class="btn btn-primary pass_but" name='pass_but'>Обновить пароль</button>

                </div>
            </div>
        </div>
    </section>

    <!-- Подвал -->
    <footer class='bg-light w-100' style='position:absolute; bottom:0;'>
        <div class="container bg-light ">
            <div class="row text-center">
                <div class="col-12">
                    © 2022 Copyright
                </div>
            </div>
        </div>
    </footer>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/functions.js"></script>
</body>

</html>