<?php session_start();

if (!include('../../model/php/dbProcedures.php')) {
    die('error finding dbProcedures.php in model dir');
}

$hostname = '127.0.0.1';   // local host.  web server is db server
//Trims from what is posted by the create page to get the various variables and save them locally temporarily


//Currently just uses the regular admin credentials, but will use the
//credentials from logging in

$mit_id = trim($_POST['mit_id']);
$dbname = 'Mitigation_Repository';
$username = $_SESSION["username"];
$password = $_SESSION["password"];

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    deleteMit($dbh, $mit_id);
    echo "Success";
} catch (PDOException $e) {
    echo('PDO error in "ConnectDB()": ' . $e->getMessage());
}


