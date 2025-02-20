<?php
    session_start();
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
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="input-group mb-2">
                                            <input type="text" name="coures_name" class="form-control" value="<?= $row['coures_name']; ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input type="text" name="coures_type" class="form-control" value="<?= $row['coures_type']; ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input type="text" name="prices" class="form-control" value="<?= $row['prices']; ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input type="text" name="detail" class="form-control" value="<?= $row['detail']; ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input type="text" name="status" class="form-control" value="<?= $row['status']; ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input type="file" name="image" id="image" required class="form-control" onchange="previewImage(event)">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group mb-2">
                                            <button type="submit" name="submit" class="btn btn-primary">Add Course</button>
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