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
    <!-- <script src="https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU" type="text/javascript"></script> -->

    <link rel="stylesheet" href="/style/main.css">
</head>

<body>
    <?php include('header.php') ?>
    <div class="container main-view">
        <a href="javascript:showhide('info', 'da')">
            Click to show/hide.


        </a>
        <div class="row">
            <div class="col-3 a" id="da" style="display: block;">
                <div class="date">
                    <div class="row">
                        <div class="col">
                            <form>
                                <input type="date" id="date" name="date" class="date-picker" value="<?php echo date('Y-m-d'); ?>" onchange="showMap(this.value);" />
                                <form>
                        </div>
                    </div>

                </div>
                <div class="" id=" info" style="display: none;">

                </div>


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
                                            <div class="checkbox-item">
                                                <input class="form-check-input" type="radio" name="sport" id="inlineRadio1" value="бег">
                                                <label class="form-check-label" for="inlineRadio1">Мужской</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input class="form-check-input" type="radio" name="sport" id="inlineRadio1" value="бег">
                                                <label class="form-check-label" for="inlineRadio1">Мужской</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input class="form-check-input" type="radio" name="sport" id="inlineRadio1" value="бег">
                                                <label class="form-check-label" for="inlineRadio1">Мужской</label>
                                            </div>
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
                                <div class="accordion-body">
                                    <div class="checkbox-item">
                                        <input class="form-check-input" type="radio" name="area" id="inlineRadio1" value="бег">
                                        <label class="form-check-label" for="inlineRadio1">Дзержинский</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input class="form-check-input" type="radio" name="area" id="inlineRadio1" value="бег">
                                        <label class="form-check-label" for="inlineRadio1">Дзержинский</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input class="form-check-input" type="radio" name="area" id="inlineRadio1" value="бег">
                                        <label class="form-check-label" for="inlineRadio1">Дзержинский</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input class="form-check-input" type="radio" name="area" id="inlineRadio1" value="бег">
                                        <label class="form-check-label" for="inlineRadio1">Дзержинский</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input class="form-check-input" type="radio" name="area" id="inlineRadio1" value="бег">
                                        <label class="form-check-label" for="inlineRadio1">Дзержинский</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- КОНЕЦ ФИЛЬТРА -->



            <div class="col-9 a">
                <div class="map-view" id="map-view">
                    <!-- dfd -->
                    <div id="map" style="width: 100%; height: 600px">
                        <!-- <?= $map_view ?> -->
                    </div>
                </div>
            </div>





        </div>
    </div>

</body>

</html>
<script type="text/javascript" src="main.js"></script>

<script type="text/javascript">
    ymaps.ready(init);
    // document.ready(function() {
    // var str = new Date().toISOString().slice(0, 10);
    // var xmlhttp = new XMLHttpRequest();
    // // xmlhttp.onreadystatechange = function() {
    // // }
    // xmlhttp.open("GET", "main.php?q=" + str, true);
    // xmlhttp.send();
    // });
    // function showhide(idf, idl, play_id) {
    // var ef = document.getElementById(idf);
    // var el = document.getElementById(idl);
    // // document.cookie = 'key3=' + play_id + '; ';
    // // var str = "asdsasds" + play_id;

    // ef.style.display = (ef.style.display == 'block') ? 'none' : 'block';
    // el.style.display = (ef.style.display == 'block') ? 'none' : 'block';

    // var p = document.getElementById('info');
    // var sport = "";
    // sport = <?= $_COOKIE['key3'] ?>
    // p.innerHTML = "<h1>" + sport + "</h1>";
    // }
    function showMap(str) {
        // if (str == "") {
        // document.getElementById("date").value = date();
        // }
        console.log(str);
        // var str = document.getElementById("date").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            ymaps.ready(init);
        }
        xmlhttp.open("GET", "main.php?q=" + str, true);
        xmlhttp.send();
        <?php echo 'console.log(' . $_GET["q"] . ');' ?>

        // var qwe = document.getElementById('map');
        // qwe.geoObjects.removeAll();



        // console.log(str);


    }





    function init() {

        var myMap = new ymaps.Map('map', {
            zoom: 9,
            center: [55.7522, 37.6156],
            controls: []
        });
        <?php
        // echo 'console.log("sdsd");';
        if (isset($_GET['q']) && $_GET['q'] != "") {
            echo 'concole.log(' . $_GET["q"] . ');';
        ?>
            myMap.geoObjects.add(new ymaps.Placemark([55.679013, 37.757857], {
                iconContent: 'Краснодар1',
                hintContent: 'Собственный значок метки', // при наведении
                link: "info.php?play_id=1"
            }, {
                'preset': 'islands#pinkStretchyIcon'

            }));

        <?php }
        ?>

        // myMap.geoObjects.add(new ymaps.Placemark([55.679013, 37.757857], {
        // iconContent: 'Краснодар1',
        // hintContent: 'Собственный значок метки', // при наведении
        // link: "info.php?play_id=1"
        // }, {
        // 'preset': 'islands#pinkStretchyIcon'

        // }));

        myMap.geoObjects.add(new ymaps.Placemark([55.766013, 37.757057], {
            iconContent: 'old',
            hintContent: 'Собственный значок метки', // при наведении
            link: "info.php?play_id=2"
        }, {
            'preset': 'islands#pinkStretchyIcon'

        }));
        // <?php
            // $placeRes = mysqli_query($connect, "SELECT * from Places WHERE place_id in (SELECT play_place FROM Plays)");
            // while ($place = mysqli_fetch_assoc($placeRes)) {
            //     $address = $place['address'];
            //     $longitude = $place['longitude'];



            // 
            ?>
        // var lon = <?php echo $longitude ?>;
        // var add = '<?php echo $address ?>';

        // // console.log($longitude);
        // myMap.geoObjects.add(new ymaps.Placemark([lon, 37.723079], {
        // iconContent: add,
        // hintContent: 'Собственный значок метки', // при наведении
        // link: 'https://google.com'
        // }, {
        // 'preset': 'islands#darkBlueStretchyIcon'
        // }));
        // <?php
            // }



            // 
            ?>




        // myMap.geoObjects.events.add('click', function(event) {
        // // location.href = event.get('target').properties.get('link');
        // load.href = event.get('target').properties.get('link');
        // });



        // Создаём макет содержимого.
        // MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
        // '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        // ),

        // myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
        // hintContent: 'Собственный значок метки',
        // balloonContent: 'Это красивая метка'
        // });

        // myPlacemarkWithContent = new ymaps.Placemark([55.661574, 37.573856], {
        // hintContent: 'Новый год',
        // balloonContent: 'это новогодняя метка'
        // });

        // myMap.geoObjects
        // .add(myPlacemark)
        // .add(myPlacemarkWithContent);
    }
</script>