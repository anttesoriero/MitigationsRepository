<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title> Create Mitigation - Mitigation Repository </title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- <link id="createCSS" rel="stylesheet" type="text/css" href="../css/CreateStyle.css"> -->
    <link id="cefCSS" rel="stylesheet" type="text/css" href="../css/cefStyle.css">
    <link id="mainCSS" rel="stylesheet" type="text/css" href="../css/main.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<?php
if (!isset($_SESSION['logged_in'])) {
  $_SESSION['refurl'] = $_SERVER['REQUEST_URI'];
 echo $_SESSION['refurl'];
 header("Location: /view/php/loginPage.php");
}
?>
<div class="topnav"><a class="active" href="../../index.php"> Mitigation Repository <i class="fa fa-database"></i></a>
    <div class="login"><a href="loginPage.php">Login</a></div>
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

<!-- <div class="left" id="leftSide"> -->
    <h2> Create a Mitigation </h2>

    <div class="bodySearch">
        <form id="createMitigationForm">
            <!-- Author Name Block -->
            <div id="block_container">
                <div id="bloc1">
                    <h3> Author First Name </h3>
                    <input type="text" spellcheck="false" placeholder="First Name" name="firstName" required='required'>
                </div>
                <div id="bloc2">
                    <h3> Author Last Name </h3>
                    <input type="text" spellcheck="false" placeholder="Last Name" name="lastName" required='required'>
                </div>
            </div>
            </br>

            <!-- Mit Title Block -->
            <div id="block_container">
                <h3> Mitigation Title </h3>
                <input type="text" spellcheck="true" placeholder="Mitigation Title" name="title" required='required'>
            </div>
            </br>

            <!-- OS Block -->
            <div id="block_container">
                <div id="bloc1">
                    <h3> Operating System </h3>
                    <input type="text" spellcheck="true" placeholder="Operating System" name="os" required='required'>
                </div>
                <div id="bloc2">
                    <h3> Operating System Version </h3>
                    <input type="text" spellcheck="true" placeholder="Version" name="version" required='required'>
                </div>
            </div>
            </br>

            <!-- Mit Desc Block -->
            <div id="block_container">
                <h3> Enter Mitigation Description </h3>
                <div class="descriptionSearchTA">
                    <textarea rows="5" cols="25" spellcheck="true" placeholder="Mitigation Description"
                              name="description" required='required'></textarea>
                </div>
            </div>
            </br>

            <div id="block_container">
				<!-- Category Dropdown -->
                <!-- <h3 style="margin-left: 600px;"> Category: </h3> -->
                <label for="category" style="word-wrap:break-word"> Category: </label>

                <?php
            $mysqli = new MySQLi('localhost', 'admin', 'Sweng#2020', 'Mitigation_Repository');

            $result = $mysqli->query("CALL Mitigation_Repository.GetCategory()");
            ?>
                <select id="category" name="category" required='required'>
                    <option selected disabled>Choose Category</option>
                    <?php
                while ($rows = $result->fetch_assoc()) {
                    $category = $rows['Control Type'];
                    echo "<option value = '$category'>$category</option>";
                }
                ?>
            </select>
			<!-- End of Category Dropdown -->
				
				<br>
			<!-- Type Dropdown -->
            <!-- <h3 style="margin-left: 600px;"> Type: </h3> -->
            <label for="sec_type" style="word-wrap:break-word"> Type: </label>
            <?php
            $mysqli = new MySQLi('localhost', 'admin', 'Sweng#2020', 'Mitigation_Repository');

            $result = $mysqli->query("CALL Mitigation_Repository.GetType()");
            ?>
                <select id="sec_type" name="sec_type" required='required'>
                    <option selected disabled>Choose Type</option>
                    <?php
                while ($rows = $result->fetch_assoc()) {
                    $sec_type = $rows['Control Function'];
                    echo "<option value = '$sec_type'>$sec_type</option>";
                }
                ?>
                </select>
               <!-- End of Type Dropdown -->

               <br>
               <br>
               <!-- Create Mitigation Button -->
               <input type="button" class="button" id="create" value="Create Mitigation"/>
            </div>
        </form>
    </div>

<!-- </div> -->
<!-- <div class="right" id="rightResultDisplay">
    <p><span id='successMessage' class='message'></span></p>
    <p><span id='errorMessage' class='error'></span></p>

</div> -->


<!-- Load all the javascript in -->

<!-- load jquery -->
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<!-- load ajax helper -->
<script type="text/javascript" src="../js/AjaxFunctions.js"></script>
<!-- load listeners for this page -->
<script type="text/javascript" src="../js/createListeners.js"></script>
</body>
</html>
