function getUsers() {
 
  
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("Lusuarios").innerHTML=this.responseText;
    }
  };
  xmlhttp.open("POST","backendPHP/getListUsuarios.php",true);
  xmlhttp.send();
     
}
 
function borrar(str){
 
 if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
     } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
      
                }
        };
    xmlhttp.open("POST","backendPHP/borrarUsuario.php?q="+str,true);
     xmlhttp.send();
     
    alert("Has eliminado al usuario.");
    location.reload();

}
function backToMainPage(){
  window.location.href = "principal.php";
}
 
 
$(document).ready(function() {
 
    getUsers();
    $(this).on('click', '.delete', function(){
            borrar($(this).attr('id'));
            getUsers();
    });
 
 
});