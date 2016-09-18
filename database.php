<?php

$servername = 'sql9.freesqldatabase.com';
$username = 'sql9136244';
$password = 'VaIM3ICusL';
$databasename = 'sql9136244';
$port = '3306';

//Host: sql9.freesqldatabase.com
//Database name: sql9136244
//Database user: sql9136244
//Database password: VaIM3ICusL
//Port number: 3306


function openConnection($servername, $username, $password,$port){
    $connection = mysqli_connect($servername.':'.$port,$username,$password);
    if (!$connection) {
        die("Connection failed: wrong id or password");
    } else {
        echo "Connected successfully<br/>";
    }
    return $connection;
}


function openDatabase($servername, $username, $password,$databasename,$port){
    $connection = mysqli_connect($servername.':'.$port,$username,$password,$databasename);
    if (!$connection) {
        die("Connection failed: wrong id or password");
    } else {
        echo "Connected successfully<br/>";
    }
    return $connection;
}

function closeConnection($connection){
    $connection->close();
}



function createUsersTable($connection){
    $sql = '';
    $sql = "CREATE TABLE users (
    email VARCHAR(50) PRIMARY KEY, 
    passwrd VARCHAR(50)
    )";
    echo $sql;
    if ($connection->query($sql) === TRUE) {
        echo "<br/>Users table created successfully<br/>";
    } else {
        echo "<br/>Error creating table: " . $connection->error;
    }
}

function createUsersinfoTable($connection){
    $sql = '';
    $sql = "CREATE TABLE usersinfo (
    email VARCHAR(50) PRIMARY KEY, 
    address VARCHAR(50),
    privatequestion VARCHAR(100),
    privateanswer VARCHAR(100)
    )";
    echo $sql;
    if ($connection->query($sql) === TRUE) {
        echo "<br/>Usersfinfo table created successfully<br/>";
    } else {
        echo "<br/>Error creating table: " . $connection->error;
    }
}

function detelettable($connection,$tablename){
    $sql = '';
    $sql = "DROP TABLE IF EXISTS userusagedetail";
    echo $sql;
    if ($connection->query($sql) === TRUE) {
        echo "<br/>Table created successfully<br/>";
    } else {
        echo "<br/>Error creating table: " . $connection->error;
    }
}

function signuptodatabase($email,$passwrd,$address,$privatequestion,$privateanswer,$connection){
    $sql = '';
    $sql =  "INSERT INTO users (email,passwrd) VALUES ('".$email."','".$passwrd."') ";
    if ($connection->query($sql) === TRUE) {
        //echo "Insert record successfully<br/>";
    } else {
        echo "Error update record table: " . $connection->error;
    }
    
    $sql =  "INSERT INTO usersinfo (email,address,privatequestion,privateanswer) VALUES ('".$email."','".$address."','".$privatequestion."','".$privateanswer."') ";
    if ($connection->query($sql) === TRUE) {
        //echo "Insert record successfully<br/>";
    } else {
        echo "Error update record table: " . $connection->error;
    }
}

function getUserData($connection){
    $row = '';
    $order = 0;
    $sql = '';
    $sql = "select * from users";
    
    //Start table
    echo "<div algin = center>";
    echo "<table border=1 width=100%>";
    echo "<tr>";
    echo "<th>";
    echo " ";
    echo "</th>";
    echo "<th>";
    echo "email";
    echo "</th>";
    echo "<th>";
    echo "password";
    echo "</th>";
    echo "</tr>";
    
    $results = mysqli_query($connection,$sql);
    if(mysqli_num_rows($results)>0){
	while ($row=mysqli_fetch_assoc($results)){
                echo "<tr>";
                echo "<td>";
                echo $order;
                echo "</td>";
                echo "<td>";
                echo '<a href="detailuser.php?studentID='.$row["email"].'" target="_blank">'.$row["email"].'</a>';
		echo "</td>";
                echo "<td>";
		echo $row["passwrd"];
                echo "</td>";
                echo "<td>";
		//echo $row["datetime"];
                echo $duration;
                //echo " (".$row["datetime"].")";
                echo "</td>";
		echo "</tr>";
		$order=$order+1;
	}
    }
    mysql_free_result($results);
    
    //End table
    echo "</table>";
    echo "</div>";
}

function createMedicineTable($connection){
    $sql = '';
    $sql = "CREATE TABLE medicine (
    idmedicine VARCHAR(50) PRIMARY KEY, 
    namemedicine VARCHAR(50),
    description VARCHAR(300),
    image VARCHAR(50)
    )";
    echo $sql;
    if ($connection->query($sql) === TRUE) {
        echo "<br/>Users table created successfully<br/>";
    } else {
        echo "<br/>Error creating table: " . $connection->error;
    }
}

function createUserReviewMedicineTable($connection){
    $sql = '';
    $sql = "CREATE TABLE userreviewmedicine (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50), 
    idmedicine VARCHAR(50), 
    comments VARCHAR(300)
    )";
    echo $sql;
    if ($connection->query($sql) === TRUE) {
        echo "<br/>Users table created successfully<br/>";
    } else {
        echo "<br/>Error creating table: " . $connection->error;
    }
}


function insertMedicineTable($connection,$idmedicine,$namemedicine,$description,$image){
    $sql = '';
    $sql = 'INSERT INTO medicine VALUES (idmedicine,namemedicine,description,image) VALUES ("'.$idmedicine.'")"';
    echo $sql;
    if ($connection->query($sql) === TRUE) {
        echo "<br/>Users table created successfully<br/>";
    } else {
        echo "<br/>Error creating table: " . $connection->error;
    }
}

?>