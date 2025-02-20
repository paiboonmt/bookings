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
                                        <div class="input-group mb-2">
                                            <input type="text" name="coures_name" required class="form-control" placeholder="Course Name" value="PHP Course">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input type="text" name="coures_type" required class="form-control" placeholder="Course Type" value="Online">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input type="text" name="prices" required class="form-control" placeholder="Course Price" value="1000">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input type="text" name="detail" required class="form-control" placeholder="Course Detail" value="This is PHP Course">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input type="text" name="status" required class="form-control" placeholder="Course Status" value="Active">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-2">
                                            <input type="file" name="image" id="image" required class="form-control" placeholder="Course Image" onchange="previewImage(event)">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group mb-2">
                                            <button type="submit" name="add-courese" class="btn btn-primary">Add Course</button>
                                        </div>


                                    </form>
                                </div>
                                <div class="col-7">
                                    <div class="input-group mb-2" style="display: flex; justify-content: center; align-items: center;">
                                        <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 50%; height: auto;">
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