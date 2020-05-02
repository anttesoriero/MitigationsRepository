<?php
require_once("dbProcedures.php");
$db_handle = new DBController();
if (!empty($_POST["keyword"])) {
    $query = "SELECT * FROM country WHERE country_name like '" . $_POST["keyword"] . "%' ORDER BY country_name LIMIT 0,6";
    $result = $db_handle->runQuery($query);
    if (!empty($result)) {
        ?>
        <ul id="mitigation-list">
            <?php
            foreach ($result as $country) {
                ?>
                <li onClick="selectCountry('<?php echo $country["country_name"]; ?>');"><?php echo $country["country_name"]; ?></li>
            <?php } ?>
        </ul>
    <?php }
} ?>

<?php
session_start();

if (!include('../../model/php/dbProcedures.php')) {
    die('error finding dbProcedures.php in model dir');
}

if (!isset($_GET['num'])) {
    $num = 1000;  // defalut 10 films
}

$hostname = 'localhost';  //local host - our web server will be our db server.
$username = 'admin';
$password = 'Sweng#2020';
$dbname = 'Mitigation_Repository';

//try to connect to database
if (isset($_POST['keyword'])) {
    $rawType = $_POST['keyword'];
}

$searchType = str_ireplace("%20", " ", $rawType);

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //getTitleSearchMitigation($dbh, $num, $searchType);
    getFuzzySearchMitigation($dbh, $num, $searchType);

} catch (PDOException $e) {
    echo('PDO error for user ' . $username . ' in "ConnectDB()": ' . $e->getMessage());
}



