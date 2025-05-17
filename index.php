<?php

session_start();

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>

  <?php include 'navbar.php'; ?>

  <!-- <include 'carousel.php'; ?> -->

  <hr>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="text-center"> Booking Now</h1>
      </div>
    </div>
    <div class="row mt-2 mb-5">

      <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= $_SESSION['error'] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php unset($_SESSION['error']);
      endif; ?>


      <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= $_SESSION['success'] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    
      <?php else : ?>
        <div class="col-8 mx-auto">
          <div class="card p-2">
            <div class="card-body">
              <h5 class="card-title">Booking Form</h5>

              <form action="./booking/booking-sql.php" method="post">

                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" required value="paiboon">
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" required value="paiboon@local.com">
                </div>

                <div class="mb-3">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="number" class="form-control" name="phone" min="10" required value="0123456789">
                </div>

                <div class="mb-3">
                  <label for="phone" class="form-label">Date Start</label>
                  <input type="date" class="form-control" name="date-start" required value="<?= date('Y-m-d') ?>">
                </div>

                <div class="mb-3">
                  <label for="phone" class="form-label">Date Expiry</label>
                  <input type="date" class="form-control" name="date-expiry" required value="<?= date('Y-m-d', strtotime('+1 month')) ?>">
                </div>

                <div>
                  <label class="form-label">Courses</label>
                  <select name="courses" class="form-select mb-3" required>
                    <?php
                    include './database/confg.php';
                    $sql = "SELECT * FROM `courses`";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($courses as $course) : ?>
                      <option value="<?= $course['couse_id'] ?>"><?= $course['coures_name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>


                <input type="submit" name="booking" value="Booking Now" class="btn btn-primary col-12">

              </form>
            </div>
          </div>
        </div>
      <?php endif; unset($_SESSION['success']) ?>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>