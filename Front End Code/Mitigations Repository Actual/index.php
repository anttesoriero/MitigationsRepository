<?php session_start();
    $_SESSION["username"] = "guest"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Mitigation Repository</title>
    <meta charset = 'utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link id='mainCSS' rel="stylesheet" type="text/css" href="view/css/main.css" />
    <link id='mitigationCSS' rel="stylesheet" type="text/css" href="view/css/mitigationStyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
<div class="topnav"> <a class="active" href="#home">Mitigation Repository <i class="fa fa-database"></i></a>

    <div class="form-popup" id="myForm">
        <form class="form-container" id="loginForm">
            <h1>Login</h1>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="button" class="btn" id="login">Login</button>

            <button type="button" class="btn cancel" id="Cancel">Close</button>
        </form>
    </div>
</div>
<h2 id="loginInstructions">
    <?php
//echo session_id();
//if ($_GET['sessionExpired'] == 'yes') {
//    echo 'Session expired or not established';
//}
//else {
//    echo 'Please login';
//}
?>


</h2>

<div class = "left">
<div class="bodySearch">

    <form id='searchForm'>
        <input type="text" id="searchField" name ='searchField' placeholder="Search Mitigation">
    </form>
    <br><br>
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
<br><br><br>
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
    <br><br><br>
    <button class="button" id="mostRecent">25 Most Recent Mitigations</button>
    <br><br><br>
   <!-- <button class="button" id="random"> 25 Random Mitigations</button>-->
</div>
</div>
<div class="v1"></div>
<div class="right">
    <h2> Create new Mitigation </h2>
    <button class="button" id="newMitigation">Create new Mitigation</button>
</div>

<!-- loading javascript -->

<!-- First jquery -->
    <script type='text/javascript' src='view/js/jquery-3.4.1.min.js'><</script>
<!-- Then ajax helper file -->
    <script type ='text/javascript' src='view/js/AjaxFunctions.js'></script>

<!-- Listeners to attach actions to controls -->
    <script type='text/javascript' src='view/js/indexListeners.js'></script>
    <script type='text/javascript' src='view/js/loginListeners.js'></script>

</body>
</html>
