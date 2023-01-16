<?php
// Получить вариант кода для возврата клиенту
$variant = 1;
if (isset($_REQUEST["variant"])) {
    $variant = $_REQUEST["variant"];
}

// Получить метод запроса
$method = $_SERVER['REQUEST_METHOD'];

if ($variant === 1) {
?>
    <h2>Вариант 1</h2>
    <p>Код получен с помощью метода <?= $method ?>.</p>
<?php
} else {
?><h2>Вариант 2</h2>
    <p>Это ответ, полученный с помощью метода <?= $method ?>.</p>
<?php
}
?>