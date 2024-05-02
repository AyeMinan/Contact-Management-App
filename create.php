<?php include('header.php');  include('functions.php');?>
    <h2><?php echo $lang['add_contact_information']; ?></h2>
    <form id="contactForm" action="store.php" method="post">
    <div class="mb-3">
            <label for="firstName" class="form-label"><?php echo $lang['first_name']; ?></label>
            <input type="text" name="firstName" class="form-control" id="firstName" aria-describedby="emailHelp">
            <div id="firstNameError" class="text-danger"></div>
            <?php displayErrorMessage('message', 'First Name'); ?>
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label"><?php echo $lang['last_name']; ?> </label>
            <input type="text" name="lastName" class="form-control" id="lastName" aria-describedby="emailHelp">
            <div id="lastNameError" class="text-danger"></div>
            <?php displayErrorMessage('message', 'Last Name'); ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"><?php echo $lang['email']; ?></label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
            <div id="emailError" class="text-danger"></div>
            <?php displayErrorMessage('message', 'Email'); ?>
        </div>
        <div class="mb-3">
            <label for="phoneNumber" class="form-label"><?php echo $lang['phone_number']; ?></label>
            <input type="tel" name="phoneNumber" class="form-control" id="phoneNumber" aria-describedby="emailHelp">
            <div id="phoneNumberError" class="text-danger"></div>
            <?php displayErrorMessage('message', 'Phone Number'); ?>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label"><?php echo $lang['address']; ?></label>
            <textarea  class="form-control" name="address" id="address" placeholder="<?php echo $lang['enter_your_address']; ?>"></textarea>
            <div id="addressError" class="text-danger"></div>
            <?php displayErrorMessage('message', 'Address'); ?>
        </div>
        <button type="submit" name="add_contact" class="btn btn-primary"><?php echo $lang['submit']; ?></button>
    </form>
<?php include('footer.php') ?>