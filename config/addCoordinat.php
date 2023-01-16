<?php
set_time_limit(0);
// require("connectdb.php");
$connect = mysqli_connect("localhost", "root", "", "service-web");
mysqli_set_charset($connect, "utf8");
$placeRes = mysqli_query($connect, "Select place_id, address FROM Places where place_id > 1233");
while ($place = mysqli_fetch_assoc($placeRes)) {
    $address = $place['address'];

    $ch = curl_init('https://geocode-maps.yandex.ru/1.x/?apikey=871f692e-62d6-4ea4-ad08-654ed666eda2&format=json&geocode=' . urlencode($address));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $res = curl_exec($ch);
    curl_close($ch);

    $res = json_decode($res, true);
    $coordinates = $res['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos'];
    $coordinates = explode(' ', $coordinates);
    $lat = $coordinates[0];
    $lon = $coordinates[1];

    $updatePlace = mysqli_query($connect, "UPDATE Places SET latitude = " . $lat . ", longitude = " . $lon . "  WHERE place_id = " . $place['place_id']);
}
