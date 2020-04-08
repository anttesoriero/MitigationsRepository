<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title> Login - Mitigation Repository </title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link id='mainCSS' rel="stylesheet" type="text/css" href="../css/main.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


<body>
<div class="topnav"><a class="active" href="../../index.php">Mitigation Repository <i class="fa fa-database"></i></a>
    <div class="login"><a href="loginPage.php">Login</a></div>
    <div class="user">
        <?php
        echo session_id();
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
<div class="bodySearch">
    <form id='loginForm'>
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" required="required"/><br/>

        <label for="password">Password: </label>
        <input type="password" id="password" name="password" required="required"/><br/>

        <input type="button" id="submitLogin" value="Submit"/><br/>
        <input type='button' id='logout' value='Logout' />

        <p><span id="successMessage" class="message"></span></p>
        <p><span id="errorMessage" class="error"></span></p>
    </form>
</div>

<!-- loading javascript -->

<!-- First jquery -->
<script type='text/javascript' src='../js/jquery-3.4.1.min.js'><</script>
<!-- Then ajax helper file -->
<script type='text/javascript' src='../js/AjaxFunctions.js'></script>

<!-- Listeners to attach actions to controls -->
<script type='text/javascript' src='../js/loginListeners.js'></script>
</body>
</html>