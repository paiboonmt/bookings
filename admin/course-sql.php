<?php
session_start();
include '../database/confg.php';

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
if (isset($_POST['update'])) {

    // echo '<pre>';
    // print_r($_POST);
    // print_r($_FILES);
    // echo '</pre>';
    // exit();


    $coures_name = $_POST['coures_name'];
    $coures_type = $_POST['coures_type'];
    $prices = $_POST['prices'];
    $detail = $_POST['detail'];
    $status = $_POST['status'];
    $id = $_POST['id'];

    // Handle file upload
    $image = $_FILES['image'];

    $tmp = explode('.', $_FILES['image']['name']);

    $image_name = round(microtime(true)) . '.' . end($tmp);

    $target_dir = "../images/course/";
    $target_file = $target_dir . $image_name;

    if (move_uploaded_file($image['tmp_name'], $target_file)) {
        $sql = "UPDATE courses SET coures_name = '$coures_name', coures_type = '$coures_type', prices = '$prices', detail = '$detail', status = '$status', image = '$image_name' WHERE couse_id = $id";
        $conn->exec($sql);
        header('Location: ./couses.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Delete course
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "DELETE FROM courses WHERE couse_id = $id";
    // Get the image name to delete the file
    $stmt = $conn->prepare("SELECT image FROM courses WHERE couse_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $course = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($course && file_exists("../images/course/" . $course['image'])) {
        unlink("../images/course/" . $course['image']);
    }

    // Execute the delete query
    $conn->exec($sql);
    header('Location: ./couses.php');
}


$conn = null;
