
//str -> seria el Id del pasajero con el que estemos logeados
function getPassengerTrips(str) {


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
  xmlhttp.open("GET","backendPHP/getTrips.php?q="+str,true);
  xmlhttp.send();
}

//id del viaje
function getTripsInfo(str) {

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
  xmlhttp.open("GET","backendPHP/infoTrayecto.php?q="+str,true);
  xmlhttp.send();
    
}


function AnularViaje(str,pas) {

	var date1 = new Date();
	var date2;

	if (window.XMLHttpRequest) {
    		// code for IE7+, Firefox, Chrome, Opera, Safari
    		xmlhttp=new XMLHttpRequest();
 	 } else { // code for IE6, IE5
   	 	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
  	xmlhttp.onreadystatechange=function() {
    		if (this.readyState==4 && this.status==200) {
	 
     		 	var date2 = new Date(this.responseText);
			var hours = Math.abs(date2 - date1) / 36e5;
			
			if(hours>6){

				if (window.XMLHttpRequest) {
    					// code for IE7+, Firefox, Chrome, Opera, Safari
    					xmlhttp2=new XMLHttpRequest();
  				} else { // code for IE6, IE5
    					xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
  				}
				xmlhttp2.onreadystatechange=function() {
    					if (this.readyState==4 && this.status==200) {
	 
     		 				/*var d = this.responseText;
						alert(d);*/

					}
  				};
  					xmlhttp2.open("GET","backendPHP/anulDate.php?q="+str+"&s="+pas,true);
  					xmlhttp2.send();
		

				}
				else{
					alert("no se puede anular, faltan menos de 6 horas... cabron "+hours);
				}
    			}
  		};
  	xmlhttp.open("GET","backendPHP/getDate.php?q="+str,true);
 	 xmlhttp.send();
}


// function ori(str) {

//   if (window.XMLHttpRequest) {
//     // code for IE7+, Firefox, Chrome, Opera, Safari
//     xmlhttp=new XMLHttpRequest();
//   } else { // code for IE6, IE5
//     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//   }
//   xmlhttp.onreadystatechange=function() {
//     if (this.readyState==4 && this.status==200) {
//       document.getElementById("origenes").innerHTML=this.responseText;
//     }
//   };
//   xmlhttp.open("GET","backendPHP/searchOrigen.php?q="+str,true);
//   xmlhttp.send();
    
// }


//TODO ponerlo un poco chuli

//  TODO que cuando en un viaje clickes sobre el nombre del conductor me dejeis preparado el ID de la sesion actual que 
//  habeis recuperado por $SESSON

$(document).ready(function() {

  //TODO -> implementar la llamada del backend que recupere el ID de $_SESSION['id'];
  $.ajax({

  });

	getPassengerTrips("1");


	$(this).on('click', '.clickable', function(){
    		getTripsInfo($(this).attr('id'));
	});


	$(this).on('click', '.anul', function(){
    		
		AnularViaje($(this).attr('id'),"1");
		getPassengerTrips("1");
	});


});

