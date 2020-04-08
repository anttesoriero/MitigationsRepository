<?php session_start();

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
    die("Title Required");
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

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'fetch') {
        // tell the browser what's coming
        header('Content-type: forking/json');
 
        // open database connection
        $dbh = new PDO("mysql:host=$hostname;dbname=$dbname","admin", "Sweng#2020");
 
        // use prepared statements!
        $query = $db->prepare('select * from form_ajax where ID = ?');
        $query->execute(array($_GET['ID']));
        $row = $query->fetch(PDO::FETCH_OBJ);
 
        // send the data encoded as JSON
        echo json_encode($row);
        exit;
    }
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
$dbname   = 'Mitigation_Repository';

if (isset($_GET['s'])) {
    $Mitigation_To_Fork = $_GET['s'];
}

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname","admin", "Sweng#2020");
	forkNewAuthor($dbh, $Mitigation_To_Fork, $description, $firstName, $lastName);
	forkWithoutAuthor($dbh, $Mitigation_To_Fork, $description);
    echo "Success";
}
catch(PDOException $e) {
    echo ('PDO error in "ConnectDB()": ' . $e->getMessage() );
}


