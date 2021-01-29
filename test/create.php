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

    <title>create_note</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/create1.css">

</head>

<body>
	<div class="wrapper">

		<form action="" method="post" class="form_crate">
			<div class="h">Заметка</div>
			<div class="name">
				<label for="n" class="label-name">Название:</label>
				<input class="name__input" type="text" name="name" value="" id="n">
				<hr class='name'>
			</div>

			<div class="description">
				<label for="d" class="label-description">Описание:</label>
				<input class="description__input" type="text" name="description" value="" id="d">
				<hr class='description'>
			</div>

			<div class="text">
				<textarea class="note__text" name='text'></textarea>
				<hr class='text'>
			</div>

			<div class="error"></div>

			<div class="buttons">
				<button  type="submit" class="btn-create">
					создать
				</button>
				<a name="out" href="notes.php" class="cancel">
					отмена
				</a>
			</div>

		</form>

	</div>

<script src="libs/js/jquery-3.4.1.min.js"></script>
<script src="js/create_notes1.js"></script>

</body>

</html>