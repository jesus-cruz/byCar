<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../CSS files/comentariosStyles.css">
    </head>
<body>

<?php
//$q = intval($_GET['q']);

?>      
    <div class="all">
        <div class="stars">

            
            <label for="comentario" > Comentario</label>
            <textarea rows="6" cols="40" id="comentario" name="comentario" form="comen"> </textarea>
	   <form action="puntuar.php?q=<?php echo intval($_GET['q']); ?>" id="comen" name="comen" method="post" >
            

            <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
            <label class="star star-5" for="star-5"></label>

            <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
            <label class="star star-4" for="star-4"></label>

            <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
            <label class="star star-3" for="star-3"></label>

            <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
            <label class="star star-2" for="star-2"></label>

            <input class="star star-1" id="star-1" type="radio" name="star" value="1" checked/>
            <label class="star star-1" for="star-1"></label>
           
           
           <input type="submit" value="Enviar">
	  </form>

	</div>
        </div>
        
        
        

</body>
</html>
