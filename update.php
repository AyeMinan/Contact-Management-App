<?php
include('header.php');
include('config.php');
include('functions.php');
?>
<h2>Update Contact Information</h2>

<?php

if (isset($_POST['update_contact'])) {

    if (isset($_GET['new_id'])) {
        $newId = $_GET['new_id'];
    } else {
        die("New ID not provided");
    }

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];

    $result = updateContact($newId, $firstName, $lastName, $email, $phoneNumber, $address);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?success=contact_updated_successful');
        exit;
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM contact_info WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    if (mysqli_num_rows($result) == 0) {
        die("Contact not found");
    }

    $row = mysqli_fetch_assoc($result);
} else {
    header('location:index.php?error=Contact ID not provided');
    exit;
}

?>
<form id="contactForm" action="update.php?new_id=<?php echo $id ?>" method="post">
    <div class="mb-3">
        <label for="firstName" class="form-label"><?php echo $lang['first_name']; ?></label>
        <input type="text" name="firstName" class="form-control" id="firstName" aria-describedby="emailHelp" value="<?php echo  $row['first_name'] ?>" >
        <div id="firstNameError" class="text-danger"></div>
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label"><?php echo $lang['last_name']; ?></label>
        <input type="text" name="lastName" class="form-control" id="lastName" aria-describedby="emailHelp" value="<?php echo $row['last_name'] ?>" >
        <div id="lastNameError" class="text-danger"></div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"><?php echo $lang['email']; ?></label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?php echo $row['email'] ?>" >
        <div id="emailError" class="text-danger"></div>
    </div>
    <div class="mb-3">
        <label for="phoneNumber" class="form-label"><?php echo $lang['phone_number']; ?></label>
        <input type="tel" name="phoneNumber" class="form-control" id="phoneNumber" aria-describedby="emailHelp" value="<?php echo $row['phone_number'] ?>">
        <div id="phoneNumberError" class="text-danger"></div>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label"><?php echo $lang['address']; ?></label>
        <textarea class="form-control" name="address" id="address" placeholder="Enter Your Address"><?php echo $row['address'] ?></textarea>
        <div id="addressError" class="text-danger"></div>
    </div>
    <button type="submit" name="update_contact" class="btn btn-primary"><?php echo $lang['submit']; ?></button>
</form>
<?php include('footer.php') ?>