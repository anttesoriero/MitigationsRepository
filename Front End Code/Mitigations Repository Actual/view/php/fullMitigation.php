<?php session_start();
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Full Mitigation - Mitigation Repository </title>
</head>
<?php
$url = $_SERVER['REQUEST_URI'];
if (strpos($url, 'delete') == false) {
    include 'nav.php';
}
?>

<body>
<link id="searchStyle" rel="stylesheet" type="text/css" href="../css/fullMitigationStyle.css"/>
<div class="completeMitigation" id="completeMitigation" name="completeMitigation"></div>

<!-- Load all the javascript in -->

<!-- load jquery -->
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<!-- load ajax helper -->
<script type="text/javascript" src="../js/AjaxFunctions.js"></script>
<!-- load listeners for this page -->
<script type="text/javascript" src="../js/mitigationListener.js"></script>


</body>
</html>