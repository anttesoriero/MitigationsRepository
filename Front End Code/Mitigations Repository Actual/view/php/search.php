<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title> Search Mitigation - Mitigation Repository</title>
    <link id="mainCSS" rel="stylesheet" type="text/css" href="../css/main.css"/>
    <link id="searchStyle" rel="stylesheet" type="text/css" href="../css/mitigationStyle.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">

    <!-- for adaptive display... hopefully -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<div class="topnav"><a class="active" href="../../index.php"> Mitigation Repository <i class="fa fa-database"></i></a>
    <div class="login"><a href="loginPage.php">Login</a></div>
<div class="user">
    <?php
    if (isset($_SESSION['username'])) {
        echo ' Logged in as ' . $_SESSION['username'];
    } else {
        echo 'Guest Access';
    }
    ?>
    <?php
    if (isset($_GET['t'])) {
        $type = $_GET['t'];
        echo $type;
    }
    if (isset($_GET['c'])) {
        $cat = $_GET['c'];
        echo $cat;
    }
    ?>
</div>
</div>
<h2 style="float: left"> Search Results </h2>
<br>
<br>
<br>
<!-- Test 1 -->
<div class="bodySearch">
    <input type="text" id="myInput" placeholder="Refine Search">
    <?php
    $mysqli = NEW MySQLi('localhost','admin','Sweng#2020','Mitigation_Repository');

    $result = $mysqli->query("CALL Mitigation_Repository.GetCategory()");
    ?>
    <select name="category" id="category">
        <option selected disabled>Choose Category</option>
        <?php
        while($rows = $result->fetch_assoc())
        {
            $category = $rows['Control Type'];
            echo "<option value = '$category'>$category</option>";
        }
        ?>
    </select>

    <?php
    $mysqli = NEW MySQLi('localhost','admin','Sweng#2020','Mitigation_Repository');

    $result = $mysqli->query("CALL Mitigation_Repository.GetType()");
    ?>
    <select name="sec_type" id="sec_type">
        <option selected disabled>Choose Type</option>
        <?php
        while($rows = $result->fetch_assoc())
        {
            $sec_type = $rows['Control Function'];
            echo "<option value = '$sec_type'>$sec_type</option>";
        }
        ?>
    </select>
</div><br><br>
<div class="leftSearch">
    <div class="results" id="allResults">
        No Results
    </div>
</div>

<div class="v2"></div>
<div class="rightSearch" id="rightResultDisplay">
</div>


<!-- Load all the javascript in -->

<!-- load jquery -->
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<!-- load ajax helper -->
<script type="text/javascript" src="../js/AjaxFunctions.js"></script>
<!-- load listeners for this page -->
<script type="text/javascript" src="../js/searchListeners.js"></script>
<!-- load other functionality -->
<script type="text/javascript" src="../js/searchFunctions.js"></script>
</body>
</html>
