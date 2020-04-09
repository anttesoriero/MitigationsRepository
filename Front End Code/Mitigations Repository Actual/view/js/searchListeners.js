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

    $('.wholeResult').on('click', function (evt){
        evt.stopPropagation();
        console.log('YOU CLICKED A THING');

        var mit_id = $(this).attr('name');

        goToFull(mit_id);

    });
}

/****************************************************
 *                  Callbacks                       *
 ****************************************************/

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
        id = 'result' . i;
        htmlString += "<li><div class='wholeResult' id='" + id + "' name='" + jsonData[i].mitigation_id +"'>"+
            "<div class='resultRight'><span class='cat'>" + jsonData[i].category + "</span><br><span class='type'>"
            + jsonData[i].sec_type +"</span></div><span class='title'>" + jsonData[i].title +
            "</span><br><div class='resultLeft'><span class = 'mitid'>Mitigation ID:" + jsonData[i].mitigation_id +
            "</span>";

        htmlString += "<br><span class='author'>Author: " + jsonData[i].Author + "</span><br><span class='desc'>Created on:" +
            jsonData[i].created_at + "</span><br><span class='desc2'>Modified on:" + jsonData[i].modified_at + "</span><br><span class='further'>"
            + jsonData[i].description + "</span></div></div></li>";
    }

    htmlString += "</ul>";

    $('#allResults').html(htmlString);
}

function goToFull(mit_id) {

    $('#rightResultDisplay').html('<?php include ../php/fullMitigation.php?s=' + mit_id);
}