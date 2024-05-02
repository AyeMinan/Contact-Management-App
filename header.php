<?php
session_start();

// Default language is English
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}

// Changing language
if (isset($_GET['lang']) && in_array($_GET['lang'], ['en','jp'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

// Including the language file based on the selected language
include($_SESSION['lang'] . '.php');
?>

<!DOCTYPE html>
<html  lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management System</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

  </head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><?php echo $lang['contact_management_app']; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <a class="nav-link active mr-2" aria-current="page" href="index.php"><?php echo $lang['home']; ?></a>
      <a class="nav-link active mr-2" href="?lang=en">English</a> <a class="nav-link active mr-2" href="?lang=jp">日本語</a>
      </ul>
          <form method="Get" action="index.php" class="d-flex" role="search">
        <input class="form-control me-2" type="search" name="search_query" placeholder="<?php echo $lang['search'] ?>" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><?php echo $lang['search'] ?></button>
      </form>
    </div>
  </div>
</nav>
<div class="container">