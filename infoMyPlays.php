<?php
include('connectdb.php');
include('session.php');

$infoPlay = mysqli_query($connect, "SELECT t1.*, COUNT(Teams.team_play) as countSite FROM (SELECT Plays.*, date_format(Plays.play_datetime, '%d/%m/%Y %H:%i') as formatDate, Places.address, Sports.* FROM Plays JOIN Places JOIN Sports
ON Plays.play_sport = Sports.sport_id AND Plays.play_place = Places.place_id
WHERE Plays.play_id = " . $_GET['id'] . ") as t1 LEFT JOIN Teams
ON t1.play_id = Teams.team_play
GROUP BY t1.play_id");
$infoPlay = mysqli_fetch_assoc($infoPlay);

$infoMore = '<div class="more-play">
                <div class="more-container">
                    <div class="more-info">
                        <img src="/img/icn_close.svg" id="btn-close-info" alt="закрыть" style="float: right; cursor: pointer">
                        <div class="info-block">
                            <p class="address">' . $infoPlay['address'] . '</p>
                            <p class="datetime">' . $infoPlay['formatDate'] . '</p>
                            <p class="namesport">Спорт: ' . $infoPlay['sport_name'] . '</p>
                            <p class="teamlist">Состав команды: ' . $infoPlay['countSite'] . '/' . $infoPlay['play_site'] . '</p>
                            <div class="team-container">';
$getTeamPlay = mysqli_query($connect, "SELECT * FROM Teams JOIN Users
ON Teams.team_user = Users.user_id
WHERE team_play = " . $_GET['id']);
if (mysqli_num_rows($getTeamPlay) != 0) {
    while ($row = mysqli_fetch_assoc($getTeamPlay)) {
        $infoMore .= '<div class="team-item">
                        <div class="row">
                            <div class="col-3">
                                <img src="/img/profile.svg" alt="">
                            </div>
                            <div class="col-9">
                                <p class="item-text nickname-title">' . $row['user_nickname'] . ' ';
        if ($infoPlay['inventory_user'] == $row['user_id']) {
            $infoMore .= '<img src="/img/icn_inventory.svg" style="float: right;">';
        }
        $infoMore .= '</p>
                                <p class="item-text">Firstname, взраст: 10 </p>
                            </div>
                        </div>
                    </div>';
    }
}

$infoMore .=                '</div>
                        <div class="block-out-team"><input class="btn mt-1 btn-out-team" type="button" value="Настройки" data-bs-toggle="modal" data-bs-target="#playModal" id="click-modal" name="' . $infoPlay['play_id'] . '"></div>
                    </div>
                </div>
            </div>
        </div>';


echo $infoMore;
?>

<script>
    document.getElementById("btn-close-info").onclick = function() {
        var block = document.getElementById("more");
        block.style.display = 'none';
    }
</script>

<!-- <button type='button' class='btn btn-show-play' data-bs-toggle='modal' data-bs-target='#exampleModal' id='click-modal' name='" . $row[' play_id'] . "'>Вступить</button> -->