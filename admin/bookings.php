<?php
    session_start();
    $title = "Bookings";
    include './middleware.php';
?>

<?php include('./layout/header.php'); ?>

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Bookings</h1>
                    <div class="card">
                        <div class="card-header">
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
                                  
                                        <!-- include './db.php';
                                        $sql = "SELECT * FROM bookings";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>".$row['id']."</td>";
                                                echo "<td>".$row['customer_name']."</td>";
                                                echo "<td>".$row['customer_email']."</td>";
                                                echo "<td>".$row['customer_phone']."</td>";
                                                echo "<td>".$row['room_type']."</td>";
                                                echo "<td>".$row['check_in']."</td>";
                                                echo "<td>".$row['check_out']."</td>";
                                                echo "<td><a href='booking.php?id=".$row['id']."'>View</a></td>";
                                                echo "</tr>";
                                            }
                                        } -->
                                    
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