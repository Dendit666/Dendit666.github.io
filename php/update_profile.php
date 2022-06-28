<?php
require('requirements.php');
// ================ОБНОВЛЕНИЕ ПРОФИЛЯ================
function update_profile()
{
    global $pdo;
    $id = $_SESSION['id'];
    if (mb_strlen($_POST['name'])>0): $name=$_POST['name']; else:$name = $_SESSION['name']; endif;
    if (mb_strlen($_POST['surname'])>0):$surname= $_POST['surname'];else :$surname= $_SESSION['surname']; endif;
    if (mb_strlen($_POST['email'])>0):$email=$_POST['email'];else :$email=$_SESSION['email']; endif;
    if (mb_strlen($_POST['tel'])>0):$tel=$_POST['tel'];else :$tel=$_SESSION['tel']; endif;

    if (check_email($email,$id)) {
        $query = $pdo->prepare("UPDATE `users` SET `name`= ? , `surname`= ? , `email`= ?, `tele`=? WHERE `id`= ? ");
        $query->execute(array($name, $surname, $email, $tel, $id));
        $_SESSION['name'] = $name;
        $_SESSION['surname'] = $surname;
        $_SESSION['email'] = $email;
        $_SESSION['tel']=$tel;
        echo json_encode(['location'=>'/index.php']);
        exit;
    } else {
       die(json_encode(['error'=>'email уже существует']));

    }
}
function check_email($email, $id){
    global $pdo;
    $query = $pdo->prepare("SELECT `email` FROM users where `email`=? and `id`<>?");
    $query->execute(array($email,$id));
    $email = $query->fetchColumn();
    if (empty($email)) : return true;
    else : return false;
    endif;
}

update_profile();
?>