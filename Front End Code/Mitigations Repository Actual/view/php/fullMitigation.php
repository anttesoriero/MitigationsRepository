<?php
session_start();
?>

<div class='resultRight'><span class='cat'>

        jsonData[i].category
    </span><br><span class='type'>
        jsonData[i].sec_type
    </span></div><span class='title'>
    jsonData[i].title
</span><br>
<div class='resultLeft'><span class='mitid'>Mitigation ID: jsonData[i].mitigation_id </span><br><br>

    <input type='button' class='btn' id='edit' name='" + jsonData[i].mitigation_id + "' value='Edit Mitigation'/>

    <input type='button' class='btn' id='fork' name='" + jsonData[i].mitigation_id + "' value='Fork Mitigation'/>

    <br><span class='author'>Author: " + jsonData[i].Author + "</span><br><span class='desc'>Created on: jsonData[i].created_at + "</span><br><span
            class='desc2'>Modified on:" + jsonData[i].modified_at + "</span><br><span class='further'>
            + jsonData[i].description + "</span></div>
