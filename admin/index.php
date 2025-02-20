<?php
session_start();

?>

<?php include('layout/header.php'); ?>

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h1>Dashboard Pages</h1>
            </div>
            <div class="row">
                <?php
                    echo '<pre>';
                    print_r($_SESSION);
                    echo '</pre>';
                ?>
            </div>
        </div>
    </div>
</div>

<?php include('layout/footer.php'); ?>

<?php $conn = null; ?>