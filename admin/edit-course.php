<?php
    session_start();
    $title = 'Edit Course';
    include '../database/confg.php';
    if ( isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM courses WHERE couse_id = $id";
        $result = $conn->query($sql);
        if ($result->rowCount() > 0) {
            $row = $result->fetch();
        } else {
            header('Location: ./courses.php');
        }
    }
?>


<?php include('./layout/header.php'); ?>

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col p-1">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h3>Add Coures</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <form action="./course-sql.php" method="post" enctype="multipart/form-data">
                                        <!-- coures_name -->
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                   <span>Courese Name</span>
                                                </div>
                                            </div>
                                            <input type="text" name="coures_name" class="form-control" value="<?= $row['coures_name']; ?>">
                                        </div>
                                        <!-- coures_type -->
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span>Courese Type</span>
                                                </div>
                                            </div>
                                            <input type="text" name="coures_type" class="form-control" value="<?= $row['coures_type']; ?>">
                                        </div>
                                        <!-- prices -->
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span>Price</span>
                                                </div>
                                            </div>
                                            <input type="text" name="prices" class="form-control" value="<?= $row['prices']; ?>">
                                        </div>
                                        <!-- detail -->
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span>Detail</span>
                                                </div>
                                            </div>
                                            <input type="text" name="detail" class="form-control" value="<?= $row['detail']; ?>">
                                        </div>
                                        <!-- status -->
                                        <div class="input-group mb-2">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span>Status</span>
                                                </div>
                                            </div>
                                            <input type="text" name="status" class="form-control" value="<?= $row['status']; ?>">
                                        </div>
                                        <!-- image -->
                                        <div class="input-group mb-2">
                                            <input type="file" name="image" value="<?= $row['image'] ?>" id="image" class="form-control" onchange="previewImage(event)">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="couse_id" value="<?= $row['couse_id']; ?>">

                                        <div class="input-group mb-2">
                                            <button type="submit" name="update" class="btn btn-success form-control">Save update Course</button>
                                        </div>

                                    </form>
                                </div>
                                <div class="col-7">
                                    <div class="input-group mb-2" style="display: flex; justify-content: center; align-items: center;">
                                        <img id="imagePreview" src="../images/course/<?= $row['image'] ?>" alt="Image Preview" style=" max-width: 50%; height: auto;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<?php include('./layout/footer.php'); ?>