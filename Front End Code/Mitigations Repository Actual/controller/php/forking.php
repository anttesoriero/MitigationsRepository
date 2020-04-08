<?php session_start();

if (!include('../../model/php/dbProcedures.php')) {
    die('error finding dbProcedures.php in model dir');
}
/*
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

*/

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
$Mitigation_To_Fork = trim($_POST['mitigationToFork']);
$dbname   = 'Mitigation_Repository';


try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname","admin", "Sweng#2020");
	forkNewAuthor($dbh, $Mitigation_To_Fork, $description, $firstName, $lastName);
	//forkWithoutAuthor($dbh, $Mitigation_To_Fork, $description);
    //echo "Success";
}
catch(PDOException $e) {
    echo ('PDO error for user ' . $username . ' in "ConnectDB()": ' . $e->getMessage() );
}


/*
$q = intval($_GET['q']);

$sql="SELECT * FROM tbl_businesses WHERE businessID = '".$q."'";

$result = $user->database->query($sql);
$info = array();
while($row=$user->database->fetchArray($result))
{
    $Mitigation_To_Fork = $row['Mitigation_To_Fork'];
    $description = $row['forkDescription'];
    $firstName = $row['firstName'];
	$lastName = $row['lastName'];
	
    $info[] = array( 'Mitigation_To_Fork' => $Mitigation_To_Fork, 'forkDescription' => $forkDescription, 'firstName' => $firstName , 'lastName' => $lastNameName);
}
echo json_encode($info);?> 
*/

