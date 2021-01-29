<?php
    session_start();
    $connect = mysqli_connect('localhost', 'root', 'root', 'app_notes');
    if (!$connect) {
        die('Error connect to DataBase');
    }

    $id = $_SESSION['user']['id'];
    $id_card = $_POST['id_card'];

    $sql = mysqli_query($connect, "INSERT INTO `actual_note` (`id`, `id_user`, `id_card`) VALUES (NULL, '$id', '$id_card')");

    if ($sql){
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }

?>