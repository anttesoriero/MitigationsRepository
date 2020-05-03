/* Index page listeners */

console.log('indexListeners.js loaded.');
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

    $(document).ready(function () {
        $("#searchField").keyup(function (event) {

            if (event.isComposing || event.keyCode === 229) {
                return;
            } else {
                ajaxURL = "../../controller/php/autoCompleteMitigation.php?s=" + $(this).val();

                $.post(ajaxURL, $('#searchField').serialize(), processAutoComplete);
            }
        });
    });
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

    window.location.href = 'view/php/search.php?q=catType&c=' + cat + '&t=' + type;
}

function gotoMostRecent() {
    window.location.href = 'view/php/search.php?q=mostrecent'
}

function gotoRandom() {
    window.location.href = 'view/php/search.php?q=random'
}

function processAutoComplete(dropList) {
    rawTitleList = JSON.parse(dropList);

    titleList = "<ul id = 'mitList'>";
    for (i = 0; i < rawTitleList.length; i++) {
        titleList += "<li onclick='selectMitigation(&quot;" + rawTitleList[i].title + "&quot;)'>" + rawTitleList[i].title + "</li>";
    }

    titleList += "<li><a href='view/php/create.php'>Create New Mitigation</a></li>";
    titleList += "</ul>";

    console.log(titleList);
    $("#suggestion-box").show();
    $("#suggestion-box").html(titleList);
    $("#searchField").css("background", "#FFF");
}


//To select mitigation name
function selectMitigation(val) {
    console.log("clickamit");
    $("#searchField").val(val);
    $("#suggestion-box").hide();
}