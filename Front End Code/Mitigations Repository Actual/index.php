<?php session_start();
    $_SESSION["username"] = "guest"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Mitigation Repository</title>
    <meta charset = 'utf-8' />
</head>

<body>
<h2 id="loginInstructions">
    <?php
echo session_id();
if ($_GET['sessionExpired'] == 'yes') {
    echo 'Session expired or not established';
}
else {
    echo 'Please login';
}
?>
</h2>
<div class="bodySearch">
    <form>
        <input type="text" id="searchField" placeholder="Search Mitigation">
    </form>
</div>
</div>
<div class="v1"></div>
<div class="right">
    <h2> Create new Mitigation </h2>
    <div class="bodySearch">
        <input type="text" placeholder="Enter Mitigation">
    </div>
</div>

<!-- loading javascript -->

<!-- First jquery -->
    <script type='text/javascript' src='view/js/jquery-3.4.1.min.js'><</script>
<!-- Then ajax helper file -->
    <script type ='text/javascript' src='view/js/AjaxFunctions.js'></script>

<!-- Listeners to attach actions to controls -->
    <script type='text/javascript' src='view/js/indexListeners.js'></script>

</body>
</html>