<?php
include('connectdb.php');
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <link rel="stylesheet" href="/style/myPlays.css">
</head>

<body>
    <?php include("header.php"); ?>
    <div class="container">
        <div class="main-part">
            <div class="row check">
                <div class="col-6" id="more" style="display: none;">

                </div>
                <div class="col-6">

                    <div class="all-plays">
                        <div class="all-container">
                            <?php
                            $getAllPlays = mysqli_query($connect, "SELECT Plays.*, date_format(Plays.play_datetime, '%d/%m/%Y') as formatDate, Sports.sport_name, Places.address FROM Plays JOIN Users JOIN Sports JOIN Places JOIN Teams
ON Plays.play_sport = Sports.sport_id AND Plays.play_place = Places.place_id AND Plays.play_id = Teams.team_play AND Users.user_id = Teams.team_user
WHERE Users.user_id = " . $_SESSION['user']['user_id']);
                            if (mysqli_num_rows($getAllPlays) != 0) {
                                while ($row = mysqli_fetch_assoc($getAllPlays)) { ?>
                                    <div class="row play-item" onclick="openPlay(<?php echo $row['play_id'] ?>)">
                                        <div class=" col-2">
                                            <div class="decorate"></div>
                                        </div>
                                        <div class="col-10">
                                            <p>Место: <?php echo $row['address'] ?></p>
                                            <p>Время: <?php echo $row['formatDate'] ?></p>
                                            <p style="margin-bottom: 0;">Спорт: <?php echo $row['sport_name'] ?></p>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="playModal" tabindex="-1" aria-labelledby="playModalLabel" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="playModalLabel">Создание группы</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <img src="/img/icn_close.svg" alt="">
                    </button>
                </div>
                <div class="modal-body" id="body-modal">


                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    function openPlay(idPlay) {
        var block = document.getElementById('more');
        block.style.display = 'block';
        $("#more").load("infoMyPlays.php?id=" + idPlay);
    }

    const playModal = document.getElementById('playModal')
    playModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        // console.log(button.name)
        $("#body-modal").load("modal.php?id=" + button.name);
    })
</script>