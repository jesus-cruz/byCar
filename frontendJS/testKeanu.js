
function PasTrips(str) {


  if (str==="") {
    document.getElementById("LTrayectos").innerHTML="Yo, it's not working";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("LTrayectos").innerHTML=this.responseText;
    }
  };
  xmlhttp.open("GET","getTrips.php?q="+str,true);
  xmlhttp.send();
}

function TriNfo(str) {

   if (str==="") {
    	document.getElementById("infoTrayecto").innerHTML="Yo, it's not working";
    	return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("infoTrayecto").innerHTML=this.responseText;
    }
  };
  xmlhttp.open("GET","infoTrayecto.php?q="+str,true);
  xmlhttp.send();
    
}



function initialize(){
    alert('Hello');
}

function works(str) {

 
    document.getElementById('infoTrayecto').innerHTML = str;

}




$(document).ready(function() {

	PasTrips("117");

	$(this).on('click', '.clickable', function(){
    		TriNfo($(this).attr('id'));
	});


});

