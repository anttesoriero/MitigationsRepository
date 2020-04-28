<?php

session_start();

if (!include('../../model/php/dbProcedures.php')) {
    die('error finding dbProcedures.php in model dir');
}

$hostname = 'localhost';  //local host - our web server will be our db server.
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$dbname = 'Mitigation_Repository';

//try to connect to database

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    getRole($dbh, $username);

} catch (PDOException $e) {
    echo('PDO error for user ' . $username . ' in "ConnectDB()": ' . $e->getMessage());
}


