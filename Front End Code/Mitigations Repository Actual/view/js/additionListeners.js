/*create mitigation page listeners  */

console.log('additionListeners.js loaded.');

/*on load, initialize div content */

$('#left').load('../shtml/createMitigation.shtml');

/* Initial population of results  */

try {
    ajaxURL = '../../controller/php/addMitigation.php';
    mitigations = ajaxFetch(ajaxURL, addMitigations);
}
catch (e) {
    console.log("Error in addMitigation.php " + e );

}

addListeners();

/*****************************************************
 *                        Listeners                  *
 *****************************************************/
function addListeners() {


}