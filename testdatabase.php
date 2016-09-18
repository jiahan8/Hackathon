<?php
include 'database.php';

$connection = '';
$connection = openDatabase($servername,$username,$password,$databasename,$port);
//createUsersTable($connection);
//createUsersinfoTable($connection);
createMedicineTable($connection);
createUserReviewMedicineTable($connection);
$connection->close();

?>