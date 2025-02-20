<?php

if (empty($_SESSION['role']) || $_SESSION['role'] != 1) {
    header('Location: ../index.php');
}

?>