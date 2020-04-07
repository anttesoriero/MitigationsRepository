<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link id='mainCSS' rel="stylesheet" type="text/css" href="../css/main.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Login </title>
</head>


<body>
<div class="topnav"><a class="active" href="../index.php">Mitigation Repository <i class="fa fa-database"></i></a>
</div>
<div class="bodySearch">
    <form id="loginForm">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" required="required"/><br/>

        <label for="password">Password: </label>
        <input type="password" id="password" name="password" required="required"/><br/>

        <input type="hidden" name="refurl" value="<?php echo base64_encode($_SERVER['HTTP_REFERER']); ?>" />

        <input type="button" id="submitLogin" value="Submit"/><br/>

        <p><span id="successMessage" class="message"></span></p>
        <p><span id="errorMessage" class="error"></span></p>
    </form>
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