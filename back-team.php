<?php

include('connectdb.php');
include('session.php');


if (isset($_GET['par'])) {
    if ($_GET['par'] == 'insertTeam') {
        mysqli_query($connect, "INSERT INTO Teams(team_user, team_play) VALUES (" . $_SESSION['user']['user_id'] . ", " . $_POST['play'] . ")");
    } else if ($_GET['par'] == 'insertInventory') {
        mysqli_query($connect, "UPDATE Plays SET inventory_user = " . $_SESSION['user']['user_id'] . " WHERE play_id = " . $_POST['play']);
    } else if ($_GET['par'] == 'deleteTeam') {
        mysqli_query($connect, "DELETE FROM Teams WHERE team_user = " . $_SESSION['user']['user_id'] . " AND team_play = " . $_POST['play']);
    } else if ($_GET['par'] == 'deleteInventory') {
        mysqli_query($connect, "UPDATE Plays SET inventory_user = null WHERE Plays.play_id = " . $_POST['play']);
    }
}
