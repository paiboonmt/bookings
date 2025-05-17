<?php
session_start();
$title = "Users List";
include './middleware.php';
include '../database/confg.php';

?>
<?php include('layout/header.php'); ?>

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-1">

                    <div class="card p2">
                        <div class="card-header">
                            Create User
                        </div>
                        <div class="card-body">

                            <form action="./user-sql.php" method="post">

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control"  required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" class="form-control" required>
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                    </select>
                                </div>

                                <button type="submit" name="create" class="btn btn-success">Create</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('layout/footer.php'); ?>