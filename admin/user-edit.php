<?php
session_start();
$title = "Users List";
include './middleware.php';
include '../database/confg.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
}

?>
<?php include('layout/header.php'); ?>

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-1">

                    <div class="card p2">
                        <div class="card-header">
                            Edite User
                        </div>
                        <div class="card-body">

                            <form action="./user-sql.php" method="post">

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" value="<?= $row['username']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="<?= $row['email']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" value="<?= $row['password']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" class="form-control" id="role" required>
                                        <option value="1" <?= $row['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                        <option value="2" <?= $row['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                                    </select>
                                </div>

                                <input type="text" name="id" value="<?= $row['id']; ?>" hidden>
                                <button type="submit" name="update" class="btn btn-primary">Update</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('layout/footer.php'); ?>