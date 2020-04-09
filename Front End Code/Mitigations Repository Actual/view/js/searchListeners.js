/*search page listeners  */

console.log('searchListeners.js loaded.');

/*on load, initialize div content */

$('#left').load('../shtml/searchResults.shtml');

/* Initial population of results  */
var searchType = location.search.substring(location.search.indexOf('=') + 1);

try {
    if (searchType === 'random') {
        ajaxURL = '../../controller/php/getRandMitigation.php';
    } else if (searchType === 'mostrecent') {
        ajaxURL = '../../controller/php/getRecentMitigation.php';
    } else {
        ajaxURL = '../../controller/php/getTitleSearchMitigation.php?s=' + searchType;
    }

    console.log(ajaxURL);
    mitigations = ajaxFetch(ajaxURL, processResults);
    console.log("Hopefully connected?");
} catch (e) {
    console.log("Error in " + searchType + "get_____Mitigation.php " + e);

}

addListeners();

/*****************************************************
 *                        Listeners                  *
 *****************************************************/
function addListeners() {
    //Looking, I don't think this page actually needs listeners
    //but I want this to exist JUST IN CASE.  ATM it's a wasted
    //function.
    /*
        try{

        }
        catch (e) {
            console.log("Error in getRandMitigation.php " + e);
        }

     */

    $('#edit').on('click', function (evt) {
        evt.stopPropagation();
        console.log('CLICK');

        var mit_id = $(this).attr('name');

        // Make URL for Ajax call
        //ajaxURL = 'controller/php/login.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        // $.post(ajaxURL, $('#loginForm').serialize(), processLogin);
        // console.log('AJAX call submitted.');
        goToEdit(mit_id);
    });

    $('#fork').on('click', function (evt) {
        evt.stopPropagation();
        console.log('CLICK');

        var mit_id = $(this).attr('name');

        // Make URL for Ajax call
        //ajaxURL = 'controller/php/login.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        // $.post(ajaxURL, $('#loginForm').serialize(), processLogin);
        // console.log('AJAX call submitted.');
        goToFork(mit_id);
    });


    $('#result').on('click', function (evt){
        evt.stopPropagation();
        console.log('YOU CLICKED A THING');

        var mit_id = $(this).attr('name');

        ajaxURL = '../../controller/php/getMitigation.php

        $.post(ajaxURL, serialize)



    });
}

/****************************************************
 *                  Callbacks                       *
 ****************************************************/

function goToEdit(mit_id) {
    window.location.href = 'edit.php?s=' + mit_id;
}

function goToFork(mit_id) {
    window.location.href = 'forkingView.php?s=' + mit_id;
}

function processResults(jsonResults) {

    //this parses the json results so JS can use them.
    //plus this gives each result its own listener
    //this actually echos what I did in the search prototype! - Theresa

    console.log(jsonResults);
    var jsonData = JSON.parse(jsonResults);
    var numRecords = jsonData.length;
    console.log(jsonData);

    var htmlString = "<ul id='myUL'>";
    var id;
    console.log("now parsing list...");
    for (var i = 0; i < numRecords; i++) {
        //This will make each row a unique div with a unique ID!
        id = "result" + i;
        htmlString += "<li><div class='wholeResult' id='" + id + "'><a onclick=fillDiv('result" + i + "')>" +
            "<div class='resultRight'><span class='cat'>" + jsonData[i].category + "</span><br><span class='type'>"
            + jsonData[i].sec_type +"</span></div><span class='title'>" + jsonData[i].title +
            "</span><br><div class='resultLeft'><span class = 'mitid'>Mitigation ID:" + jsonData[i].mitigation_id +
            "</span><br><br>";

        //htmlString += "<input type = 'button' class='btn' id='edit' name='" + jsonData[i].mitigation_id + "' value='Edit Mitigation'/>";

        //htmlString += "<input type = 'button' class='btn' id='fork' name='" + jsonData[i].mitigation_id + "' value='Fork Mitigation'/>";

        htmlString += "<br><span class='author'>Author: " + jsonData[i].Author + "</span><br><span class='desc'>Created on:" +
            jsonData[i].created_at + "</span><br><span class='desc2'>Modified on:" + jsonData[i].modified_at + "</span><br><span class='further'>"
            + jsonData[i].description + "</span></div></a></div></li>";
    }

    htmlString += "</ul>";

    $('#allResults').html(htmlString);
}

function processMitigationData(mitigationData) {


    var jsonData = JSON.parse(jsonResults);
    console.log(jsonData);

    $('#rightResultDisplay').html('<?php include ../php/fullMitigation.php?s=' + jsonData);
}