/*forking page listeners  */

console.log('forkListeners.js loaded.');

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

/*autopopulation call*/
var mit_id = location.search.substring(location.search.indexOf('=') + 1);
console.log(mit_id);

try {
    ajaxURL = '../../controller/php/getMitigation.php?m=' + mit_id;

    mitigation = ajaxFetch(ajaxURL, populateMitigation)

    ajaxURL = '../../controller/php/getAuthor.php?m=' + mit_id;

    mitigation = ajaxFetch(ajaxURL, populateAuthor)

} catch (e) {
    console.log("Error in getMitigation.php")
}

addListeners();

/*****************************************************
 *                        Listeners                  *
 *****************************************************/
 
 function addListeners() {
    $('#fork').on('click', function(evt)
    {
        evt.stopPropagation();
        //evt.preventDefault();
        console.log('CLICK');
        // Make URL for Ajax call
        ajaxURL = '../../controller/php/forking.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        $.post(ajaxURL, $('#forkMitigationForm').serialize(), processFork);
        console.log('AJAX call submitted.');
        processFork();
    });

}

/****************************************************
 *                  Callbacks                       *
 ****************************************************/
function processData(echoedData) {
    // Very simple callback that can be used for movies and actors
    // Note that the HTML tagging is done by the PHP
    $('#left').html(echoedData);
}

function processFork(forkData) {
    console.log(forkData);
    if (forkData.toLowerCase().indexOf("error") != -1) {
        $('#errorMessage').html(forkData);
    } else if (forkData.toLowerCase().indexOf("success") != -1) {
        $('#successMessage').html(forkData);  // visible for split second
        window.location.href = '../../index.php';
    }

}

//Autopop Return
//firstName lastName title os version description category sec_type
function populateMitigation(jsonResults) {
    var initialPop = JSON.parse(jsonResults)
    console.log(initialPop);
    $('#title').val(initialPop[0].title);
    $('#os').val(initialPop[0].OS_name);
    $('#version').val(initialPop[0].version)
    $('#description').val(initialPop[0].description);


}

function populateAuthor(jsonResults) {
    var initialPop = JSON.parse(jsonResults)
    console.log(initialPop);

    $('#firstName').val(initialPop[0].first_name);
    $('#lastName').val(initialPop[0].last_name);
}

function destroy(message) {
    $('#rightResultDisplay').html(message);
}