<?php session_start();
//field names:
//firstName
//lastName
//title
//os
//version
//description
//category
//sec_type
if (!include('../../model/php/dbProcedures.php')) {
    die('error finding dbProcedures.php in model dir');
}

if(!isset($_POST['firstName']))
{
    die("First name Required");
}
if(!isset($_POST['lastName']))
{
    die("Last name Required");
}
if(!isset($_POST['title']))
{
    die("title Required");
}
if(!isset($_POST['os']))
{
    die("Operating System Required");
}
if(!isset($_POST['version']))
{
    die("Version Required");
}
if(!isset($_POST['description']))
{
    die("Description Required");
}
if(!isset($_POST['category']))
{
    die("Security Category Required");
}
if(!isset($_POST['sec_type']))
{
    die("Security Type Required");
}

$hostname = '127.0.0.1';   // local host.  web server is db server
$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);
$title = trim($_POST['title']);
$os = trim($_POST['os']);
$version = trim($_POST['version']);
$description = trim($_POST['description']);
$category = trim($_POST['category']);
$secType = trim($_POST['sec_type']);
$dbname   = 'Mitigation_Repository';


// Try to connect to database using credentials from form

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname","admin", "Sweng#2020");

//    addAuthor($dbh, $firstName,$lastName);
//    addSystem($dbh, $os, $version);
//    addSecurityControl($dbh, $category, $secType);
//    addMitigation($dbh, $title, $description);
    addCompleteMitigation($dbh, $title, $description, $os, $version, $category, $secType, $firstName, $lastName);
    echo "Success";
}
catch(PDOException $e) {
    echo ('PDO error in "ConnectDB()": ' . $e->getMessage() );
}

?>