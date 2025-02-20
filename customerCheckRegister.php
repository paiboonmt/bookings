<?php 
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    if (isset($_POST['name']) && $_POST['email'] && $_POST['phone']) {
        echo "Register success";

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $SQL = "INSERT INTO customers (name, email, phone) 
            VALUES ('$name', '$email', '$phone')";
        include './database/confg.php';

        $conn->query($SQL);

        header('Location: ./user/index.php');

        $conn = null;   

    } else {
        echo "Register fail";
    }
       
?> 