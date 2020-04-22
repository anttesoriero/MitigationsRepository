<?php session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Mitigation Repository </title>
    <meta charset='utf-8'/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link id='mainCSS' rel="stylesheet" type="text/css" href="view/css/main.css"/>
    <link id='mitigationCSS' rel="stylesheet" type="text/css" href="view/css/mitigationStyle.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
<?php
if (!isset($_SESSION['logged_in'])) {
    $_SESSION['refurl'] = $_SERVER['REQUEST_URI'];

}
?>
    <div class="topnav"><a class="active" href="#home">Mitigation Repository <i class="fa fa-database"></i></a>

        <div class="login"><a href="view/php/loginPage.php?q=index">Login</a></div>
        <div class="user">
            <?php
            if (isset($_SESSION['username']))
            {
                echo ' Logged in as ' . $_SESSION['username'];
            }
            else
            {
                echo 'Guest Access';
            }
            ?>
        </div>
    </div>
    <!--<h2 id="loginInstructions">
        <?php
        //echo session_id();
        //if ($_GET['sessionExpired'] == 'yes') {
        //    echo 'Session expired or not established';
        //}
        //else {
        //    echo 'Please login';
       // }
        ?>


    </h2>-->

<div class="left">
    <div class="bodySearch">

        <h2> Search Mitigation </h2>
        <form id='searchForm'>
            <input type="text" id="searchField" name="searchField" placeholder="Search Mitigation By Title"/><br>
            <input type="submit" id="searchButton" name="searchButton" value="Search By Title"/>
        </form>
        <br>
        <!-- Temp 10 -->
        <br><br><br>
        <form id='catType'>
            <?php include 'view/php/selectCT.php'; ?>
            <br><br><br>
            <!-- End Temp -->

            <input type="submit" id="searchButton" name="searchButton" value="Search By Category and Type"/>
        </form>

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
    <script type='text/javascript' src='view/js/AjaxFunctions.js'></script>

    <!-- Listeners to attach actions to controls -->
    <script type='text/javascript' src='view/js/indexListeners.js'></script>
    <script type='text/javascript' src='view/js/loginListeners.js'></script>

</body>
</html>
