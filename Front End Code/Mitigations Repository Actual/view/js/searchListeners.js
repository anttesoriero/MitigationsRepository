/*search page listeners  */

console.log('searchListeners.js loaded.');

/*on load, initialize div content */

$('#left').load('../shtml/searchResults.shtml');

/* Initial population of results  */
var searchType = location.search.substring(location.search.indexOf('=') +1);

try {
    ajaxURL = '../../controller/php/getMitigation.php';
    mitigations = ajaxFetch(ajaxURL, processResults);
    console.log("Hopefully connected?");
}
catch (e) {
    console.log("Error in getMitigation.php " + e );

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
        console.log("Error in getMitigation.php " + e);
    }

 */
}

/****************************************************
 *                  Callbacks                       *
 ****************************************************/
function processData(echoedData) {
    // Very simple callback that can be used for movies and actors
    // Note that the HTML tagging is done by the PHP
    $('#left').html(echoedData);
}

function processResults(jsonResults) {

    //this parses the json results so JS can use them.
    //plus this gives each result its own listener
    //this actually echos what I did in the search prototype! - Theresa

    console.log(jsonResults);
    var jsonData = JSON.parse(jsonResults);
    var numRecords = jsonData.length;
    console.log(jsonData);

    var htmlString = "<h3> Results </h3>";
    var id;
    console.log("now parsing list...");
    for (var i = 0; i < numRecords; i++)
    {
        //This will make each row a unique div with a unique ID!
        id = "result" + i;
        htmlString += "<li><div class='wholeResult' id='" + id + "'><div class='resultRight'><span class='cat'></span><br><span class='type'></span></div><a" +
            " onclick=fillDiv('result" + i +"') href='#'><span class='title'>" + jsonData[i].title + "</span><br><div class='resultLeft'><span class='desc'>" +
            jsonData[i].created_at + "</span><br><span class='further'>" + jsonData[i].description + "</span></div></a></div></li>";
    }

    htmlString += "</ul>";

    $('#allResults').html(htmlString);

    //Now we can add the elements to the page.
    /*console.log("now adding elements to page...");
    for (var i = 0; i < numRecords; i++)
    {
        elementID = "#result" + i;
        ajaxURL = '../../controller/php/getMitigation.php?mitigation_id=' + jsonData[i].mitigation_id;
        console.log(ajaxURL);
        var mitigationData = new Array();

        $(elementID).on('click', function(evt)
        {
            try
            {
                console.log("ID-" + $(elementID).attr('id'));
                $('#rightResultDisplay').html($(elementID).attr('onclick'));
                mitigationData[i] = ajaxFetch(ajaxURL, processMitigationData);
            }
            catch (e)
            {
                console.log("Error in getMitigation.php" + e);
            }
        });
    }*/
}

function processMitigationData(jsonResults)
{
    $('#rightResultDisplay').html(jsonResults);

    var jsonData = JSON.parse(jsonResults);
    console.log(jsonData);
}

function destroy(message)
{
    $('#rightResultDisplay').html(message);
}