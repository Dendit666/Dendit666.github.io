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
                    <div class="col-6 col-lg-2 col-md-6"><a href="/news.php">Новости</a></div>
                    <div class="col-6 col-lg-2 col-md-6"><a href="/catalog.php">Каталог</a></div>
                    <div class="col-12 col-lg-2 col-md-12"><a href="/profile.php">Профиль</a></div>
                    <?php if (isset($_SESSION['email'])):?>
                        <div class="col-3"><a href="/logout.php" class="btn btn-danger logout">Выйти</a></div>

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
<!--Профиль  -->
<section class="profile">
<div class="container">
        <?php if (isset($_SESSION['email'])):?>
        <div class="row text-center">
            <div class="col-12">
                <h2 class="text-center text-uppercase mb-4 fw-bold">профиль</h2>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-4 border">
                <div>Фамилия: <span class="surname"><?=$_SESSION['surname']?></span></div>
                <div>Имя: <span class="name"><?=$_SESSION['name']?></span></div>
                <div>Email: <span class="email"><?=$_SESSION['email']?></span></div>
                <div>Телефон: <span class="tel"><?=$_SESSION['tel']?></span></div>
                <a href="update_profile.php" class="change link-primary" style='color:#0d6efd !important;'>Изменить данные</a> <br>
                <a href="update_pass.php" class="change_pass link-primary" style='color:#0d6efd !important;'>Изменить пароль</a>
            </div>
            <div class="col-8 border">

            </div>
        </div>
        <?php else: ?>
            <div class="row">
                <div class="h1 text-center text-uppercase mb-5 mt-5 fw-bold">Вы не авторизованы, пожалуйста, войдите в <a href="/login.php" style='color:#0d6efd !important;'> аккаунт</a></div>
            </div>
        <?php endif;?>
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