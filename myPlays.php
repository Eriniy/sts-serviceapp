<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/style/myPlays.css">
</head>

<body>
    <?php include("header.php"); ?>
    <div class="container">
        <div class="main-part">
            <div class="row check">
                <div class="col-6 a" id="more" style="display: block;">
                    <div class="more-play">
                        <div class="more-container">
                            <div class="more-info">
                                <button class="btn" id="btn-close-info" type="button" style="float: right;"><img src="/img/icn_close.svg" alt="закрыть"></button>
                                <div class="info-block">
                                    <p class="address">Адрес места игры</p>
                                    <p class="datetime">Время 10 октября 14:00</p>
                                    <p class="namesport">Волейбол</p>
                                    <p class="teamlist">Состав команды</p>
                                    <div class="team-container">
                                        <div class="team-item">
                                            <div class="row">
                                                <div class="col-3">
                                                    <img src="/img/profile.svg" alt="">
                                                </div>
                                                <div class="col-9">
                                                    <p class="item-text nickname-title">Username</p>
                                                    <p class="item-text">Firstname, взраст: 10 </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-out-team"><input class="btn mt-1 btn-out-team" type="button" value="Покинуть группу"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-6 a">

                    <div class="all-plays">
                        <div class="all-container">

                            <div class="row play-item" onclick="openPlay(6)">
                                <div class=" col-2">
                                    <div class="decorate"></div>
                                </div>
                                <div class="col-10">
                                    <p>Место:</p>
                                    <p>Время:</p>
                                    <p style="margin-bottom: 0;">Спорт:</p>
                                </div>
                            </div>

                            <div class="row play-item" onclick="openPlay(4)">
                                <div class="col-2">
                                    <div class="decorate"></div>
                                </div>
                                <div class="col-10">
                                    <p>Место:</p>
                                    <p>Время:</p>
                                    <p>Спорт:</p>
                                </div>
                            </div>

                            <div class="row play-item" onclick="openPlay(3)">
                                <div class="col-2">
                                    <div class="decorate"></div>
                                </div>
                                <div class="col-10">
                                    <p>Место:</p>
                                    <p>Время:</p>
                                    <p>Спорт:</p>
                                </div>
                            </div>

                            <div class="row play-item" onclick="openPlay(2)">
                                <div class="col-2">
                                    <div class="decorate"></div>
                                </div>
                                <div class="col-10">
                                    <p>Место:</p>
                                    <p>Время:</p>
                                    <p>Спорт:</p>
                                </div>
                            </div>

                            <div class="row play-item" onclick="openPlay(1)">
                                <div class="col-2">
                                    <div class="decorate"></div>
                                </div>
                                <div class="col-10">
                                    <p>Место:</p>
                                    <p>Время:</p>
                                    <p>Спорт:</p>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    document.getElementById("btn-close-info").onclick = function() {
        var block = document.getElementById("more");
        block.style.display = 'none';
    }

    function openPlay(idPlay) {
        var block = document.getElementById("more");
        block.style.display = 'block';
        $("#more").load("infoMyPlays.php?id=" + idPlay);
    }
</script>