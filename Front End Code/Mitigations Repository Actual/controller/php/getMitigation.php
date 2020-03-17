<?php session_start();

if(!include('../../model/php/dbProcedures.php')) {
    die('error finding dbProcedures.php in model dir');
}

if(!ifset($_GET['num'])) {
    $num = 10; //default to 10 files
}

$hostname = '127.0.0.1';  //local host - our web server will be our db server.
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$dbname = 'Mitigation_Repository';

//try to connect to database

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    getResults($dbh,$num);
}
catch(PDOException $e) {
    echo ('PDO error for user ' . $username . ' in "ConnectDB()" : ' . $e->getMessage() );
}

?>