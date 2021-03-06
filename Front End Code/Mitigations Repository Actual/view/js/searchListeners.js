/*search page listeners  */

console.log('searchListeners.js loaded.');

/*on load, initialize div content */

$('#left').load('../shtml/searchResults.shtml');


/* Initial population of results  */
var searchType = location.search.substring(location.search.indexOf('=') + 1);
var role = 'role';
var deferred = 'deferred';
var regex = /[!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~]/g


/*Getting user's role*/
try {
    ajaxURL = '../../controller/php/getRole.php';
    roleTemp = ajaxFetch(ajaxURL, processRole);
} catch (e) {
    console.log("Error in getRole.php" + e);
}


try {
    if (searchType === 'random') {
        ajaxURL = '../../controller/php/getRandMitigation.php';
    } else if (searchType === 'mostrecent') {
        ajaxURL = '../../controller/php/getRecentMitigation.php';
    } else if (searchType.includes('catType')) {
        ajaxURL = '../../controller/php/getCatTypeMitigation.php?q=' + searchType;
    } else {
        ajaxURL = '../../controller/php/getTitleSearchMitigation.php?s=' + searchType;
    }

    console.log(ajaxURL);
    mitigations = ajaxFetch(ajaxURL, processResults);
    console.log("Hopefully connected?");
} catch (e) {
    console.log("Error in " + searchType + "get_____Mitigation.php " + e);
}

addListeners();

/*****************************************************
 *                        Listeners                  *
 *****************************************************/
function addListeners() {

    $('.wholeResult').on('click', function (evt) {
        evt.stopPropagation();
        console.log('YOU CLICKED A THING');

        var mit_id = $(this).attr('name');
        console.log(mit_id);
        try {
            ajaxURL = '../../controller/php/getMitigation.php?m=' + mit_id;

            mitigation = ajaxFetch(ajaxURL, processMitigationData)
        } catch (e) {
            console.log("Error in getMitigation.php");
        }

        try {
            ajaxURL = '../../controller/php/getChildren.php?m=' + mit_id;

            children = ajaxFetch(ajaxURL, processChildren)
        } catch (e) {
            console.log("Error in getchildren.php");
        }
    });

    $(document).on('click', "#edit", function (evt) {
        var mit_id = $(this).attr('name');
        console.log('CLICK');
        goToEdit(mit_id);

    });

    $(document).on('click', "#fork", function (evt) {
        var mit_id = $(this).attr('name');
        console.log('CLICK');
        goToFork(mit_id);

    });

    $(document).on('click', "#delete", function (evt) {
        var mit_id = $(this).attr('name');
        console.log('CLICK');
        goToDelete(mit_id);

    });

    console.log('Dropdown Listeners?');
    $('#category').on('change', function () {
        console.log('Cat Changed');
        catFilter($(this).val());
    });

    $('#sec_type').on('change', function () {
        console.log('Type Changed');
        typeFilter($(this).val());
    });

    $('#osMenu').on('change', function () {
        console.log('OS Changed');
        osFilter($(this).val());
    });

    $('#sortType').on('change', function () {
        console.log('Filter Type Changed');
        if ($(this).val() === 'dateDesc') {
            deferred = sortFilter('date', '#myUL', 'li', 'desc');
        } else if ($(this).val() === 'dateAsc') {
            deferred = sortFilter('date', '#myUL', 'li', 'asc');
        } else {
            deferred = sortFilter('initial', '#myUL', 'li', 'asc');
        }
    });

    console.log('filtering maybe?')
    $('#myInput').on('keyup', function (event) {
        if (event.isComposing || event.keyCode === 229) {
            return;
        } else {
            results();
        }
    });
}

/****************************************************
 *                  Callbacks                       *
 ****************************************************/

function processResults(jsonResults) {

    //this parses the json results so JS can use them.
    //plus this gives each result its own listener
    //this actually echos what I did in the search prototype! - Theresa

    console.log(jsonResults);
    var jsonData = JSON.parse(jsonResults);
    var numRecords = jsonData.length;
    console.log(jsonData);

    var htmlString = "<ul id='myUL' class=\"resultsList\">";
    var id;
    console.log("now parsing list...");
    for (i = 0; i < numRecords; i++) {
        //This will make each row a unique div with a unique ID!
        id = 'result' + i;
        htmlString += "<li date = '" + jsonData[i].created_at.replace(regex, "") + "' initial = '" + i + "'><div class='wholeResult' id='" + id + "' name='" + jsonData[i].mitigation_id + "'>" +
            "<div class='resultRight'><span class='cat'>" + jsonData[i].category + "</span><br><span class='type'>"
            + jsonData[i].sec_type + "</span></div><span class='lefttitle'>" + jsonData[i].title +
            "</span><br><div class='resultLeft'><span class = 'mitid'>Mitigation ID:" + jsonData[i].mitigation_id +
            "</span><br><span class='os1'>Operating System: " +
            jsonData[i].OS_name + "</span><span class='os2'> Version: " + jsonData[i].version + "</span><br>";

        htmlString += "<br><span class='author'>Author: " + jsonData[i].Author + "</span><br>" +
            "<span class='created'>Created on:" + jsonData[i].created_at + "</span><br>" +
            "<span class='modified'>Modified on:" + jsonData[i].modified_at + "</span><br>" +
            "<span class='further'>" + jsonData[i].description + "</span></div></div></li>";
    }

    htmlString += "</ul>";

    $('#allResults').html(htmlString);
}

function goToEdit(mit_id) {
    window.location.href = 'edit.php?s=' + mit_id;
}

function goToFork(mit_id) {
    window.location.href = 'forkingView.php?s=' + mit_id;
}

function goToDelete(mit_id) {
    window.location.href = 'deleteView.php?s=' + mit_id;
}

function processMitigationData(jsonResults) {
    var jsonData = JSON.parse(jsonResults);
    console.log(jsonData);
    var htmlString = "<div class='entireResult' id='" + jsonData[0].mitigation_id + "'>" +
        "<div class='resultRight'><span class='cat'>" + jsonData[0].category + "</span>" +
        "<br><span class='type'>" + jsonData[0].sec_type + "</span></div>" +
        "<span class='title'>" + jsonData[0].title + "</span><br>" +
        "<div class='resultLeft'><span class='mitid'>Mitigation ID: " + jsonData[0].mitigation_id + "</span>" +
        "<br><span class='link'>Link to this mitigation: " + "<a href='../php/fullMitigation.php?m=" + jsonData[0].mitigation_id + "'> " + jsonData[0].mitigation_id + "</a></span>" +
        "<br><span class='forks' id='forks'></span><br>";

    //FORKS WILL GO HERE

    htmlString += "<input type = 'button' class='btn'  class = 'fork' id='fork' name='" + jsonData[0].mitigation_id + "' value='Fork Mitigation'/>";

    if (role === 'admin_user') {
        htmlString += "<input type = 'button' class='btn'  class = 'edit' id='edit' name='" + jsonData[0].mitigation_id + "' value='Edit Mitigation'/>";
        htmlString += "<input type = 'button' class='btn'  class = 'delete' id='delete' name='" + jsonData[0].mitigation_id + "' value='Delete Mitigation'/>";
    }

    htmlString += "<br><span class='author'>Author: " + jsonData[0].Author + "</span>" +
        "<br><span class='desc'>Created on: " + jsonData[0].created_at + "</span><br>" +
        "<span class='desc2'>Modified on: " + jsonData[0].modified_at + "</span><br>" +
        "<span class='desc'>Operating System: " + jsonData[0].OS_name + "</span>" +
        "<span class='desc2'> Version: " + jsonData[0].version + "</span><br>" +
        "<span class='further'>" + jsonData[0].description + "</span></div>"

    $('#rightResultDisplay').html(htmlString);
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

function results() {
    var input, filter, ul, li, a, i, txtValue;
    console.log('keyup');

    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');

    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByClassName("wholeResult")[0];
        console.log(a);
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function catFilter(catcat) {
    var filter, ul, li, a, i, txtValue;

    filter = catcat;
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');

    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByClassName("wholeResult")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function typeFilter(typetype) {
    var filter, ul, li, a, i, txtValue;

    filter = typetype;
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');

    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByClassName("wholeResult")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function osFilter(osos) {
    var filter, ul, li, a, i, txtValue;

    filter = osos;
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');

    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByClassName("wholeResult")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function sortFilter(arg, sel, elem, order) {
    console.log(arg);
    var $selector = $(sel),
        $element = $selector.children(elem);
    $element.sort(function (a, b) {
        var an = parseInt(a.getAttribute(arg)),
            bn = parseInt(b.getAttribute(arg));
        if (order == "asc") {
            if (an > bn)
                return 1;
            if (an < bn)
                return -1;
        } else if (order == "desc") {
            if (an < bn)
                return 1;
            if (an > bn)
                return -1;
        }
        return 0;
    });
    $element.detach().appendTo($selector);
}

function processRole(jsonResults) {

    var jsonData = JSON.parse(jsonResults);
    role = jsonData[0].ROLE;
    console.log(role);
}