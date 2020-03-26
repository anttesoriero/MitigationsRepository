<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Mitigation Repository</title>
    <link id="mainCSS" rel="stylesheet" type="text/css" href="../css/main.css" />
    <link id="searchStyle" rel="stylesheet" type="text/css" href="../css/mitigationStyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">

    <!-- for adaptive display... hopefully -->
    <meta name ="viewport" content = "width=device-width, initial-scale=1.0">

</head>
<body>
<div class="topnav"> <a class="active" href="../../index.php"> Mitigation Repository <i class="fa fa-database"></i></a>
    <div class = "user">
        <?php
        //echo session_id();
        //if (isset($_SESSION['username']))
      //  {
        //    echo ' Logged in as ' . $_SESSION['username'];
       // }
       // else
       // {
       //     echo 'Guest Access';
       // }
        ?>
    </div>
</div>
<div class = "user">
    <?php
       // echo session_id();
       // if (isset($_SESSION['username']))
       // {
       //     echo ' Logged in as ' . $_SESSION['username'];
      //  }
      //  else
      //  {
      //      echo 'Guest Access';
      //  }
    ?>
</div>
<h2 style = "float: left"> Search Results </h2>
<br>
<br>
<br>
<div class = "bodySearch">
    <input type="text" id="myInput" onkeyup="results()" placeholder="Refine Search">
    <?php
    $mysqli = NEW MySQLi('localhost','admin','Sweng#2020','Mitigation_Repository');

    $result = $mysqli->query("CALL Mitigation_Repository.GetCategory()");
    ?>
    <select name="category">
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
    <select name="sec_type">
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
