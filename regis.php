<?php
require("connectdb.php");
// require("session.php");

if (!empty($_POST)) {
    $result = mysqli_query($connect, "SELECT * FROM users WHERE user_login=\"" . $_POST['login'] . "\"");

    if (mysqli_num_rows($result) == 0) {
        mysqli_query(
            $connect,
            "INSERT INTO Users (Users.user_nickname, Users.user_lastname, Users.user_firstname, Users.user_login, Users.user_password, Users.user_sex, Users.user_age) VALUES (
            " . $_POST['nickname'] . ",
            " . $_POST['lastname'] . ",
            " . $_POST['firstname'] . ",
            " . $_POST['login'] . ",
            " . md5($_POST["password"]) . ",
            " . $_POST['sex'] . "),
            " . $_POST['age'] . ")"
        );

        if (mysqli_affected_rows($connect) == 0) {
            echo '<script language="javascript">';
            echo 'alert("message successfully sent")';
            echo '</script>';

            // header("Location: registration.php");
        }
    }
    //$id = mysqli_insert_id($connect);
    // header("Location: allpages.php");
}
