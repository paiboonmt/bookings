<?php

session_start();
include './middleware.php';

if (isset($_POST['update'])) {
    include '../database/confg.php';
    $id = $_POST['id'];
    $role = $_POST['role'];
    $sql = "UPDATE users SET `role` = :role WHERE id = :id ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        $_SESSION['success'] = "User updated successfully";
        $conn = null; // Close the connection
        header('Location: users.php');
    } else {
        $_SESSION['error'] = "Failed to update user";
        $conn = null; // Close the connection
        header('Location: users.php');
    }
}

if (isset($_POST['create'])) {
    include '../database/confg.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordmd5 = md5($password);
    $role = $_POST['role'];
    $sql = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $passwordmd5);
    $stmt->bindParam(':role', $role);
    if ($stmt->execute()) {
        $_SESSION['success'] = "User created successfully";
        $conn = null; // Close the connection
        header('Location: users.php');
    } else {
        $_SESSION['error'] = "Failed to create user";
        $conn = null; // Close the connection
        header('Location: users.php');
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    include '../database/confg.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        $_SESSION['success'] = "User deleted successfully";
        $conn = null; // Close the connection
        header('Location: users.php');
    } else {
        $_SESSION['error'] = "Failed to delete user";
        $conn = null; // Close the connection
        header('Location: users.php');
    }
}

function viewdata() {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    // exit();
}
