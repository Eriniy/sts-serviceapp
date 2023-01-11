<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="/style/form-style.css">
</head>

<body>
    <div class="container">
        <form method="POST" class="form">
            <div class="link-con">
                <ul class="list-link">
                    <li><a href="sign-in.php" class="item-link">Авторизация</a></li>
                    <li><a href="sign-up.php" class="item-link checked">Регистрация</a></li>
                </ul>
            </div>

            <div class="form-group">
                <label><img src="/img/firstname.svg" class="input-img"></label>
                <input type="text" placeholder="Фамилия" class="form-input" required="required" name="lastname">
            </div>
            <div class="form-group">
                <label><img src="/img/firstname.svg" class="input-img"></label>
                <input type="text" placeholder="Имя" class="form-input" required="required" name="firstname">
            </div>
            <div class="form-group">
                <label><img src="/img/firstname.svg" class="input-img"></label>
                <input type="text" placeholder="nickname" class="form-input" required="required" name="nickname">
            </div>
            <div class="form-group">
                <label><img src="/img/person.svg" class="input-img"></label>
                <input type="text" placeholder="Логин" class="form-input" required="required" name="login">
            </div>
            <div class="form-group">
                <label><img src="/img/lock.svg" class="input-img"></label>
                <input type="password" placeholder="Пароль" class="form-input" required="required" name="password">
            </div>
            <div class="form-group">
                <label><img src="/img/firstname.svg" class="input-img"></label>
                <input type="text" placeholder="Возраст" class="form-input" required="required" name="age">
            </div>

            <div class="form-group radio-box">
                <label><img src="/img/firstname.svg" class="input-img"></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="м">
                    <label class="form-check-label" for="inlineRadio1">Мужской</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="ж">
                    <label class="form-check-label" for="inlineRadio2">Женский</label>
                </div>
            </div>

            <div class="for-btn">
                <button class="btn sign-up-btn">
                    Зарегистрироваться
                </button>
            </div>

        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

<?php

require("connectdb.php");

'<script>console.log(' . $_POST['sex'] . ')</script>';
// require("session.php");

if (!empty($_POST) && isset($_POST['sex'])) {
    $result = mysqli_query($connect, "SELECT * FROM Users WHERE user_login = " . $_POST['login'] . "");
    echo '<script>console.log(' . $result . ')</script>';

    if (!$result || $mysqli_num_rows($result) == 0) {
        mysqli_query(
            $connect,
            "INSERT INTO Users (user_nickname, user_lastname, user_firstname, user_login, user_password, user_sex, user_age) VALUES (
            '" . $_POST['nickname'] . "',
            '" . $_POST['lastname'] . "',
            '" . $_POST['firstname'] . "',
            '" . $_POST['login'] . "',
            '" . md5($_POST["password"]) . "',
            '" . $_POST['sex'] . "',
            " . $_POST['age'] . ")"
        );
    }

    header("Location: sign-in.php");
}


?>