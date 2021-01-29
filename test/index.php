<?php
    session_start();

    if ($_SESSION['user']) {
        header('Location: http://test/notes.php');
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
    <link rel="stylesheet" href="css/login.css">

</head>


<body>

    <div class="wrapper">

        <form action="" method="post" class="login">
            <div class="h">Авторизация</div>
            <div class="login">
                <label for="l" class="label-login">Логин:</label>
                <br><input class="login__input" type="text" name="login" value="" id="l">
            </div>
            <hr class="login">
            <div class="password">
                <label for="p" class="label-password">Пароль:</label>
                <br><input type="password" class="password__input" name="password" value="" id="p">
            </div>
            <hr class="password">

            <div class="error"></div>

            <div class="div-button-login">
                <button type="submit" class="button-login">войти</button>
            </div>
            </div>
        </form>

    </div>

<script src="libs/js/jquery-3.4.1.min.js"></script>
<script src="js/login1.js"></script>

</body>

</html>