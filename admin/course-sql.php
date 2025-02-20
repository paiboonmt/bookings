<?php
session_start();
include '../database/confg.php';

echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';
exit();


// Add-courese
if (isset($_POST['add-courese'])) {
    $coures_name = $_POST['coures_name'];
    $coures_type = $_POST['coures_type'];
    $prices = $_POST['prices'];
    $detail = $_POST['detail'];
    $status = 'Active';


    // Handle file upload
    $image = $_FILES['image'];

    $tmp = explode('.', $_FILES['image']['name']);

    $image_name = round(microtime(true)) . '.' . end($tmp);

    $target_dir = "../images/course/";
    $target_file = $target_dir . $image_name;

    if (move_uploaded_file($image['tmp_name'], $target_file)) {
        $sql = "INSERT INTO courses (coures_name, coures_type, prices, detail, status, image) 
    VALUES ('$coures_name','$coures_type','$prices','$detail','$status', '$image_name')";
        $conn->exec($sql);
        header('Location: ./couses.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Edite course







$conn = null;
