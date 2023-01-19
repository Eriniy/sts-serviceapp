<?php
include("connectdb.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://api-maps.yandex.ru/2.1/?apikey=871f692e-62d6-4ea4-ad08-654ed666eda2&lang=ru_RU" type="text/javascript">
    </script>

    <link rel="stylesheet" href="/style/main.css">


</head>

<body>
    <?php include('header.php') ?>
    <!-- <a href="new2.php">Click</a> -->
    <div class="container">
        <div class="row" style="height: 85vh;">
            <div class="col-3 col-right">
                <div class="date">
                    <div class="row">
                        <div class="col">
                            <form>
                                <input type="date" id="date" name="date" class="date-picker" value="<?php echo date('Y-m-d') ?>" onchange="goLinkWithValue();" />
                                <form>
                        </div>
                    </div>
                </div>
                <div id="info-mark" style="display: none">

                </div>
                <div class="filter" id="filter" style="display: block;">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                    Вид спорта
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <div class="form-container">
                                        <form>
                                            <?php
                                            $getSports = mysqli_query($connect, "SELECT * FROM Sports");
                                            while ($row = mysqli_fetch_assoc($getSports)) {
                                                echo '<div class="row checkbox-item">
                                                        <div class="col-2"><input class="form-check-input" type="radio" name="sport" value="' . $row['sport_id'] . '" onchange="goLinkWithValue();"></div>
                                                        <div class="col-10"><label class="form-check-label" for="inlineRadio1">' . $row['sport_name'] . '</label></div>
                                                    </div>';
                                            }

                                            ?>
                                        </form>

                                    </div>
                                    <input class="btn btn-primary" type="button" value="Clear" id="clearSport">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Район
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <div class="form-container">
                                    <form>
                                        <?php
                                        $getArea = mysqli_query($connect, "SELECT Places.district FROM Places GROUP BY district");
                                        while ($row = mysqli_fetch_assoc($getArea)) {
                                            echo '<div class="row checkbox-item">
                                                    <div class="col-2"><input class="form-check-input" type="radio" name="area" value=' . rawurlencode($row["district"]) . ' onchange="goLinkWithValue();"></div>
                                                    <div class="col-10"><label class="form-check-label" for="inlineRadio1">' . $row["district"] . '</label></div>
                                                </div>';
                                        }

                                        ?>
                                    </form>
                                </div>
                                <input class="btn btn-primary" type="button" value="Clear" id="clearArea">

                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <div class="col-9">
                <div id="map-view">
                    <?php include('getMap.php'); ?>
                </div>
            </div>
        </div>
    </div>

    <button type='button' class='btn btn-show-play' data-bs-toggle='modal' data-bs-target='#exampleModal' id='click-modal' name="asdas">Вступить</button>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Создание группы</h4>
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
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
    // import urllib;

    function goLinkWithValue() {
        var date = document.getElementById("date").value;
        var sport = "";
        var area = "";
        if ($(' input[name=sport]:checked').length > 0)
            sport = document.querySelector('input[name="sport"]:checked').value;

        if ($('input[name=area]:checked').length > 0)
            area = document.querySelector('input[name="area"]:checked').value;
        // console.log(rawurlencode(area));

        $("#map-view").load("getMap.php?date=" + date + "&sport=" + sport + "&area=" + area);


        // window.location.replace('getMap.php?p_id=' + value);
    }

    document.getElementById("clearArea").onclick = function() {
        var ele = document.getElementsByName('area');
        for (var i = 0; i < ele.length; i++) ele[i].checked = false;
        goLinkWithValue()
    }
    document.getElementById("clearSport").onclick = function() {
        var ele = document.getElementsByName('sport');
        for (var i = 0; i < ele.length; i++) ele[i].checked = false;
        goLinkWithValue()
    }

    // $('#click-modal').click(function() {
    //     console.log(this.name)
    //     // var idPlay = document.getElementById('click-modal').id
    //     // console.log(idPlay)
    //     $("#body-modal").load("modal.php?id=1");

    // });
    const placeModal = document.getElementById('exampleModal')
    placeModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        // console.log(button.name)
        $("#body-modal").load("modal.php?id=" + button.name);
    })
</script>