<?php

include("connectdb.php");
include("session.php");


if (isset($_POST['nickname']) && $_POST['input'] != "") {
    mysqli_query($connect, "UPDATE Users SET user_nickname ='" . $_POST['input'] . "' WHERE user_id =" . $_SESSION['user']['user_id']);
} else if (isset($_POST['lastname']) && $_POST['input'] != "") {
    mysqli_query($connect, "UPDATE Users SET user_lastname ='" . $_POST['input'] . "' WHERE user_id =" . $_SESSION['user']['user_id']);
} else if (isset($_POST['firstname']) && $_POST['input'] != "") {
    mysqli_query($connect, "UPDATE Users SET user_firstname ='" . $_POST['input'] . "' WHERE user_id =" . $_SESSION['user']['user_id']);
} else if (isset($_POST['age']) && $_POST['input'] != "" && is_numeric($_POST['input'])) {
    mysqli_query($connect, "UPDATE Users SET user_age ='" . $_POST['input'] . "' WHERE user_id =" . $_SESSION['user']['user_id']);
}


header('Location: profile.php');
