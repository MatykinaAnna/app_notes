<?php
    session_start();
    $connect = mysqli_connect('localhost', 'root', 'root', 'app_notes');
    if (!$connect) {
        die('Error connect to DataBase');
    }

    $login = $_POST['login'];
    $password = $_POST['password'];

    $error_fields = [];

    if ($login === ''){
        $error_fields[] = "login";
    }
    if ($password === ''){
        $error_fields[] = "password";
    }

    if (!empty($error_fields)){
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "проверьте правильность заполнения полей",
            "fields" => $error_fields,
        ];
        echo json_encode($response);
        die();
    }

    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'");

    if (mysqli_num_rows($check_user) > 0) {

       $user = mysqli_fetch_assoc($check_user);
                     //авторизация
                    $_SESSION['user'] = [
                       "id" => $user['id'],
                        "login" => $user['login'],
                    ];

                    $response = [
                        "status" => true,
                        "checkIn" => false,
                    ];
                    echo json_encode($response);
    } else {
        $response = [
            "status" => false,
            "message" => 'не верный логин или пароль'
        ];
        echo json_encode($response);
    }
?>