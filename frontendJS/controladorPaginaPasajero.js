
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

function getAnterioresPassengerTrips(str) {


  if (str==="") {
    document.getElementById("LTrayectosAnteriores").innerHTML="Yo, it's not working";
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
      document.getElementById("LTrayectosAnteriores").innerHTML=this.responseText;
    }
  };
  xmlhttp.open("GET","backendPHP/getTripsAnteriores.php?q="+str,true);
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
                //alert(this.responseText);
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
           alert("No se puede anular ya que faltan menos de 6 horas.");
         }
       }
     };
     xmlhttp.open("GET","backendPHP/getDate.php?q="+str,true);
     xmlhttp.send();
   }


   var ide;

   $(document).ready(function() {


    $.ajax({
      type: "post",
      url: "backendPHP/checkSession.php",
      dataType: "json",
      cache: "false",
      success:function(data){
        ide=data.id;
        getPassengerTrips(ide);
        getAnterioresPassengerTrips(ide);
        $(document).on('click', '.clickable', function(){
          getTripsInfo($(this).attr('id'));
        });

        $(document).on('click', '.anul', function(){

          AnularViaje($(this).attr('id'),ide);
          getPassengerTrips(ide);

        });        
        $(document).on('click', '.comentar', function(){
          ($(this).attr('id'),ide);
        });
      }
    });
  });

  function openChatWith(id) {
    sessionStorage.setItem('you_id', id);
    window.location.href = "chatPage.php";
  }
  function backMainPage() {
    window.location.href = "principal.php";
  }

