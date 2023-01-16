<?php
require("connectdb.php");
require("session.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- подключение Яндекс.Карт -->


    <script src="https://api-maps.yandex.ru/2.1/?apikey=871f692e-62d6-4ea4-ad08-654ed666eda2&lang=ru_RU" type="text/javascript">
    </script>

    <link rel="stylesheet" href="/style/main.css">
</head>

<body>
    <?php include('header.php') ?>
    <div class="container main-view">
        <div class="row">
            <div class="col-3 a" id="da" style="display: block;">
                <div class="date">
                    <div class="row">
                        <div class="col">
                            <form method="GET" action="test.php">
                                <input type="date" id="date" name="date" class="date-picker" value="<?php echo date('Y-m-d'); ?>" onchange="as();" />
                                <form>
                        </div>
                    </div>

                </div>
                <?php echo $_POST['date']; ?>
                <?php echo "sdsds"; ?>
                <!-- <div class="" id=" info" style="display: none;">

                </div> -->
                <!-- ФИЛЬТР -->

                <div class="filter" id="filter">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                    Вид спорта
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <form class="form">
                                        <div class="form-container">
                                            <div class="checkbox-item">
                                                <input class="form-check-input" type="radio" name="sport" id="inlineRadio1" value="бег">
                                                <label class="form-check-label" for="inlineRadio1">Мужской</label>
                                            </div>

                                        </div>

                                    </form>
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
                                <form>
                                    <div class="accordion-body">
                                        <div class="checkbox-item">
                                            <input class="form-check-input" type="radio" name="area" id="inlineRadio1" value="бег">
                                            <label class="form-check-label" for="inlineRadio1">Дзержинский</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- КОНЕЦ ФИЛЬТРА -->

            <div class="col-9 a">
                <div class="map-view" id="map-view">
                    <!-- <div id="map" style="width: 100%; height: 600px"> -->
                    <?php $c ?>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

</body>

</html>
<!-- <script type="text/javascript" src="main.js"></script> -->
<script script type="text/javascript">
    <?php
    if (isset($_GET['id']))
        echo 'console.log("12")';
    else
        echo 'console.log("False")';
    ?>


    // getMap();

    function as() {
        $.ajax({
            url: "test.php",
            type: "get", //send it through get method
            data: {
                date: '2023-01-01'
            }
        });
        window.location.href = 'test.php?date=2023-01-14';
        // header("Location: test.php");
        // getMap();
        // 
    }

    // var myMap;



    // function func() {
    //     getMap();
    // }

    // function getMap() {
    //     if (myMap != null)
    //         myMap.destroy();



    // $.ajax({
    // url: '/main.php',
    // /* Куда пойдет запрос */
    // method: 'get',
    // /* Метод передачи (post или get) */
    // dataType: 'html',
    // cache: false,
    // /* Тип данных в ответе (xml, json, script, html). */
    // data: {
    // text: '2023-01-14'
    // },
    // /* Параметры передаваемые в запросе. */
    // success: function(data) {
    // /* функция которая будет выполнена после успешного запроса. */
    // // alert(data); /* В переменной data содержится ответ от index.php. */
    // }
    // });

    // $.get('/main.php', {
    // date: document.getElementById('date').value
    // }, function(data) {
    // alert(data);
    // });

    //     ymaps.ready(init);
    // }


    // function init() {
    //     myMap = new ymaps.Map('map', {
    //         zoom: 9,
    //         center: [55.7522, 37.6156],
    //         controls: []
    //     });
    //     // print($_SESSION['play']);
    //     // localStorage.setItem('fname', 'Bob');


    //     <?php

            //     echo 'console.log("' . $_GET['text'] . '");';
            //     $playRes = mysqli_query($connect, "SELECT * FROM Places JOIN Plays
            //                                         ON Places.place_id = Plays.play_place
            //                                         WHERE DATE(Plays.play_datetime) = '2023-01-14'");
            //     while ($play = mysqli_fetch_assoc($playRes)) {
            //         $arr_play = $play;
            //         // $play_place = $play['play_place'];
            //         // $address = $play['address'];
            //         // $longitude = $play['longitude'];
            //         // $latitude = $play['latitude'];

            //     
            ?>
    //         var arr_play = <?= $arr_play ?>;

    //         myMap.geoObjects.add(new ymaps.Placemark([55.656565, 37.723079], {
    //             iconContent: arr_play['play_id'],
    //             hintContent: 'Собственный значок метки', // при наведении
    //             link: 'https://google.com'
    //         }, {
    //             'preset': 'islands#darkBlueStretchyIcon'
    //         }));
    //     <?php
            //     }
            //     
            ?>




    //     myMap.geoObjects.events.add('click', function(event) {
    //         location.href = event.get('target').properties.get('link');
    //     });

    // myMap.geoObjects.add(new ymaps.Placemark([55.679013, 37.757857], {
    // iconContent: 'Краснодар1',
    // hintContent: 'Собственный значок метки', // при наведении
    // link: "info.php?play_id=1"
    // }, {
    // 'preset': 'islands#pinkStretchyIcon'

    // }));

    // myMap.geoObjects.add(new ymaps.Placemark([55.766013, 37.757057], {
    // iconContent: 'Краснодар',
    // hintContent: 'Собственный значок метки', // при наведении
    // link: "info.php?play_id=2"
    // }, {
    // 'preset': 'islands#pinkStretchyIcon'

    // }));
    // }
</script>