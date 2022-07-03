<?php
session_start();
include "database.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $code = $_POST['code'];
    $design = $_POST['design'];
    $space = $_POST['space'];
    $ram = $_POST['ram'];
    $now = new DateTime("now", new DateTimeZone('Europe/Sofia') );
    $time = $now->format('H:i');
    $date = $now->format('Y-m-d');
    mysqli_query($link, "UPDATE products SET serial='$code', design='$design', space='$space', ram='$ram', timeu='$time', dateu='$date' WHERE name='$name'");
    $_SESSION['message'] = "Записът е обновен !";
    header('location: open.php');
}
?>