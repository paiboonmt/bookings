<?php
session_start();
$title = 'Dashboard';
include './middleware.php';
?>

<?php include('layout/header.php'); ?>

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h1>Dashboard Pages</h1>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title
                            ">Total Users</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('layout/footer.php'); ?>

<?php $conn = null; ?>