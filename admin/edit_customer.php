<?php
    session_start();
    include '../database/confg.php';
?>
<?php include('layout/header.php'); ?>

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-1">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3>Member List</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $query = "SELECT * FROM customers WHERE id = $id";
                                $result = $conn->query($query);

                                }
                            ?>

                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $result['name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $result['email']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $result['phone']; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Customer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('layout/footer.php'); ?>