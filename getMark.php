<?php
include('connectdb.php');




$placeInfo = mysqli_query($connect, "SELECT * FROM Places WHERE place_id = " . $_GET['id']);
$getPlaceInfo = mysqli_fetch_assoc($placeInfo);
$getMark = mysqli_query($connect, "SELECT Places.*, Plays.*, Sports.sport_name FROM Places JOIN Plays JOIN Sports
ON Plays.play_sport = Sports.sport_id AND Plays.play_place = Places.place_id
WHERE Plays.play_place = " . $_GET['id'] . " AND DATE(Plays.play_datetime) = " . $_GET['date']);

$contentPlace = "<input class='btn btn-primary' type='button' value='Закрыть' id='close-place'><br>
<div class='hint'>
        <h5>" . $_GET['address'] . "</h5>
        <div class='row'>";
$contentPlace .=
    "<div class='col p-1'><img src='/img/" . (($getPlaceInfo['hasToilet'] == 'нет') ? 'dis_' : '') . "icn_toilet.svg' class='comfort' alt='туалет'></div>
            <div class='col p-1'><img src='/img/" . (($getPlaceInfo['hasClinic'] == 'нет') ? 'dis_' : '') . "icn_clinic.svg' class='comfort' alt='медпункт'></div>
            <div class='col p-1'><img src='/img/" . (($getPlaceInfo['hasEatery'] == 'нет') ? 'dis_' : '') . "icn_eat.svg' class='comfort' alt='еда'></div>
            <div class='col p-1'><img src='/img/" . (($getPlaceInfo['lighting'] == 'нет') ? 'dis_' : '') . "icn_light.svg' class='comfort' alt='освещение'></div>
            <div class='col p-1'><img src='/img/" . (($getPlaceInfo['hasDressingRoom'] == 'нет') ? 'dis_' : '') . "icn_dress.svg' class='comfort' alt='раздевалка'></div>
        </div>
    </div>
<div class='mark-container'>";

while ($row = mysqli_fetch_assoc($getMark)) {
    $getTeam = mysqli_query($connect, "SELECT COUNT(*) as teamCount, TIME_FORMAT(TIME(Plays.play_datetime), '%k:%i') as time FROM Plays JOIN Teams ON Plays.play_id = Teams.team_play
    WHERE DATE(Plays.play_datetime) = '2023-01-16' AND Plays.play_id = " . $row['play_id']);
    $teamInfo = mysqli_fetch_assoc($getTeam);

    $contentPlace .=
        "
    <div class='mark-item'>
        <div class='row'>
            <div class='col-4'>
                <img src='../img/icn-sport.svg' style='width: 80%'>
            </div>
            <div class='col-8'>
                <p class='desc'>время: " . $teamInfo['time'] . "</p>
                <p class='desc'>спорт: " . $row['sport_name'] . "</p>
                <p class='desc'>команда: " . $teamInfo['teamCount'] . "/" . $row['play_site'] . " чел</p>
                <button type='button' class='btn btn-show-play' data-bs-id='1'  data-bs-toggle='modal' data-bs-target='#exampleModal' id='click-modal' onclick='getIdModal(" . $row['play_id'] . ")'>Вступить</button>
            </div>
            
        </div>
        
    </div>
    ";
}

$contentPlace .= "</div>";

echo $contentPlace;

?>
<script>
    document.getElementById("close-place").onclick = function() {
        var info = document.getElementById("info-mark");
        var old = document.getElementById("filter");
        info.style.display = 'none';
        old.style.display = 'block';
    }

    function show_play(play) {
        console.log(play);
        return play;
    }
</script>