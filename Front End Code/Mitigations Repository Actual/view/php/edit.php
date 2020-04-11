<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title> Edit Mitigation - Mitigation Repository </title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link id="editCSS" rel="stylesheet" type="text/css" href="../css/EditStyle.css">
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


if (isset($_GET['s'])) {
    $Mitigation_To_Edit = $_GET['s'];
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

<div class="leftSearch" id="leftSide">
    <h2> Edit Mitigation </h2>


    <div class="bodySearch">
        <form id="editMitigationForm">
            <input type="hidden" name = 'mitigationToEdit' value='<?php echo $Mitigation_To_Edit ?>'/>
            <h3 style="margin-left: 550px;"> Author First Name </h3>
            <input type="text" spellcheck="false" placeholder="First Name" name="firstName" required='required'>
            <h3 style="margin-left: 550px;"> Author Last Name </h3>

            <input type="text" spellcheck="false" spellcheck="true" placeholder="Last Name" name="lastName"
                   required='required'>
            <h3 style="margin-left: 550px;"> Enter Mitigation Title </h3>
            <input type="text" spellcheck="true" placeholder="Title" name="title" required='required'>
            <h3 style="margin-left: 550px;"> Enter Operating System </h3>

            <input type="text" spellcheck="true" placeholder="Operating System" name="os" required='required'>

            <h3 style="margin-left: 550px;"> Enter Operating System Version </h3>
            <input type="text" spellcheck="true" placeholder="Version" name="version" required='required'>

            <h3 style="margin-left: 550px;"> Enter Mitigation Description </h3>
            <!-- <div class="descriptionSearch">

                <input type="text" placeholder="Mitigation Description" name="description" required='required'>
            </div> -->

            <div class="descriptionSearchTA">
                <textarea id="description" rows="5" cols="25" spellcheck="true" placeholder="Mitigation Description"
                          name="description" required='required'></textarea>
            </div>

            <center>

                <!-- <h3 style="margin-left: 600px;"> Category: </h3> -->
                <label for="category" style="margin-left: 600px;"> Category: </label>

                <?php
            $mysqli = new MySQLi('localhost', 'admin', 'Sweng#2020', 'Mitigation_Repository');

            $result = $mysqli->query("CALL Mitigation_Repository.GetCategory()");
            ?>
            <select name="category" required='required'>
                <option selected disabled>Choose Category</option>
                <?php
                while ($rows = $result->fetch_assoc()) {
                    $category = $rows['Control Type'];
                    echo "<option value = '$category'>$category</option>";
                }
                ?>
            </select>

            <br>

            <!-- <h3 style="margin-left: 600px;"> Type: </h3> -->
            <label for="sec_type" style="margin-left: 600px;"> Type: </label>
            <?php
            $mysqli = new MySQLi('localhost', 'admin', 'Sweng#2020', 'Mitigation_Repository');

            $result = $mysqli->query("CALL Mitigation_Repository.GetType()");
            ?>
            <select name="sec_type" required='required'>
                <option selected disabled>Choose Type</option>
                <?php
                while ($rows = $result->fetch_assoc()) {
                    $sec_type = $rows['Control Function'];
                    echo "<option value = '$sec_type'>$sec_type</option>";
                }
                ?>
            </select>

            <br>
            <input type="button" class="button" id="edit" value="Edit Mitigation"/>

            </center>

        </form>
    </div>
</div>

<div class="v2">

</div>
<div class="rightSearch" id="rightResultDisplay">
    <p><span id='successMessage' class='message'></span></p>
    <p><span id='errorMessage' class='error'></span></p>

</div>


<!-- Load all the javascript in -->

<!-- load jquery -->
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<!-- load ajax helper -->
<script type="text/javascript" src="../js/AjaxFunctions.js"></script>
<!-- load listeners for this page -->
<script type="text/javascript" src="../js/editListeners.js"></script>
</body>
</html>
