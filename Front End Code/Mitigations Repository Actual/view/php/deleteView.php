<?php session_start(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include 'nav.php' 


<body>
<?php
if (!isset($_SESSION['logged_in'])) {
    header("Location: /view/php/loginPage.php");
}

if (isset($_GET['s'])) {
    $mit_id = $_GET['s'];
}

?>
<link id="deletingCSS" rel="stylesheet" type="text/css" href="../css/deleteStyle.css">
<link id="mitigationCSS" rel="stylesheet" type="text/css" href="../css/fullMitigationStyle.css">
<center>
    <!-- <div class="center" id="center"> -->
    <h2> Delete Mitigation </h2>
    <form id="deleteMitigationForm">
        <input type="hidden" name='mit_id' value='<?php echo $mit_id ?>'/>
        <p> Are you sure you would like to delete this mitigation? </p>
        <input type="button" class="button" id="delete" value="Yes"/>
        <input type="button" class="button" onclick="window.location.href = '../../index.php';" value="No"/>
    </form>
</center>
<div class="completeMitigation" id="completeMitigation" name="completeMitigation"></div>
</div>


<!-- Load all the javascript in -->

<!-- load jquery -->
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<!-- load ajax helper -->
<script type="text/javascript" src="../js/AjaxFunctions.js"></script>
	<!-- load listeners for this page -->
	<script type="text/javascript" src="../js/mitigationListener.js"></script>	
	<!-- load listeners for this page -->
	<script type="text/javascript" src="../js/deleteListeners.js"></script>


</body>
</html>

