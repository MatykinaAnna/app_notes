<?php
    session_start();
    $connect = mysqli_connect('localhost', 'root', 'root', 'app_notes');
    if (!$connect) {
        die('Error connect to DataBase');
    }

    $id = $_SESSION['user']['id'];

    $note = mysqli_query($connect, "SELECT * FROM `note` WHERE `id_user`= $id");
    $note_array = [];

    for ($i=0; $i < mysqli_num_rows($note); $i++){
    	$note_array[$i] = mysqli_fetch_assoc($note);
    }

    $response = [
        "note_array" =>$note_array,
    ];
    echo json_encode($response);

?>