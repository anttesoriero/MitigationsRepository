<?php session_start();

if (!include('../../model/php/dbProcedures.php')) {
    die('error finding dbProcedures.php in model dir');
}

if (!isset($_POST['firstName'])) {
    die("First name Required");
}
if (!isset($_POST['lastName'])) {
    die("Last name Required");
}
if (!isset($_POST['title'])) {
    die("Title Required");
}
if (!isset($_POST['os'])) {
    die("Operating System Required");
}
if (!isset($_POST['version'])) {
    die("Version Required");
}
if (!isset($_POST['description'])) {
    die("Description Required");
}
if (!isset($_POST['category'])) {
    die("Security Category Required");
}
if (!isset($_POST['sec_type'])) {
    die("Security Type Required");
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
$dbname = 'Mitigation_Repository';

$username = $_SESSION["username"];
$password = $_SESSION["password"];


//Currently just uses the regular admin credentials, but will use the
//credentials from logging in

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    addCompleteMitigation($dbh, $title, $description, $os, $version, $category, $secType, $firstName, $lastName);
    echo "Success";
} catch (PDOException $e) {
    echo ('PDO error for user ' . $username . ' in "ConnectDB()": ' . $e->getMessage() );
}

?>