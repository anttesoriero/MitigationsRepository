<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Mitigation Repository</title>
    <link id="mainCSS" rel="stylesheet" type="text/css" href="../css/main.css" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- for adaptive display... hopefully -->
    <meta name ="viewport" content = "width=device-width, initial-scale=1.0">
</head>
<body>
<div class="topnav"> <a class="active" href="./test.htm"> Mitigation Repository <i class="fa fa-database"></i></a>
    <div class = "user">
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
<div class = "user">
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
<div class="leftSearch">
    <div class="results" id="allResults">
        I AM A DUMMY TEXT
    </div>
</div>

<?php
$conn = new mysqli('localhost', 'username', 'password', 'database') 
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

<div class="v2">

</div>
<div class="rightSearch" id="rightResultDisplay">

</div>



<!-- Load all the javascript in -->

<!-- load jquery -->
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<!-- load ajax helper -->
<script type="text/javascript" src="../js/AjaxFunctions.js"></script>
<!-- load listeners for this page -->
<script type="text/javascript" src="../js/searchListeners.js"></script>
<!-- load other functionality -->
<script type="text/javascript" src="../js/searchFunctions.js"></script>
</body>
</html>
