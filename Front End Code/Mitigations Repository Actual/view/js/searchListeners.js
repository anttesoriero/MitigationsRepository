/*search page listeners  */

console.log('searchListeners.js loaded.');

/*on load, initialize div content */

$('#left').load('../shtml/searchResults.shtml');

/* Initial population of results  */

try {
    ajaxURL = '../../controller/php/searchMitigation.php';
    mitigations = ajaxFetch(ajaxURL, processMitigations);
}
catch (e) {
    console.log("Error in getMitigation.php " + e );

}

addListeners();

/*****************************************************
 *                        Listeners                  *
 *****************************************************/
function addListeners() {

    try{

    }
    catch (e) {
        console.log("Error in getMitigation.php " + e);
    }
}