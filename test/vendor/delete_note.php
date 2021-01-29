<?php
    session_start();
    $connect = mysqli_connect('localhost', 'root', 'root', 'app_notes');
    if (!$connect) {
        die('Error connect to DataBase');
    }

    $id = $_SESSION['user']['id'];
    $id_card=$_POST['id_card'];

    $sql = mysqli_query($connect, "DELETE FROM `note` WHERE `id`='$id_card'");

    if ($sql){
    	echo json_encode(true);
    } else {
    	echo json_encode(false);
    }