<?php
    session_start();
    $title = "Bookings";
    include './middleware.php';
?>

<?php include('./layout/header.php'); ?>

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row p-2">
                <div class="col-12">
                   
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h3 class="card-title">Bookings</h3>
                        </div>
                        <div class="card-body">
                            <table id="bookingsTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Customer Name</th>
                                        <th>Customer Email</th>
                                        <th>Customer Phone</th>
                                        <th>Room Type</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    require_once '../database/confg.php';   
                                    $sql = "SELECT b.*, c.coures_name 
                                    FROM booking b 
                                    JOIN courses c ON b.Couse_id = c.couse_id";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    $i = 1;
                                    foreach ($bookings as $booking) : ?>
                                  
                                        <?php if ($booking['status_id'] == 2 ) : ?>
                                          <tr style="background-color:rgb(103, 235, 134);">
                                            <td><?= $i++ ?></td>
                                            <td><?= $booking['Customer_name'] ?></td>
                                            <td><?= $booking['customer_email'] ?></td>
                                            <td><?= $booking['phone'] ?></td>
                                            <td><?= $booking['coures_name'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($booking['check_in_date'])) ?></td>
                                            <td><?= date('d-m-Y', strtotime($booking['check_out_date'])) ?></td>
                                            <td>
                                                <a href="#" class="btn btn-success d-block"> View </a>
                                            </td>
                                        </tr>
                                        <?php else : ?>
                                          <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $booking['Customer_name'] ?></td>
                                            <td><?= $booking['customer_email'] ?></td>
                                            <td><?= $booking['phone'] ?></td>
                                            <td><?= $booking['coures_name'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($booking['check_in_date'])) ?></td>
                                            <td><?= date('d-m-Y', strtotime($booking['check_out_date'])) ?></td>
                                            <td class="d-block">
                                                <a href="view-booking.php?id=<?= $booking['id'] ?>" class="btn btn-info">View</a>
                                                <a href="delete-booking.php?id=<?= $booking['id'] ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    
                                  
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


<?php include('./layout/footer.php'); ?>