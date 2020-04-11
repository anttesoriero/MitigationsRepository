/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function dropDown() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function dropDown2() {
  document.getElementById("myDropdown2").classList.toggle("show");
}

function dropDown3() {
  document.getElementById("myDropdown3").classList.toggle("show");
}

function dropDown4() {
  document.getElementById("myDropdown4").classList.toggle("show");
}

function results()
{
    var input, filter, ul, li, a, i, txtValue;
    
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');
    
    for (i = 0; i<li.length; i++)
        {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if(txtValue.toUpperCase().indexOf(filter)> -1)
                {
                    li[i].style.display = "";
                }
            else
                {
                    li[i].style.display = "none";
                }
        }
}

function fillDiv(trigger)
{
	var textVal = "";
	var sub=document.getElementById('rightResultDisplay');
	if (trigger != null)
	{
		txtVal = "YOU CLICKED A THIIIIIIIING";
	txtVal = document.getElementById(trigger).innerHTML;
	}
	sub.innerHTML = txtVal;
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}