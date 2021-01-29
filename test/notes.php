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
    <link rel="stylesheet" href="css/notes1.css">

</head>


<body>

    <div class="wrapper">

        <div class="notes">

        </div>


        <div class="futter">
            <div class="links">
                <a name="create_note" href="create.php">создать заметки</a>
                <a name="out" href="vendor/logout.php">выйти</a>
            </div>


                    <form>
                        <button type="sybmit" class="show">Отобразить</button> по
                        <input type="radio" id='four' name="number_clmn" value="4" checked><label for='four'>4</label>

                        <input type="radio" id='sree' name="number_clmn" value="3"><label for='sree'>3</label>

                        <input type="radio" id='two' name="number_clmn" value="2"><label for='two'>2</label>

                        <input type="radio" id='one' name="number_clmn" value="1"><label for='one'>1</label>
                    </form>
        </div>



    </div>

<script src="libs/js/jquery-3.4.1.min.js"></script>
<script src="js/output_notes1.js"></script>
<script src="js/create_notes1.js"></script>
<!-- <script src="js/show_the_note1.js"></script> -->

</body>

</html>