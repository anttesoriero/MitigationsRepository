<?php session_start();

// Get the login info from the login form

if (!isset($_POST['username'])) {
    die("Username required");
}
if (!isset($_POST['password'])) {
    die("Password required");
}

$hostname = '127.0.0.1';   // local host.  web server is db server
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$dbname   = 'Mitigation_Repository';

$_SESSION["username"] = $username;
$_SESSION["password"] = $password;


// Try to connect to database using credentials from form

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname",$username, $password);
//   $_SESSION["dbh"] = $dbh;
    // $_SESSION["username"] = $username;
    //$_SESSION["password"] = $password;
    echo "Success";
}
catch(PDOException $e) {
    echo ('PDO error in "ConnectDB()": ' . $e->getMessage() );
}

?>