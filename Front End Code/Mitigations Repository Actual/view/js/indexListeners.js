/* Index page listeners */

console.log('indexListeners.js loaded.');
var regex = /[!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~]/g;

function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

addListeners();

/**************************************
 *          Listeners                 *
 **************************************/

function addListeners() {
    //Listener for going to the search page
    $('#searchForm').on('submit', function (evt) {
        evt.preventDefault();
        evt.stopPropagation();
        var rawTerm = document.getElementById('searchField').value;
        var searchTerm = rawTerm.replace(regex, '');
        console.log('search');
        processSearch(searchTerm);
    });

    $('#catType').on('submit', function (evt) {
        evt.preventDefault();
        evt.stopPropagation();
        var cat = $('#category').val();
        var type = $('#sec_type').val();

        console.log('category and type');
        processCatAndType(cat, type);
    })

    $('#newMitigation').on('click', function (evt) {
        evt.stopPropagation();
        console.log('CLICK');
        // Make URL for Ajax call
        //ajaxURL = 'controller/php/login.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        // $.post(ajaxURL, $('#loginForm').serialize(), processLogin);
        // console.log('AJAX call submitted.');
        goToCreate();
    });

    $('#mostRecent').on('click', function (evt) {
        evt.stopPropagation();
        console.log('CLICK');
        // Make URL for Ajax call
        //ajaxURL = 'controller/php/login.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        // $.post(ajaxURL, $('#loginForm').serialize(), processLogin);
        // console.log('AJAX call submitted.');
        gotoMostRecent();
    });

    $('#random').on('click', function (evt) {
        evt.stopPropagation();
        console.log('CLICK');
        // Make URL for Ajax call
        //ajaxURL = 'controller/php/login.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        // $.post(ajaxURL, $('#loginForm').serialize(), processLogin);
        // console.log('AJAX call submitted.');
        gotoRandom();
    });

    $('#cancel').on('click', function (evt) {
        evt.stopPropagation();
        console.log('Closed login');
        closeForm();
    })

}

/*******************************************************
 * Call-back Functions
 ******************************************************/

function goToCreate() {
    window.location.href = 'view/php/create.php';
}

function processSearch(searchTerm) {

    window.location.href = 'view/php/search.php?q=' + searchTerm;
}

function processCatAndType(cat, type) {

    window.location.href = 'view/php/search.php?q?catType?c=' + cat + '?t=' + type;
}

function gotoMostRecent() {
    window.location.href = 'view/php/search.php?q=mostrecent'
}

function gotoRandom() {
    window.location.href = 'view/php/search.php?q=random'
}