<?php
$map = '<div id="map" style="width: 100%; height: 600px"/>';

if (isset($_GET['date']))
    $dateAct = $_GET['date'];
else
    $dateAct = date('Y-m-d'); ?>


<!-- <script src="https://api-maps.yandex.ru/2.1/?apikey=871f692e-62d6-4ea4-ad08-654ed666eda2&lang=ru_RU" type="text/javascript">
</script> -->


<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
    var myMap;

    getMap();

    function getMap() {
        if (myMap != null)
            myMap.destroy();

        ymaps.ready(init);
    }

    function init() {
        myMap = new ymaps.Map('map', {
            zoom: 9,
            center: [55.7522, 37.6156],
            controls: []
        });

        <?php
        require("connectdb.php");
        $query = "SELECT Plays.*, Places.* FROM Plays JOIN Places
                    ON Plays.play_place = Places.place_id
                    WHERE DATE(Plays.play_datetime) = '" . $dateAct . "'";
        if (isset($_GET['sport']) && $_GET['sport'] != "")
            $query .= " AND Plays.play_sport = " . $_GET['sport'] . "";

        if (isset($_GET['area']) && $_GET['area'] != "")
            $query .= " AND Places.district = '" . $_GET['area'] . "'";

        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_assoc($result)) {

        ?>

            myMap.geoObjects.add(new ymaps.Placemark([<?php echo $row['longitude'] ?>, <?php echo $row['latitude'] ?>], {
                iconContent: "<?php echo $row['place_name'] ?>",
                hintContent: "<?php echo $row['address'] ?>", // при наведении
                id: <?php echo $row['play_place'] ?>,
                address: "<?php echo rawurlencode($row['address']) ?>",
            }, {
                'preset': 'islands#darkBlueStretchyIcon'
            }));

        <?php
        }
        ?>
        myMap.geoObjects.events.add('click', function(event) {
            var info = document.getElementById("info-mark");
            var old = document.getElementById("filter");
            info.style.display = 'block';
            old.style.display = 'none';

            var idPlace = event.get('target').properties.get('id');
            var addressPlace = event.get('target').properties.get('address');
            var dateTo = "<?php echo $dateAct ?>"
            $("#info-mark").load("getMark.php?id=" + idPlace + "&date='" + dateTo + "'&address=" + addressPlace);
        });


    }
</script>
<?php

echo $map;


?>