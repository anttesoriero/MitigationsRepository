<?php session_start();

if (!include('../../model/php/dbProcedures.php')) {
    die('error finding dbProcedures.php in model dir');
}

$hostname = '127.0.0.1';   // local host.  web server is db server
//Trims from what is posted by the create page to get the various variables and save them locally temporarily

$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);
$title = trim($_POST['title']);
$os = trim($_POST['os']);
$version = trim($_POST['version']);
$description = trim($_POST['description']);
$category = trim($_POST['category']);
$secType = trim($_POST['sec_type']);
$riskID = trim($_POST['mitigationToEdit']);
$dbname   = 'Mitigation_Repository';


//Currently just uses the regular admin credentials, but will use the
//credentials from logging in

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", "admin", "Sweng#2020");

	deleteAuthor($dbh, $author_id);
	deleteMit($dbh, $mit_id);
	deleteSecCon($dbh, $secCon_id);
	deleteSystem($dbh, $system_id);
    echo "Success";
}
catch(PDOException $e) {
    echo ('PDO error in "ConnectDB()": ' . $e->getMessage() );
}
