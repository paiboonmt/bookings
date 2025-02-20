<?php
    session_start();

?>

<?php include('layout/header.php'); ?>

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- <h1>Dashboard Pages</h1> -->

                <?php
                    if (isset($_POST['email']) && $_POST['password']) {
                        // print_r($_POST);
                        // var_dump($_POST);
                 
                        // print_r($_SESSION);
                        // echo "<pre>";
                        // print_r($_SESSION);
                        // var_dump($_SESSION);
                        // echo "</pre>";
                    }

                    require_once('../database/confg.php');

                ?>

            </div>
        </div>
    </div>
</div>

<?php include('layout/footer.php'); ?>

<?php $conn = null; ?>