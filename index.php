<?php
include('config.php');
include('header.php');
include('functions.php');


$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10; // Number of contacts per page

// Get total number of contacts
$totalContacts = countTotalContacts();

// Calculate total pages
$totalPages = ceil($totalContacts / $limit);

// Geting search query
$searchQuery = isset($_GET['search_query']) ? $_GET['search_query'] : '';

// Get contacts for the current page
$contacts = getAllContacts($page, $limit, $searchQuery);
?>

<h2><?php echo $lang['contact_management_system']; ?></h2>
<a href="create.php" class="btn btn-primary"><?php echo $lang['add_contact']; ?></a>
<table class="table">
    <thead>
        <tr>
            <th><?php echo $lang['id']; ?></th>
            <th><?php echo $lang['first_name']; ?></th>
            <th><?php echo $lang['last_name']; ?></th>
            <th><?php echo $lang['email']; ?></th>
            <th><?php echo $lang['phone_number']; ?></th>
            <th><?php echo $lang['address']; ?></th>
            <th><?php echo $lang['action']; ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($contacts)) {
            foreach ($contacts as $contact) {
                echo "<tr>";
                echo "<td>" . $contact['id'] . "</td>";
                echo "<td>" . $contact['first_name'] . "</td>";
                echo "<td>" . $contact['last_name'] . "</td>";
                echo "<td>" . $contact['email'] . "</td>";
                echo "<td>" . $contact['phone_number'] . "</td>";
                echo "<td>" . $contact['address'] . "</td>";
                echo "<td>";
                echo "<a href='update.php?id=" . $contact['id'] . "' class='btn btn-warning btn-sm' style='margin-right: 10px;'>$lang[update]</a>";
                echo "<a href='delete.php?id=" . $contact['id'] . "' class='btn btn-danger btn-sm'>$lang[delete]</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>$lang[no_contact_found]</td></tr>";
        }
        ?>
    </tbody>
</table>
<!-- Message to show after respective operation -->
<?php if (isset($_GET['success'])) {
    echo "<h7 style='color: green;'>" . $lang[$_GET['success']] . "</h7>";
} elseif (isset($_GET['error'])) {
    echo "<h7 style='color: red;'>" . $lang[$_GET['error']] . "</h7>";
}
?>
<!-- Pagination Link -->
<div class="pagination-container" style="display: flex; justify-content: flex-end;">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $page - 1; ?>" tabindex="-1"><?php echo $lang['previous']; ?></a>
            </li>
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?php echo $page >= $totalPages ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $page + 1; ?>"><?php echo $lang['next']; ?></a>
            </li>
        </ul>
    </nav>
</div>

<?php include('footer.php') ?>