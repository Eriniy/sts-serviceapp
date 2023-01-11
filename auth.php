<?php
require("connectdb.php");
$result = mysqli_query($connect, "SELECT * FROM Users WHERE
    user_login='" . $_POST["login"] . "' AND
    user_password='" . md5($_POST["password"]) . "'
");

//echo $_POST["login"];
//echo md5($_POST["password"]);

if (!$result || mysqli_num_rows($result) == 0) {
    // echo "Такой пользователь не существует.";
    echo "<script>alert(\"Вы вошли на сайт, как гость.\");</script>";
    // header("Location: sign-in.php");
    exit;
}

session_start();
$_SESSION["user"] = mysqli_fetch_assoc($result);

header("Location: main.php");
