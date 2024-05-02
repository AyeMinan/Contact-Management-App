<?php include('config.php'); include('functions.php');?>

<?php 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    $result = deleteContact($id);
    if(!$result){
        die("Query Failed". mysqli_error($connection));
    }else{
        header('location:index.php?success=contact_deleted_successful');
    }
}
?>