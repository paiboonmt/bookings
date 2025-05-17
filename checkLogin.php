<?php
    session_start();    

    if ( isset($_POST['email']) && isset($_POST['password']) ) {
        include './database/confg.php';

        $email = $_POST['email'];
        $password = $_POST['password'];

        $password = md5($password);

        $SQL = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $conn->query($SQL);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if ($result->rowCount() == 1) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            
            if ($row['role'] == 1 ) {
                header('Location: ./admin/index.php');
            } elseif ($row['role'] == 2) {
                header('Location: user/index.php');
            }

            $conn = null; // Close connection
        } elseif ($result->rowCount() == 0 and $result->rowCount() > 1) {
            header('Location: ./index.php');
            $conn = null; // Close connection
        }

        $conn = null; // Close connection
    }

?>