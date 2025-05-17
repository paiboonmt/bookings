<?php
session_start();
$title = "Bookings";
include './middleware.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include '../database/confg.php';
    $sql = "SELECT b.*, c.coures_name 
            FROM booking b 
            JOIN courses c ON b.Couse_id = c.couse_id
            WHERE b.id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $booking = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<?php include('./layout/header.php'); ?>

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row p-2">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header bg-dark">
                            <h3 class="card-title">View Booking</h3>
                        </div>
                        <div class="card-body">

                            <form action="../booking/booking-sql.php" method="post">

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" required value="<?= $booking['Customer_name'] ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required value="<?= $booking['customer_email'] ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" class="form-control" name="phone" min="10" required value="<?= $booking['phone'] ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Date Start</label>
                                    <input type="date" class="form-control" name="date-start" required value="<?= $booking['check_in_date'] ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Date Expiry</label>
                                    <input type="date" class="form-control" name="date-expiry" required value="<?= $booking['check_out_date'] ?>">
                                </div>

                                <div>
                                    <label class="form-label">Courses</label>
                                    <select name="courses" class="form-control mb-3" required>
                                        <option value="<?= $booking['coures_name'] ?>" selected><?= $booking['coures_name'] ?></option>
                                    </select>
                                </div>

                                <input type="hidden" name="id" value="<?= $booking['id'] ?>">
                                <input type="submit" name="Approve" value="Approve" class="btn btn-success col-12">
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('./layout/footer.php'); ?>