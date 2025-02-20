<?php
    session_start();
    $title = "Member List";
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
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['role']; ?></td>
                                            <td>
                                                <a href="edit_customer.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                                <a href="delete_customer.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
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