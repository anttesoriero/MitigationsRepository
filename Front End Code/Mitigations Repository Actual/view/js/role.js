try {
    ajaxURL = '../../controller/php/getRole.php';
    role = ajaxFetch(ajaxURL, processRole);
} catch (e) {
    console.log("Error in getRole.php" + e);
}


function processRole(jsonResults) {

    var role = JSON.parse(jsonResults);
    console.log(role);
}