console.log('sessionVariables.js loaded');

function setUserID(user_id, username) {
    ajaxURL = '../../controller/setSessionUserUD.php' +
            '?user_id=' + user_id + '&username=' + username;
    ajaxFetch(ajaxURL, acknowledgeSettingUserID);
}

function acknowledgeSettingUserUD() {
    console.log('Okay, user id set');
}

function getSessionVariables() {
    //Checking session variable - if not, back to login form
    ajaxURL = '../../controller/getSessionVariables.php';
    ajaxFetch(ajaxURL, processSessionVariables);

}

function processSessionVariables(jsonData) {
    //get new values from Ajax return
    sessionArray = JSON.parse(jsonData);

    //if logged in, continue, if not, back to login.

    if(typeof sessionArray.user_id == 'null' ||
    typeof sessionArray.user_id == 'undefined' ||
    sessionArray.user_id.trim() == '') {
    //user still logged in, might be a refresh
        sessionArray.user_id = 'session expired';
    }
}