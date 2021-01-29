<?php
    session_start();
    if (!$_SESSION['user']) {
        header('Location: http://test/index.php');
    }
?>

<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Test</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/the_note1.css">

</head>


<body>

    <div class="wrapper">

    	<div class="note">
    		<div class="name">
				<div class="div-name"> Название:</div>
				<div class="text-name"></div>
				<hr>
			</div>

			<div class="description">
				<div class="div-description">Описание:</div>
				<div class="text-description"></div>
				<hr>
			</div>

            <div class="text"></div>

			<hr>

            <div class="date"></div>
            <div class="date1"></div>

    	</div>
        <div class="buttons">
            <button type="sybmit">удалить</button>
            <a name="back" href="notes.php">назад</a>
        </div>



    </div>

<script src="libs/js/jquery-3.4.1.min.js"></script>
<script src="js/show_the_note1.js"></script>

</body>


</html>