/*forking page listeners  */

console.log('editListeners.js loaded.');

var mit_id = location.search.substring(location.search.indexOf('=') + 1);
console.log(mit_id);

try {
    ajaxURL = '../../controller/php/getMitigation.php?m=' + mit_id;

    mitigation = ajaxFetch(ajaxURL, populateMitigation)

} catch (e) {
    console.log("Error in getMitigation.php")
}

addListeners();

/*****************************************************
 *                        Listeners                  *
 *****************************************************/

function addListeners() {
    $('#edit').on('click', function (evt) {
        evt.stopPropagation();
       // evt.preventDefault();
        console.log('CLICK');
        // Make URL for Ajax call
        ajaxURL = '../../controller/php/editing.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        $.post(ajaxURL, $('#editMitigationForm').serialize(), processEdit);
        console.log('AJAX call submitted.');
        processEdit();
    });

}

/****************************************************
 *                  Callbacks                       *
 ****************************************************/
function processEdit(editData) {
    if (editData.toLowerCase().indexOf("error") != -1) {
        $('#errorMessage').html(editData);
    } else if (editData.toLowerCase().indexOf("success") != -1) {
        $('#successMessage').html(editData);  // visible for split second

        window.location.href = '../../index.php';
    }
}

//firstName lastName title os version desciption category sec_type
function populateMitigation(initialPop) {
    console.log(initialPop);
    $('#title').val(initialPop[0].title);
    $('#os').val(initialPop[0].OS_name);
    $('#description').val(initialPop[0].descripton);
}