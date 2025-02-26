<?php
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';

    include './database/confg.php';
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $coures = $_POST['coures'];

    $sql = "INSERT INTO booking (name, tel, email, date_start, date_end, coures) 
    VALUES ('$name', '$tel', '$email', '$date_start', '$date_end', '$coures')";

?>