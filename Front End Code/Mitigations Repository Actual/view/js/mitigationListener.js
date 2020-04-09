/*full mitigation page listeners  */

console.log('mitigationListener.js loaded.');

/*on load, initialize div content */
var mit_id = location.search.substring(location.search.indexOf('=') + 1);



try {
    ajaxURL = '../../controller/php/getMitigation.php?s=' + mit_id;
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
    var jsonData = JSON.parse(jsonResults);
    console.log(jsonData);
    var htmlString = "<div class='entireResult' id='" + mit_id + "'><div class='resultRight'><span class='cat'>" + jsonData.category +
        "</span><br><span class='type'>" + jsonData.sec_type +"</span></div><span class='title'>" + jsonData.title +"</span><br>" +
        "<div class='resultLeft'><span class='mitid'>Mitigation ID: " + mit_id + "</span><br><br>";

    htmlString += "<input type = 'button' class='btn' id='edit' name='" + mit_id + "' value='Edit Mitigation'/>";
    htmlString += "<input type = 'button' class='btn' id='fork' name='" + mit_id + "' value='Fork Mitigation'/>";

    htmlString += "<br><span class='author'>Author: " + jsonData.Author + "</span><br><span class='desc'>Craeted on:"
        + jsonData.created_at + "</span><br><span class='desc2'>Modified on: " + jsonData.modified_at +"</span><br>" +
        "<span class='further'>" + jsonData.description + "</span></div>"

    $('#completeMitigation').html(htmlString);
}

