<?php
include 'database.php';

    $connection = '';
    $connection = openDatabase($servername,$username,$password,$databasename,$port);
    getUserData($connection);
    $connection->close();

?>
