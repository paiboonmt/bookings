<?php
    session_start();    

    if ( isset($_POST['fullName']) && 
        isset($_POST['email']) && 
        isset($_POST['password']) ) {
            
        $username = $_POST['fullName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);

        $SQL = "INSERT INTO users (username,email,password) 
        VALUES ('$username','$email','$password')";
        include './database/confg.php'; // Include database configuration file
        $conn->exec($SQL); // Execute SQL query
        $conn = null; // Close connection
    
        $_SESSION['username'] = $username; // Set session variable
        $_SESSION['email'] = $email; // Set session variable
        $_SESSION['role'] = 2 ; // Set session variable

        if ($_SESSION['role'] == 2) {
            header('Location: user/index.php'); // Redirect to home page
        } else {
            header('Location: admin/index.php'); // Redirect to login page
        }

    } else {
        
        header('Location: login.php'); // Redirect to login page
    }


?>