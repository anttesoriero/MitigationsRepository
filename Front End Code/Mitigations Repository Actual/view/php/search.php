<?php session_start(); ?>
<head>
    <title> Search Mitigation - Mitigation Repository </title>
</head>
<?php include 'nav.php' ?>
<body>
<?php
if (isset($_GET['t'])) {
    $type = $_GET['t'];
}
if (isset($_GET['c'])) {
    $cat = $_GET['c'];
}
?>
<link id="searchStyle" rel="stylesheet" type="text/css" href="../css/searchStyle.css"/>
<h2> Search Results </h2>

<!-- Searching -->
<div class="bodySearch">
    <input type="text" id="myInput" placeholder="Refine Search">
    <?php
    $mysqli = new MySQLi('localhost', 'admin', 'Sweng#2020', 'Mitigation_Repository');

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
        while ($rows = $result->fetch_assoc()) {
            $sec_type = $rows['Control Function'];
            echo "<option value = '$sec_type'>$sec_type</option>";
        }
        ?>
    </select>

    <?php
    $mysqli = new MySQLi('localhost', 'admin', 'Sweng#2020', 'Mitigation_Repository');

    $result = $mysqli->query("CALL Mitigation_Repository.Get_OS_Name()");
    ?>
    <select name="osMenu" id="osMenu">
        <option selected disabled>Choose Operating System</option>
        <?php
        while ($rows = $result->fetch_assoc()) {
            $osMenu = $rows['OS Name'];
            echo "<option value = '$osMenu'>$osMenu</option>";
        }
        ?>
    </select>
    <div id="sortOrder">
        <h3>Sort Order:</h3>
        <select name="sortType" id="sortType">
            <option selected disabled>Choose a Sort Type</option>
            <option value="dateDesc">Date Descending</option>
            <option value="dateAsc">Date Ascending</option>
            <option value="score">Relevance</option>
        </select>
    </div>
</div>
<br>
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
<!--<script type="text/javascript" src="../js/searchFunctions.js"></script>-->
</body>
</html>
