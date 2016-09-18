<?php
include 'database.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$email = "";
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$email = !empty($_REQUEST['email']) ? $_REQUEST['email'] : '';

$passwrd = "";
$passwrd = isset($_REQUEST['passwrd']) ? $_REQUEST['passwrd'] : '';
$passwrd = !empty($_REQUEST['passwrd']) ? $_REQUEST['passwrd'] : '';

$confirmpasswrd = "";
$confirmpasswrd = isset($_REQUEST['confirmpasswrd']) ? $_REQUEST['confirmpasswrd'] : '';
$confirmpasswrd = !empty($_REQUEST['confirmpasswrd']) ? $_REQUEST['confirmpasswrd'] : '';

$address = "";
$address = isset($_REQUEST['address']) ? $_REQUEST['address'] : '';
$address = !empty($_REQUEST['address']) ? $_REQUEST['address'] : '';


$privatequestion = "";
$privatequestion = isset($_REQUEST['privatequestion']) ? $_REQUEST['privatequestion'] : '';
$privatequestion = !empty($_REQUEST['privatequestion']) ? $_REQUEST['privatequestion'] : '';

$privateanswer = "";
$privateanswer = isset($_REQUEST['privateanswer']) ? $_REQUEST['privateanswer'] : '';
$privateanswer = !empty($_REQUEST['privateanswer']) ? $_REQUEST['privateanswer'] : '';

if(strcmp($email,'')===0 || strcmp($passwrd,'')===0 || strcmp($privatequestion,'')===0 || strcmp($privateanswer,'')===0){
    header('Location: signup.html');
} else if(strcmp($passwrd,$confirmpasswrd)!==0){
    echo "Your password does not match<br/>";
    echo '<a href="signup.html">Back</a>';
} else {
    $connection = '';
    $connection = openDatabase($servername,$username,$password,$databasename,$port);
    signuptodatabase($email,$passwrd,$address,$privatequestion,$privateanswer,$connection);
    $connection->close();
    header('Location: login.html');
}

?>
