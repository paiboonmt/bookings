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
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                           <div class="row">
                                <div class="col-6">
                                    <h3>Users List</h3>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="user-add.php" class="btn btn-primary">Add User</a>
                                </div>
                           </div>
                        </div>
                        <div class="card-body">
                        <table id="coursesTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM users";
                                    $conn->query($sql);
                                    $result = $conn->query($sql);
                                    foreach ($result as $row) : ?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td><?= $row['username']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td>
                                                <?php if ($row['role'] == 1) : ?>
                                                    <span class="badge badge-success">Admin</span>
                                                <?php else : ?>
                                                    <span class="badge badge-primary">User</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="user-edit.php?id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                                                <a href="user-sql.php?id=<?= $row['id'] ?>&action=delete" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('layout/footer.php'); ?>