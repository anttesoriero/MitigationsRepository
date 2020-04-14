/*full mitigation page listeners  */

console.log('mitigationListener.js loaded.');

/*on load, initialize div content */
var mit_id = location.search.substring(location.search.indexOf('=') + 1);



try {
    ajaxURL = '../../controller/php/getMitigation.php?m=' + mit_id;
    console.log(ajaxURL);
    mitigations = ajaxFetch(ajaxURL, processMitigationData);
} catch (e) {
    console.log("Error in " + mit_id + " getMitigation.php " + e);

}
addListeners();

/*****************************************************
 *                        Listeners                  *
 *****************************************************/
function addListeners() {

    $('#edit').on('click', function (evt) {
        evt.stopPropagation();
        console.log('CLICK');

        var mit_id = $(this).attr('name');

        goToEdit(mit_id);
    });

    $('#fork').on('click', function (evt) {
        evt.stopPropagation();
        console.log('CLICK');

        var mit_id = $(this).attr('name');

        goToFork(mit_id);
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

function processMitigationData(jsonResults) {
    console.log(jsonResults);
    var jsonData = JSON.parse(jsonResults);
    console.log(jsonData);
    var htmlString = "<div class='entireResult' id='" + mit_id + "'><div class='resultRight'><span class='cat'>" + jsonData[0].category +
        "</span><br><span class='type'>" + jsonData[0].sec_type + "</span></div><span class='title'>" + jsonData[0].title + "</span><br>" +
        "<div class='resultLeft'><span class='mitid'>Mitigation ID: " + mit_id + "</span><br><br><span class='link'>Link to this mitigation: " +
        "<a href='../php/fullMitigation.php?m=" + jsonData[0].mitigation_id + "'> " + jsonData[0].mitigation_id + "</a></span><br><br>";


    htmlString += "<input type = 'button' class='btn' id='edit' name='" + mit_id + "' value='Edit Mitigation'/>";
    htmlString += "<input type = 'button' class='btn' id='fork' name='" + mit_id + "' value='Fork Mitigation'/>";

    htmlString += "<br><span class='author'>Author: " + jsonData[0].Author + "</span><br><span class='desc'>Created on:"
        + jsonData[0].created_at + "</span><br><span class='desc2'>Modified on: " + jsonData[0].modified_at + "</span><br>" +
        "<span class='further'>" + jsonData[0].description + "</span></div>"

    $('#completeMitigation').html(htmlString);
}

