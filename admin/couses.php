<?php
session_start();
$title = "Courses";
include './middleware.php';
?>

<?php include('layout/header.php'); ?>

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col p-1">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <div class="row">
                                <div class="col">
                                    <h2 class="text-white">Courses</h2>
                                </div>
                                <div class="col text-right">
                                    <a href="./add-course.php" class="btn btn-primary">Add Course</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="coursesTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Course ID</th>
                                        <th>Course Name</th>
                                        <th>Course Type</th>
                                        <th>Course Price</th>
                                        <th>Course Detail</th>
                                        <th>Course Status</th>
                                        <th>Course Image</th>
                                        <th>Course Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../database/confg.php';
                                    $sql = "SELECT * FROM courses";
                                    $result = $conn->query($sql);

                                    foreach ($result as $row) :  ?>
                                        <tr>
                                            <td><?= $row['couse_id']; ?></td>
                                            <td><?= $row['coures_name']; ?></td>
                                            <td><?= $row['coures_type']; ?></td>
                                            <td><?= number_format($row['prices'], 2); ?></td>
                                            <td><?= $row['detail']; ?></td>
                                            <td><?= $row['status']; ?></td>
                                            <td class="text-center"><img src="../images/course/<?= $row['image']; ?>" alt="" width="50"></td>
                                            <td>
                                                <a href="./edit-course.php?id=<?= $row['couse_id']; ?>" class="btn btn-primary">Edit</a>
                                                <a href="./course-sql.php?id=<?= $row['couse_id']; ?>" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </a>
                                            </td>
                                        </tr>

                                    <?php endforeach  ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-danger');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const url = this.href;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    });
</script>

<?php include('layout/footer.php'); ?>