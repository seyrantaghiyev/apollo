<?php


$login_url  = 'http://localhost/apollo/admin/login.php';

if(!isset($_SESSION['user_admin']) || $_SESSION['user_admin'] != 'admin'){
    header("location:$login_url");
    die();
}

?>

<div class="container">
    <h2>ADMIN NAME: <?= $_SESSION['user_admin'] ?></h2>
    <a href="./logout.php">cixis</a>
</div>
