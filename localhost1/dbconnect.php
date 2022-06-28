<?php
        // Указываем кодировку
        header('Content-Type: text/html; charset=utf-8');

        $server = "localhost"; /* имя хоста (уточняется у провайдера), если работаем на локальном сервере, то указываем localhost */
        $username = "root"; /* Имя пользователя БД */
        $password = "root"; /* Пароль пользователя, если у пользователя нет пароля то, оставляем пустым */
        $database = "newbaza76"; /* Имя базы данных, которую создали */

        $conn = mysqli_connect($servername, $username, $password, $database);
        // Проверяем соединение
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";
        mysqli_close($conn);
    ?>