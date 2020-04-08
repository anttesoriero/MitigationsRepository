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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>

<script>
function showUser(str)
{
if (str=="")
{
    document.getElementById("company_name").value="";
    return;
}
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        var data = JSON.parse(xmlhttp.responseText);
        for(var i=0;i<data.length;i++) 
        {
          document.getElementById("company_name").value = data[i].name;
          document.getElementById("company_email").value = data[i].web;
        }
    }
}
xmlhttp.open("GET","formdata.php?q="+str,true);
xmlhttp.send();
}
</script>

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
}

function destroy(message) {
    $('#rightResultDisplay').html(message);
}