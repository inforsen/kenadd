function openDashNav() {
	document.getElementById("dash_menu").style.width="100%";
	document.getElementById("close_dash_nav").style.display="inline-block";
	document.getElementById("open_dash_nav").style.display="none";
}

function closeDashNav() { 
	document.getElementById("dash_menu").style.width="0%";
	document.getElementById("close_dash_nav").style.display="none";
	document.getElementById("open_dash_nav").style.display="inline-block";
}

function addcollection () {
	var x = document.getElementsByClassName ('nondisp_collection')[0];
	if (x.style.display === 'none') {
		x.style.display = 'block';
	} else {
		x.style.display = 'none';
	}
}