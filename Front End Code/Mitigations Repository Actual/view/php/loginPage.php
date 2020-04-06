<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="login.css">
<link id='mainCSS' rel="stylesheet" type="text/css" href="view/css/main.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="create.js"></script>
<title> Login </title>
</head>


<body>
<div class="topnav"> <a class="active" href="#home">Mitigation Repository <i class="fa fa-database"></i></a>
</div>
<h3 style="margin-left: 550px;"> Username: </h3>
  <div class="bodySearch">
      <form id="loginForm">
<label for="username">Username: </label>
      <input type="text" id="username" name="username" required="required" /><br/>

      <label for="password">Password: </label>
      <input type="password" id="password" name="password" required="reqired" /><br/>

      <input type="button" id="submitLogin" value="Submit" /><br/>

      <p><span id="successMessage" class="message"></span></p>
      <p><span id="errorMessage" class="error"></span></p>
      </form>
  </div>

  </body>
</html>