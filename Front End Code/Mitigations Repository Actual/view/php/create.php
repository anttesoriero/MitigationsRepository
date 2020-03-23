<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="CreateStyle.css">
    <link id='mainCSS' rel="stylesheet" type="text/css" href="view/css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Create Mitigation </title>

</head>
<body>
<div class="topnav"> <a class="active" href="./index.php"> Mitigation Repository <i class="fa fa-database"></i></a>
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
    <h2 style = "float: center"> Create a Mitigation </h2>
    <h3 style="margin-left: 550px;"> Enter Mitigation Title </h3>
    <div class="bodySearch">
        <form action="./createprototype.htm">
            <input type="text" placeholder="Title">
        </form>
    </div>

    <h3 style="margin-left: 550px;"> Enter Operating System </h3>
    <div class="bodySearch">
        <form action="./createprototype.htm">
            <input type="text" placeholder="Operating System">
        </form>
    </div>

    <h3 style="margin-left: 550px;"> Enter Operating System Version </h3>
    <div class="bodySearch">
        <form action="./createprototype.htm">
            <input type="text" placeholder="Version">
        </form>
    </div>

    <h3 style="margin-left: 550px;"> Enter Mitigation Description </h3>
    <div class="descriptionSearch">
        <form action="./createprototype.htm">
            <input type="text" placeholder="Mitigation Description">
        </form>
    </div>


    <div>
        <h3 style="margin-left: 600px;"> Category: </h3>
        <p>
        </p><div class="dropdown">
            <button onclick="dropDown()" class="dropbtn">Select Category</button>
            <div id="myDropdown" class="dropdown-content"> <a href="#">Administrative</a> <a href="#">Physical</a> <a href="#">Technical</a> </div>
        </div>
        <p></p>
        <h3 style="margin-left: 600px;"> Type: </h3>

        <div class="dropdown">
            <button onclick="dropDown2()" class="dropbtn">Select Type</button>
            <div id="myDropdown2" class="dropdown-content"> <a href="#">Directive</a> <a href="#">Preventative</a> <a href="#">Detevtive</a> <a href="#">Corrective</a> <a href="#">Recovery</a> </div>
        </div>
        <p></p>
        <div class="bodySearch">
            <form action="./createprototype.htm">
                <button class="button">Create Mitigation</button>
            </form>
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
