<?php

session_start();

if (isset($_POST['booking'])) {
    require_once '../database/confg.php';
    $id_user = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 0;
    $Couse_id = isset($_POST['courses']) ? $_POST['courses'] : '';
    $Customer_name = isset($_POST['name']) ? $_POST['name'] : '';
    $customer_email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $check_in_date = isset($_POST['date-start']) ? $_POST['date-start'] : '';
    $check_out_date = isset($_POST['date-expiry']) ? $_POST['date-expiry'] : '';
    $booking_date = date('Y-m-d H:i:s');
    $deposit_amount = 0;
    $deposit_slip = '';
    $status_id = 1;
    $full_payment = 0;
    $full_payment_slip = '';

    $sql = "INSERT INTO `booking`( `id_user`, `Couse_id`, `Customer_name`, `customer_email`,`phone`, `check_in_date`, `check_out_date`, `booking_date`, `deposit_amount`, `deposit_slip`, `status_id`, `full_payment`, `full_payment_slip`) 
    VALUES (:id_user, :Couse_id, :Customer_name, :customer_email, :phone, :check_in_date, :check_out_date, :booking_date, :deposit_amount, :deposit_slip, :status_id, :full_payment, :full_payment_slip)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_user', $id_user);
    $stmt->bindParam(':Couse_id', $Couse_id);
    $stmt->bindParam(':Customer_name', $Customer_name);
    $stmt->bindParam(':customer_email', $customer_email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':check_in_date', $check_in_date);
    $stmt->bindParam(':check_out_date', $check_out_date);
    $stmt->bindParam(':booking_date', $booking_date);
    $stmt->bindParam(':deposit_amount', $deposit_amount);
    $stmt->bindParam(':deposit_slip', $deposit_slip);
    $stmt->bindParam(':status_id', $status_id);
    $stmt->bindParam(':full_payment', $full_payment);
    $stmt->bindParam(':full_payment_slip', $full_payment_slip);
    if ($stmt->execute()) {
        $_SESSION['success'] = 'Booking successful!';
        $conn = null;
        header('Location: ../index.php');
    } else {
        $_SESSION['error'] = 'Booking failed!';
        $conn = null;
        header('Location: ../index.php');
    }
}

if (isset($_POST['Approve'])) {
    require_once '../database/confg.php';
    $sql = "UPDATE `booking` SET `status_id` = 2 WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_POST['id']);
    if ($stmt->execute()) {
        $_SESSION['success'] = 'Booking approved successfully!';
        $conn = null;
        header('Location: ../admin/bookings.php');
    } else {
        $_SESSION['error'] = 'Booking approval failed!';
        $conn = null;
        header('Location: ../admin/bookings.php');
    }
}
