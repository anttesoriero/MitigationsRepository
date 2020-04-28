<?php session_start();

if (!include('../../model/php/dbProcedures.php')) {
    die('error finding dbProcedures.php in model dir');
}

$hostname = '127.0.0.1';   // local host.  web server is db server
//Trims from what is posted by the create page to get the various variables and save them locally temporarily

$username = trim($_POST['username']);
$password = trim($_POST['password']);
$dbname = 'Mitigation_Repository';

//Currently just uses the regular admin credentials, but will use the
//credentials from logging in

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", 'admin', 'Sweng#2020');
    createUser($dbh, $username, $password, 'gen_user');
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
    $_SESSION["logged_in"] = TRUE;
    echo $_SESSION['refurl'];
} catch (PDOException $e) {
    echo('PDO error for user ' . $username . ' in "ConnectDB()": ' . $e->getMessage());
}

?>