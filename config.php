
<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "contact_management_app");

$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
$sqlCheck = "SHOW TABLES LIKE 'contact_info'";
$resultCheck = mysqli_query($connection, $sqlCheck);

if (mysqli_num_rows($resultCheck) == 0) {
    // Table does not exist, so table will be created
    $sqlCreate = "CREATE TABLE `contact_info` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `first_name` VARCHAR(50) NOT NULL,
        `last_name` VARCHAR(50) NOT NULL,
        `email` VARCHAR(100) NOT NULL unique,
        `phone_number` VARCHAR(20) NOT NULL,
        `address` TEXT
    )";
    $result = mysqli_query($connection, $sqlCreate);
} 

