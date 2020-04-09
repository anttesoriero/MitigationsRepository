<?php
session_start();

if (!include('../../model/php/dbProcedures.php')) {
    die('error finding dbProcedures.php in model dir');
}

$hostname = 'localhost';  //local host - our web server will be our db server.
$username = 'admin';
$password = 'Sweng#2020';
$dbname = 'Mitigation_Repository';

//try to connect to database
if (isset($_GET['m'])) {
    $mit = $_GET['m'];
}



try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    searchByID($dbh, $mit);

} catch (PDOException $e) {
    echo('PDO error for user ' . $username . ' in "ConnectDB()": ' . $e->getMessage());
}


