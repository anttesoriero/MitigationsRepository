<!DOCTYPE html>
<html>
<head>
    <title> Mitigation Repository </title>
    <meta charset='utf-8'/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php
    $url = $_SERVER['REQUEST_URI'];
    if (strpos($url, "index") !== false) {
        echo "<link id='mainCSS' rel='stylesheet' type='text/css' href='view/css/main.css'/>";
    } else {
        echo "<link id='mainCSS' rel='stylesheet' type='text/css' href='../../view/css/main.css'/>";
    }
    ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
<?php
//if (!isset($_SESSION['logged_in'])) {
$_SESSION['refurl'] = $_SERVER['REQUEST_URI'];
echo $_SESSION['refurl'];
//}
?>
<div class="topnav">

    <?php

    $url = $_SERVER['REQUEST_URI'];
    if (strpos($url, "index") !== false) {
        echo "<a class='active' href='index.php'>Mitigation Repository <i class='fa fa-database'></i></a>
<div class='login'><a href='view/php/loginPage.php?q=index'>Login</a></div>";
    } else {
        echo "<a class='active' href='../../index.php'>Mitigation Repository <i class='fa fa-database'></i></a>
<div class='login'><a href='../../view/php/loginPage.php?q=index'>Login</a></div>";
    }
    ?>

    <!--<div class="login"><a href="view/php/loginPage.php?q=index">Login</a></div>-->
    <div class="user">
        <?php
        if (isset($_SESSION['username'])) {
            echo ' Logged in as ' . $_SESSION['username'];
            if (!isset($_SESSION['role'])) {
                $loggedinas = $_SESSION['username'];
                $mysqli = new MySQLi('localhost', $_SESSION['username'], $_SESSION['password'], 'Mitigation_Repository');
                $sqlstring = "CALL Mitigation_Repository.get_Role('$loggedinas')";
                $result = $mysqli->query($sqlstring) or die($mysqli->error);
                while ($rows = $result->fetch_assoc()) {
                    $role = $rows["ROLE"];
                    $_SESSION['role'] = $role;
                }
            }
            echo $_SESSION['role'];

        } else {
            echo 'Guest Access';
        }
        ?>
    </div>
</div>
</body>