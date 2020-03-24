<?php session_start();
    $_SESSION["username"] = "guest"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Mitigation Repository</title>
    <meta charset = 'utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link id='mainCSS' rel="stylesheet" type="text/css" href="view/css/main.css" />
    <link id='mitigationCSS' rel="stylesheet" type="text/css" href="view/css/mitigationStyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
<div class="topnav"> <a class="active" href="#home">Mitigation Repository <i class="fa fa-database"></i></a></div>
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

<?php
$conn = new mysqli('localhost', 'username', 'password', 'Mitigations_Repository')
or die ('Cannot connect to db');

    $result = $conn->query("select category, type from table");
	
    echo "<html>";
    echo "<body>";
    echo "<select name='id'>";

    while ($row = $result->fetch_assoc()) {

                  unset($id, $name);
                  $category = $row['category'];
                  $type = $row['type']; 
                  echo '<option value="'.$category.'">'.$type.'</option>';
                 
}

    echo "</select>";
    echo "</body>";
    echo "</html>";
?>

<div class = "left">
<div class="bodySearch">
    <form id='searchForm'>
        <input type="text" id="searchField" name ='searchField' placeholder="Search Mitigation">
    </form>
</div>
</div>
<div class="v1"></div>
<div class="right">
    <h2> Create new Mitigation </h2>
    <button type="button" id="newMitigation">Create new Mitigation</button>
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
