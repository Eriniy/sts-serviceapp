<?php
include('connectdb.php');
include('session.php');

$idPlays = mysqli_query($connect, "SELECT *, DATE_FORMAT(Plays.play_datetime,'%d/%m %H:%i') as formatDate FROM Places JOIN Plays JOIN Sports ON Plays.play_place = Places.place_id AND Plays.play_sport = Sports.sport_id
WHERE Plays.play_id = " . $_GET['id']);
$getIdPlays = mysqli_fetch_assoc($idPlays);

?>
<div class="body-conainer">
    <div class="row mb-4">
        <div class="col-6">
            <p class="upper-title">Участники команды</p>
        </div>
        <div class="col-6">
            <div class="config-play">
                <p><?php echo $getIdPlays['formatDate'] ?></p>
                <p><?php echo $getIdPlays['sport_name'] ?></p>
            </div>
        </div>
    </div>
    <p>ответственный за инвентарь</p>
    <div class="inventary">

        <div class="inventary-box">
            <?php
            if ($getIdPlays['inventory_user'] == '') {
            ?>
                <button class="btn btn-primary" formmethod="POST" name="plusInventoryUser" id="insertInventory" value="<?php echo $_GET['id'] ?>">+взять</button>

            <?php
            } else {
                $getInventory = mysqli_query($connect, "SELECT Users.* FROM Plays JOIN Users ON Plays.inventory_user = Users.user_id WHERE Plays.play_id =" . $_GET['id']);
                $getInventory = mysqli_fetch_assoc($getInventory);
            ?>
                <button class="btn btn-primary disabled" name="plusInventoryUser" id="insertInventory" formmethod="POST">+взять</button>
                <div class="item">
                    <?php echo $getInventory['user_lastname'] ?> <?php echo $getInventory['user_firstname'] ?>
                    <img src="/img/krest.svg" id="deleteInventory" alt="удалить" class="deleteInventory">
                </div>
            <?php
            }
            ?>
        </div>

    </div>
    <?php
    $getCountTeamPlay = mysqli_query($connect, "SELECT COUNT(Teams.team_play) as teamCount, Plays.play_site FROM Plays LEFT JOIN Teams
ON Plays.play_id = Teams.team_play
WHERE Plays.play_id = " . $_GET['id'] . "
GROUP BY Plays.play_id");
    $getCountTeamPlay = mysqli_fetch_assoc($getCountTeamPlay);
    ?>
    <div class="row mt-2">
        <div class="col-6">
            <p>команда</p>
        </div>
        <div class="col-6">
            свободных мест: <?php echo $getCountTeamPlay['teamCount'] ?>/<?php echo $getCountTeamPlay['play_site'] ?>
        </div>
    </div>

    <div class="team-container">

        <div class="team-box">
            <?php
            $userTeam = mysqli_query($connect, "SELECT Users.* FROM Users JOIN Teams ON Teams.team_user = Users.user_id
WHERE Teams.team_play = " . $_GET['id']);
            $checkBtn = 1;
            while ($row = mysqli_fetch_assoc($userTeam)) {
            ?>
                <div class="team-item">
                    <?php
                    echo $row['user_lastname'];
                    echo " ";
                    echo $row['user_firstname'];
                    if ($row['user_id'] == $_SESSION['user']['user_id']) {
                        $checkBtn = 0;
                    ?>
                        <img src="/img/krest.svg" alt="удалить" class="deleteFromTeam" id="deleteTeam">
                    <?php
                    }
                    ?>
                </div>
            <?php
            }

            ?>


            <!-- BUTTON INSERT TEAM-->
            <?php
            if ($getCountTeamPlay['teamCount'] == $getCountTeamPlay['play_site'] || $checkBtn == 0) {
            ?>
                <div class="add-to-team"><button class="btn btn-primary disabled" name="insertTeam" id="insertTeam" value="<?php echo $_GET['id'] ?>">+вступить</button></div>
            <?php
            } else { ?>
                <div class="add-to-team"><button type="button" class="btn btn-primary" name="insertTeam" id="insertTeam" value="<?php echo $_GET['id'] ?>">+вступить</button></div>
            <?php } ?>


        </div>
    </div>
</div>

<script>
    document.getElementById('insertTeam').onclick = function() {
        sendAjaxForm("back-team.php?par=insertTeam");
    }
    document.getElementById('insertInventory').onclick = function() {
        sendAjaxForm("back-team.php?par=insertInventory");
    }


    document.getElementById('deleteTeam').onclick = function() {
        sendAjaxForm("back-team.php?par=deleteTeam");
    }
    document.getElementById('deleteInventory').onclick = function() {
        sendAjaxForm("back-team.php?par=deleteInventory");
    }


    function sendAjaxForm(url) {
        jQuery.ajax({
            url: url,
            type: "POST",
            data: {
                play: <?php echo $_GET['id'] ?>
            },
            success: function(response) { //Данные отправлены успешно
                console.log(response);
                $("#body-modal").load("modal.php?id=" + <?php echo $_GET['id'] ?>);
                // $("#info-mark").reload();
            },
        });
    }
</script>