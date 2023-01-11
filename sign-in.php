<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" href="/style/form-style.css">
</head>

<body>

    <div class="container">
        <form method="POST" class="form">
            <div class="link-con">
                <ul class="list-link">
                    <li><a href="sign-in.php" class="item-link checked">Авторизация</a></li>
                    <li><a href="sign-up.php" class="item-link">Регистрация</a></li>
                </ul>
            </div>

            <div class="form-group">
                <label><img src="/img/person.svg" class="input-img"></label>
                <input type="text" placeholder="Логин" class="form-input" required="required" name="login">
            </div>
            <div class="form-group">
                <label><img src="/img/lock.svg" class="input-img"></label>
                <input type="password" placeholder="Пароль" class="form-input" required="required" name="password">
            </div>

            <div class="for-btn">
                <button class="btn sign-in-btn" onclick="get()">
                    Войти
                </button>
            </div>

        </form>

        <!-- <div class="modal" tabindex="-1" role="dialog" id="qq">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> -->
    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>

<?php
require("connectdb.php");
$result = mysqli_query($connect, "SELECT * FROM Users WHERE
    user_login='" . $_POST["login"] . "' AND
    user_password='" . md5($_POST["password"]) . "'
");

if (!$result || mysqli_num_rows($result) == 0) {
    exit;
}

session_start();
$_SESSION["user"] = mysqli_fetch_assoc($result);

header("Location: main.php");

?>