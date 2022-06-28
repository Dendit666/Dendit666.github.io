<?php
require('requirements.php');

// ================РЕГИСТРАЦИЯ================
function registration()
{
    global $pdo;
    if (isset($_POST['name']) and isset($_POST['surname']) and isset($_POST['email']) and isset($_POST['tel']) and isset($_POST['pass']) and isset($_POST['pass_r'])) {
        $pass_len = mb_strlen($_POST['pass']);
        if ($pass_len >= 6) {
            if ($_POST['pass'] == $_POST['pass_r']) {
                $email = $_POST['email'];
                if (user_exist($email)) {
                    $name = $_POST['name'];
                    $surname = $_POST['surname'];
                    $tel= $_POST['tel'];
                    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                    $query = $pdo->prepare("INSERT INTO users SET `name`= ? , `surname`= ? , `email`= ? , `tele`=?, `password`= ?");
                    $query->execute(array($name, $surname , $email,$tel,  $password));
                    $_SESSION['id'] = get_id($email);
                    $_SESSION['name'] = $name;
                    $_SESSION['surname'] = $surname;
                    $_SESSION['email'] = $email;
                    $_SESSION['tel'] = $tel;
                    echo json_encode(['location'=>'/index.php']);
                    exit;
                } else {
                    echo json_encode(['error'=>'email уже существует']);
                    die();
                }
            } else {
                die(json_encode(['error'=>'Пароли не совпадают']));
            }
        } else {
            die(json_encode(['error'=>'Длина пароля меньше 6 символов']));
        }
    } else {
        die(json_encode(['error'=>'Заполните все поля']));
    }
}



// ================ПОЛУЧЕНИЕ ПОЛЬЗОВАТЕЛЯ================
function get_user($email)
{
    global $pdo;
        $query = $pdo->prepare("SELECT * FROM users where `email`= ?");
        $query->execute(array($email));
        return $query->fetch(PDO::FETCH_LAZY);
}
// ================ПРОВЕРКА НА УНИКАЛЬНОСТЬ ПОЛЬЗОВАТЕЛЯ================
function user_exist($email)
{
    global $pdo;
    $query = $pdo->prepare("SELECT `email` FROM users where `email`=?");
    $query->execute(array($email));
    $email = $query->fetchColumn();
    if (empty($email)) : return true;
    else : return false;
    endif;
}
function check_email($email)
{

}
// ================ПОЛУЧЕНИЕ РОЛИ ПОЛЬЗОВАТЕЛЯ================


function get_id($email)
{
    global $pdo;
    $query = $pdo->prepare("SELECT `id` FROM users WHERE `email`=?");
    $query->execute(array($email));
    return $query->fetchColumn();
}
// ================АВТОРИЗАЦИЯ================
function autorization()
{

    if (isset($_POST['email']) and isset($_POST['pass'])) {
        $email = $_POST['email'];
        $password = $_POST['pass'];
        if (verify_user($email, $password)) {
            $_SESSION['email'] = $email;
            echo json_encode(['location'=>'/index.php']);
            exit;
        } else {
            die(json_encode(['error'=>'Неверный email или пароль']));

        }
    } else {
        die(json_encode(['error'=>'Заполните все поля']));
    }
}

// ================ПРОВЕРКА НА ЛОГИН/ПАРОЛЬ================

function verify_user($email, $password)
{

    $user = get_user($email);
    if (!empty($user) and password_verify($password, $user['password'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['surname'] = $user['surname'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['tel'] = $user['tele'];
        return true;
    } else {
        return false;
    }
}

// ================ОБНОВЛЕНИЕ email================


if (isset($_POST['reg_but']))
    registration();
if (isset($_POST['log_but']))
    autorization();
