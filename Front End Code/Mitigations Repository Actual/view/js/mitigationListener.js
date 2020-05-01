/*full mitigation page listeners  */

console.log('mitigationListener.js loaded.');
var place = window.location.href;

/*user Role*/
var role = 'role';

/*Getting user's role*/
try {
    ajaxURL = '../../controller/php/getRole.php';
    roleTemp = ajaxFetch(ajaxURL, processRole);
} catch (e) {
    console.log("Error in getRole.php" + e);
}

function processRole(jsonResults) {

    var jsonData = JSON.parse(jsonResults);
    role = jsonData[0].ROLE;
    console.log(role);
}

/*on load, initialize div content */
var mit_id = location.search.substring(location.search.indexOf('=') + 1);


try {
    ajaxURL = '../../controller/php/getMitigation.php?m=' + mit_id;
    console.log(ajaxURL);
    mitigations = ajaxFetch(ajaxURL, processMitigationData);
} catch (e) {
    console.log("Error in " + mit_id + " getMitigation.php " + e);

}

try {
    ajaxURL = '../../controller/php/getChildren.php?m=' + mit_id;

    children = ajaxFetch(ajaxURL, processChildren)
} catch (e) {
    console.log("Error in getchildren.php");
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
    var htmlString = "<div class='entireResult' id='" + mit_id + "'><div class='resultRight'>" +
        "<span class='cat'>" + jsonData[0].category + "</span><br>" +
        "<span class='type'>" + jsonData[0].sec_type + "</span></div>" +
        "<span class='title'>" + jsonData[0].title + "</span><br>" +
        "<div class='resultLeft'>" +
        "<span class='mitid'>Mitigation ID: " + mit_id + "</span><br><br>" +
        "<span class='link'>Link to this mitigation: " +
        "<a href='../php/fullMitigation.php?m=" + jsonData[0].mitigation_id + "'> "
        + jsonData[0].mitigation_id + "</a></span>" +
        "<br><br><span class='forks' id='forks'></span><br>";

    if (place.indexOf('delete') < 0) {

        htmlString += "<input type = 'button' class='btn'  class = 'fork' id='fork' name='" + mit_id + "' value='Fork Mitigation'/>";

        if (role === 'admin_user') {
            htmlString += "<input type = 'button' class='btn'  class = 'edit' id='edit' name='" + mit_id + "' value='Edit Mitigation'/>";
            htmlString += "<input type = 'button' class='btn'  class = 'delete' id='delete' name='" + mit_id + "' value='Delete Mitigation'/>";
        }
    }
    htmlString += "<br><span class='author'>Author: " + jsonData[0].Author + "</span>" +
        "<br><span class='desc'>Created on:" + jsonData[0].created_at + "</span><br>" +
        "<span class='desc2'>Modified on: " + jsonData[0].modified_at + "</span><br>" +
        "<span class='desc'>Operating System: " + jsonData[0].OS_name + "</span>" +
        "<span class = 'desc2'> Version: " + jsonData[0].version +
        "</span><br><span class='further'>" + jsonData[0].description + "</span></div>"

    $('#completeMitigation').html(htmlString);
}


function processChildren(jsonResults) {
    var jsonData = JSON.parse(jsonResults);
    console.log(jsonData);

    var children = jsonData.length;

    var linkString = "Children: ";

    for (var i = 0; i < children; i++) {
        linkString += "<a href='../php/fullMitigation.php?m=" + jsonData[i].mitigation_id + "'> " + jsonData[i].mitigation_id + "</a>";
    }

    $('#forks').html(linkString);


}