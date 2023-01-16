<?php
session_start();
$session_user = (isset($_SESSION["user"])) ? $_SESSION["user"] : false;
$_SESSION['play'] = '10-20-2022';
