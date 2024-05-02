
<?php include_once 'config.php';

// Function to fetch contacts with pagination and searchquery
function getAllContacts($page, $limit, $searchQuery) {
    global $connection;
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM contact_info";

    // Add WHERE clause for search query if provided
    if (!empty($searchQuery)) {
        $sql .= " WHERE first_name LIKE '%$searchQuery%' OR last_name LIKE '%$searchQuery%' OR email LIKE '%$searchQuery%'";
    }

    $sql .= " LIMIT $limit OFFSET $offset";
    $result = $connection->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}


// Function to count total contacts
function countTotalContacts() {
    global $connection;
    $sql = "SELECT COUNT(*) AS total FROM contact_info";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'];
}


// Function to insert a new contact into the database
function insertContact($firstName, $lastName, $email, $phoneNumber, $address) {
    global $connection;
    $query = "INSERT INTO `contact_info` (`first_name`, `last_name`, `email`, `phone_number`, `address`) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("sssss", $firstName, $lastName, $email, $phoneNumber, $address);
    $stmt->execute();
    return $stmt->affected_rows > 0;
}

//Function to display error message for validation
function displayErrorMessage($messageKey, $errorMessage) {
    if(isset($_GET[$messageKey]) && strpos($_GET[$messageKey], $errorMessage) !== false) {
        echo "<h6 style='color: red;'>". $_GET[$messageKey] . "</h6>";
    }
}
// Function to update an existing contact in the database
function updateContact($id, $firstName, $lastName, $email, $phoneNumber, $address) {
    global $connection;

    // Sanitize input data to prevent SQL injection
    $id = mysqli_real_escape_string($connection, $id);
    $firstName = mysqli_real_escape_string($connection, $firstName);
    $lastName = mysqli_real_escape_string($connection, $lastName);
    $email = mysqli_real_escape_string($connection, $email);
    $phoneNumber = mysqli_real_escape_string($connection, $phoneNumber);
    $address = mysqli_real_escape_string($connection, $address);

    // Perform the update query
    $query = "UPDATE `contact_info` SET `first_name` = '$firstName', `last_name` = '$lastName', `email` ='$email', `phone_number` = '$phoneNumber', `address` = '$address' WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    // Check if query was successful
    if (!$result) {
        return false; // Return false if query failed
    } else {
        return true; // Return true if query succeeded
    }
}


// Function to delete a contact from the database
function deleteContact($id) {
    global $connection;
    $query = "DELETE FROM `contact_info` WHERE `id` = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->affected_rows > 0;
}

?>
