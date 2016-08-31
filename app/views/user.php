<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 30.08.2016
 * Time: 23:08
 */
error_reporting(E_ALL);
session_start();

include ("/components/db.php");



?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <title>Система регистрации и авторизации</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="wrapper">
    <section id="header">
        <div class="container">
            <div class="page-header">
                <h1>Система регистрации и авторизации</h1>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="block">
            <div class="text">
                <h1>Вы авторизованы!</h1>
                <h3>
                    <?php
                    if (isset($myrow['avatar']) or $myrow['avatar'] == ''){


                        if (isset($_COOKIE['login'])) //есть ли переменная с логином в COOKIE.
                        // Должна быть, если пользователь при предыдущем входе нажал на чекбокс "Запомнить меня"
                        {
                            //если да, то вставляем в форму ее значение.
                            // При этом пользователю отображается, что его логин уже вписан в нужную графу
                            echo    ' value="'.$_COOKIE['login'].'">';
                        }

                        print <<<HERE

<!-- Между оператором "print <<<HERE" выводится html код с нужными переменными из php -->
            Вы вошли на сайт, как $_SESSION[login] (<a href='/'>выход</a>)<br>
            <!-- выше ссылка на выход из аккаунта -->

            Ваш аватар:<br>
            <img alt='$_SESSION[login]' src='$myrow[avatar]'>
            <!-- Выше отображается аватар. Его адрес содержит переменная $myrow[avatar] -->
<!-- Именно здесь можно добавлять формы для отправки комментариев и прочего... -->
HERE;
                    }
                    ?></h3>
            </div>
        </div>
    </div>
    <div class="empty"></div>
</div>
<div class="footer"></div>
<script src="http://code.jquery.com/jquery-3.1.0.js"></script>
<script src="js/main.js"></script>
</body>
</html>
