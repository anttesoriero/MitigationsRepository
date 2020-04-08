/*search page listeners  */

console.log('createListeners.js loaded.');

addListeners();

/*****************************************************
 *                        Listeners                  *
 *****************************************************/
function addListeners() {
    $('#create').on('click', function (evt) {
        evt.stopPropagation();
        //evt.preventDefault();
        console.log('CLICK');
        // Make URL for Ajax call
        ajaxURL = '../../controller/php/addition.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        $.post(ajaxURL, $('#createMitigationForm').serialize(), processAddition);
        console.log('AJAX call submitted.');
        processAddition();
    });

}

/****************************************************
 *                  Callbacks                       *
 ****************************************************/
function processAddition(additionData) {

    $('#rightResultDisplay').html(additionData);
}

		window.location.href = '../../index.php';
