<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://api-maps.yandex.ru/2.1/?apikey=871f692e-62d6-4ea4-ad08-654ed666eda2&lang=ru_RU" type="text/javascript">
    </script>
</head>

<body> -->
<?php
require("connectdb.php");

$q = intval($_GET['q']);
?>

<div id="map" style="width: 100%; height: 600px">

    <!-- </body>

</html> -->

    <!-- <script src="https://api-maps.yandex.ru/2.1/?apikey=871f692e-62d6-4ea4-ad08-654ed666eda2&lang=ru_RU" type="text/javascript"> -->
    </script>
    <script>
        ymaps.ready(init);

        function init() {

            var myMap = new ymaps.Map('map', {
                zoom: 9,
                center: [55.7522, 37.6156],
                controls: []
            });

            myMap.geoObjects.add(new ymaps.Placemark([55.679013, 37.757857], {
                iconContent: 'Краснодар1',
                hintContent: 'Собственный значок метки', // при наведении
                link: "info.php?play_id=1"
            }, {
                'preset': 'islands#pinkStretchyIcon'

            }));

            myMap.geoObjects.add(new ymaps.Placemark([55.766013, 37.757057], {
                iconContent: 'Краснодар',
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
            //     var lon = <?php echo $longitude ?>;
            //     var add = '<?php echo $address ?>';

            //     // console.log($longitude);
            //     myMap.geoObjects.add(new ymaps.Placemark([lon, 37.723079], {
            //         iconContent: add,
            //         hintContent: 'Собственный значок метки', // при наведении
            //         link: 'https://google.com'
            //     }, {
            //         'preset': 'islands#darkBlueStretchyIcon'
            //     }));
            // <?php
                // }



                // 
                ?>




            // myMap.geoObjects.events.add('click', function(event) {
            //     // location.href = event.get('target').properties.get('link');
            //     load.href = event.get('target').properties.get('link');
            // });



            // Создаём макет содержимого.
            // MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            //         '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
            //     ),

            //     myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            //         hintContent: 'Собственный значок метки',
            //         balloonContent: 'Это красивая метка'
            //     });

            // myPlacemarkWithContent = new ymaps.Placemark([55.661574, 37.573856], {
            //     hintContent: 'Новый год',
            //     balloonContent: 'это новогодняя метка'
            // });

            // myMap.geoObjects
            //     .add(myPlacemark)
            //     .add(myPlacemarkWithContent);
        }
    </script>