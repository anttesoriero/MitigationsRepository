/*forking page listeners  */

console.log('forkListeners.js loaded.');

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
	console.log('Test');
    if (forkData.toLowerCase().indexOf("error") != -1) {
        $('#errorMessage').html(forkData);
    } else if (forkData.toLowerCase().indexOf("success") != -1) {
        $('#successMessage').html(forkData);  // visible for split second
    }
		window.location.href = '../../index.php';
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

function destroy(message) {
    $('#rightResultDisplay').html(message);
}