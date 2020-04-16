<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title> Delete Mitigation - Mitigation Repository </title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link id="forkingCSS" rel="stylesheet" type="text/css" href="../css/deleteStyle.css">
    <link id="mainCSS" rel="stylesheet" type="text/css" href="../css/main.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<?php
if (!isset($_SESSION['logged_in'])) {
    $_SESSION['refurl'] = $_SERVER['REQUEST_URI'];
    echo $_SESSION['refurl'];
    header("Location: /view/php/loginPage.php");
}

if (isset($_GET['s'])) {
    $Mitigation_To_Delete = $_GET['s'];
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
<div class="center" id="center">

<form id="deleteMitigationForm">
     <input type="hidden" name = 'mitigationToDelete' value='<?php echo $Mitigation_To_Delete ?>'/>
    <h2> Delete	Mitigation </h2>
	
	<p> Are you sure you would like to delete this mitigation? </p>
	

	 <input type="button" class="button" id="delete" value="Yes"/>
	
	<div class="completeMitigation" id="completeMitigation" name="completeMitigation"></div>
</div>
</form>

	<!-- Load all the javascript in -->

	<!-- load jquery -->
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<!-- load ajax helper -->
	<script type="text/javascript" src="../js/AjaxFunctions.js"></script>
	<!-- load listeners for this page -->
	<script type="text/javascript" src="../js/mitigationListener.js"></script>


</body>
</html>

