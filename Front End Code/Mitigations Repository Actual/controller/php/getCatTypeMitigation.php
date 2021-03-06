<?php session_start();

if (!include('../../model/php/dbProcedures.php')) {
    die('error finding dbProcedures.php in model dir');
}

if (!isset($_GET['num'])) {
    $num = 25;  // defalut 10 films
}

$hostname = 'localhost';  //local host - our web server will be our db server.
$username = 'admin';
$password = 'Sweng#2020';
$dbname = 'Mitigation_Repository';
if (isset($_GET['t'])) {
    $type = $_GET['t'];
}
if (isset($_GET['c'])) {
    $cat = $_GET['c'];
}

//try to connect to database

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    catTypeSearch($dbh, $cat, $type);

} catch (PDOException $e) {
    echo('PDO error for user ' . $username . ' in "ConnectDB()": ' . $e->getMessage());
}


?>