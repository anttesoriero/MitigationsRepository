<?php session_start();
?>

<?php include 'view/php/nav.php' ?>

<body>
<div class="left">
    <div class="bodySearch">

        <h2> Search Mitigation </h2>
        <form id='searchForm'>
            <div class="frmSearch">
                <input type="text" id="searchField" name="searchField" placeholder="Search Mitigation By Title"/>
                <div id="suggestion-box"></div>
                <br>
            </div>
            <input type="submit" id="searchButton" name="searchButton" value="Search By Title"/>
        </form>
        <br>
        <!-- Temp 10 -->
        <br><br><br>
        <form id='catType'>
            <?php include 'view/php/selectCT.php'; ?>
            <br><br><br>
            <!-- End Temp -->

            <input type="submit" id="searchButton" name="searchButton" value="Search By Category and Type"/>
        </form>

        <button class="button" id="mostRecent">25 Most Recent Mitigations</button>
        <br><br><br>
        <!-- <button class="button" id="random"> 25 Random Mitigations</button>-->
    </div>
</div>
<div class="v1"></div>
<div class="right">
    <h2> Create new Mitigation </h2>
    <button class="button" id="newMitigation">Create new Mitigation</button>
</div>

<!-- Not displaying properly, so commented out
<div id="love">
    Created with &#10084;&#65039; by Team River Otters
</div>
-->

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
