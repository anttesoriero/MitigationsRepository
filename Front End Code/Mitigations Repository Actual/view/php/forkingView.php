<?php session_start(); ?>
<?php include 'nav.php'; ?>
<!DOCTYPE html>
<head>
    <title> Fork a Mitigation - Mitigation Repository </title>
    <meta charset='utf-8'/>
    <link id="cefCSS" rel="stylesheet" type="text/css" href="../css/cefStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php
if (!isset($_SESSION['logged_in'])) {
    header("Location: /view/php/loginPage.php");
}


if (isset($_GET['s'])) {
    $Mitigation_To_Fork = $_GET['s'];
}
?>

<h2 style="text-align:center"> Fork Mitigation </h2>


<div class="bodySearch">
    <form id="forkMitigationForm">
        <input type="hidden" name='mitigationToFork' value='<?php echo $Mitigation_To_Fork ?>'/>
        <!-- Author Name Block -->
        <div id="block_container">
            <div id="bloc1">
                <h3> Author First Name </h3>
                <input id="firstName" type="text" spellcheck="false" placeholder="First Name" name="firstName"
                       required='required'>
            </div>
            <div id="bloc2">
                <h3> Author Last Name </h3>
                <input id="lastName" type="text" spellcheck="false" placeholder="Last Name" name="lastName"
                       required='required'>
            </div>
        </div>
        </br>

        <!-- Mit Title Block -->
        <div id="block_container">
            <h3> Mitigation Title </h3>
            <input id="title" type="text" spellcheck="true" placeholder="Mitigation Title" name="title"
                   required='required'>
        </div>
        </br>

            <!-- OS Block -->
            <div id="block_container">
                <div id="bloc1">
                    <h3> Operating System </h3>
                    <input id="os" type="text" spellcheck="true" placeholder="Operating System" name="os" required='required'>
                </div>
                <div id="bloc2">
                    <h3> Operating System Version </h3>
                    <input id="version" type="text" spellcheck="true" placeholder="Version" name="version" required='required'>
                </div>
            </div>
            </br>

            <!-- Mit Desc Block -->
            <div id="block_container">
                <h3> Enter Mitigation Description </h3>
                <div class="descriptionSearchTA">
                    <textarea id="description" rows="5" cols="25" spellcheck="true" placeholder="Mitigation Description"
                              name="description" required='required'></textarea>
                </div>
            </div>
            </br>

            <div id="block_container">
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
				
				<br>

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

                <br>
                <br>
                <input type="button" class="button" id="fork" value="Fork Mitigation"/>
            </div>
        </form>
    </div>



<!-- Load all the javascript in -->

<!-- load jquery -->
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<!-- load ajax helper -->
<script type="text/javascript" src="../js/AjaxFunctions.js"></script>
<!-- load listeners for this page -->
<script type="text/javascript" src="../js/forkListeners.js"></script>
</body>
</html>
