<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>toys</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='keywords' content='интернет каталог игрушек'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
<!-- Шапка -->
<header class="header">
<div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-4 logo mb-3">
                <a href="/">Главная</a>
            </div>
            <div class="col-12 col-lg-8">
                <div class="row align-items-center justify-content-center text-center">

                    <div class="col-6 col-lg-2 col-md-6 "><a href="/news.php">Новости</a></div>
                    <div class="col-6 col-lg-2 col-md-6 "><a href="/catalog.php">Каталог</a></div>
                    <div class="col-12 col-lg-2 col-md-12 "><a href="/profile.php">Профиль</a></div>

                    <?php if (isset($_SESSION['email'])):?>
                        <div class="col-3"><a href="/php/logout.php" class="btn btn-danger logout">Выйти</a></div>

                    <?php else:?>
                    <div class="col-3"><a href="/login.php" class="btn btn-success login">Логин</a></div>
                    <div class="col-3"><a href="/reg.php" class="btn btn-primary reg">Регистрация</a></div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="Toys6">
    <p>Группа компаний Toys Групп</p>
</div>
<!--О нас  -->
<section class="about">
<div class="container about">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="text-center text-uppercase mb-4 fw-bold">О нас</h2>
            </div>



        </div>
    </div>
</section>

<!-- Подвал -->
<footer class='bg-light w-100' style='position:absolute; bottom:0;'>
    <div class="container bg-light ">
        <div class="row text-center">
            <div class="col-12">
            © 2022 TOYS GROUP
            </div>
        </div>
    </div>
</footer>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="/js/functions.js"></script>
</body>
</html>