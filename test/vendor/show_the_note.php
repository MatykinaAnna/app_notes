<?php
    session_start();
    $connect = mysqli_connect('localhost', 'root', 'root', 'app_notes');
    if (!$connect) {
        die('Error connect to DataBase');
    }

    $id = $_SESSION['user']['id'];

    $sql = mysqli_query($connect, "SELECT MAX(`id`) FROM `actual_note` WHERE `id_user`='$id'");
    $max_id = mysqli_fetch_assoc($sql)['MAX(`id`)'];
    $note_array = [];

    $sql = mysqli_query($connect, "SELECT * FROM `actual_note` WHERE `id_user`='$id' AND `id` = $max_id");

    for ($i=0; $i < mysqli_num_rows($sql); $i++){
    	$note_array[$i] = mysqli_fetch_assoc($sql);
    }
    $id_card= $note_array[0]['id_card'];

    $sql = mysqli_query($connect, "SELECT * FROM `note` WHERE `id`='$id_card'");
    $note_array = mysqli_fetch_assoc($sql);

    echo json_encode($note_array);
