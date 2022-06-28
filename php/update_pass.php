<?php
require('requirements.php');

// ================ОБНОВЛЕНИЕ ПАРОЛЯ================
function update_password()
{
    global $pdo;
    $email = $_SESSION['email'];
    $query = $pdo->prepare("SELECT `password` FROM users where `email`=?");
    $query->execute(array($email));
    $password = $query->fetchColumn();
    if (password_verify($_POST['pass'], $password)) {
        if (mb_strlen($_POST['new_pass']) >= 6) {


            if (!password_verify($_POST['new_pass'], $password)) {
                $query = $pdo->prepare("UPDATE `users` SET `password`=? where `email`=?");
                $query->execute(array(password_hash($_POST['new_pass'], PASSWORD_DEFAULT),$email));
                echo json_encode(['location'=>'/index.php']);
        exit;
            } else {
                die(json_encode(['error'=>'Новый пароль должен отличаться от старого']));
            }
        }else {
            die(json_encode(['error'=>'Пароль должен быть не менее 6 символов']));
        }
    } else {
        die(json_encode(['error'=>'Неверный пароль']));
    }
}

update_password();
?>