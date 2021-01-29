<?php
    session_start();
    $connect = mysqli_connect('localhost', 'root', 'root', 'app_notes');
    if (!$connect) {
        die('Error connect to DataBase');
    }

    $name = $_POST['name'];
    $description = $_POST['description'];
    $text = $_POST['text'];
    $id = $_SESSION['user']['id'];
    $date = $_POST['date'];

    $sql = mysqli_query($connect, "INSERT INTO `note` (`id`, `id_user`, `name`, `description`, `create_date`, `text`) VALUES (NULL, '$id', '$name', '$description', '$date', '$text')");

    if ($sql){
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
