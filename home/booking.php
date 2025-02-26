<div class="card">
    <div class="card-header bg-dark">
        <h3 style="color: white;">Booking</h3>
    </div>
    <div class="card-body">
        <form action="home/checkBooking.php" method="post">
            <div class="form-group">
                <label for="name">ชื่อ-สกุล</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tel">เบอร์โทร</label>
                <input type="text" name="tel" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date">อีเมล</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date">วันที่เริ่ม</label>
                <input type="date" name="date_start" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date">วันที่หมดเขต</label>
                <input type="date" name="date_end" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="service">บริการ</label>
                <?php 
                    include './database/confg.php';
                    $sql = "SELECT * FROM courses";
                    $coures = $conn->query($sql);
                ?>
                <select name="coures" class="form-control" required>
                    <?php foreach ($coures as $row) { ?>
                        <option value="<?= $row['coures_name']; ?>"><?= $row['coures_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Booking</button>
        </form>
    </div>
</div>