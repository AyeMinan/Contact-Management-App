<?php
include('config.php');
include('functions.php');

if (isset($_POST['add_contact'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];

    $query = "SELECT COUNT(*) as count FROM `contact_info` WHERE `email` = '$email'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($result);
    $emailCount = $row['count'];

    if ($emailCount > 0) {
        header('location:create.php?message=Email already in use');
        exit;
    } else {
        $result = insertContact($firstName, $lastName, $email, $phoneNumber, $address);
        if ($result) {
            header('location:index.php?success=contact_added_successful');
            exit;
        } else {
            header('location:create.php?error=failed_to_add_contact');
            exit;
        }
    }
}
