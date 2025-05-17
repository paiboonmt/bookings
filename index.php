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
  <style>
    .carousel-item {
      height: 400px;
      background-color: #f0f0f0;
      align-items: center;
      justify-content: center;
    }

    .carousel-item img {
      max-height: 100%;
      max-width: 100%;
      object-fit: contain;
    }

    .carousel-caption {
      background-color: rgba(0, 0, 0, 0.6);
      padding: 1rem;
      border-radius: 0.5rem;
    }
  </style>
</head>

<body>

  <?php include 'navbar.php'; ?>

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="./images/php.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./images/java.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./images/python.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  

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
      <?php endif;
      unset($_SESSION['success']) ?>


    </div>
  </div>
  <footer class="text-center text-lg-start bg-light text-muted">
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2023 Copyright:
      <a class="text-reset fw-bold" href="#">Paiboon</a>
    </div>
  </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>