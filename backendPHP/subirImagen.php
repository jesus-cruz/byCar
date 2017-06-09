
<?php
$dirImg = "img/";
$imagenUsr = $dirImg . basename($_FILES["foto"]["name"]);
$imagenScript = pathinfo($imagenUsr,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {
    if(!getimagesize($_FILES["foto"]["tmp_name"])) {
        echo "No es una imagen";
        return;
    }
    if ($_FILES["foto"]["size"] > 50000) {
        echo "Imagen demasiado grande";
        return;
    }
    if($imagenScript != "jpg" && $imagenScript != "png" && $imagenScript != "jpeg" ) {
        echo "Error en el formato, solo están permitidos jpg, jpeg o png";
        return;
    }
}

// La imagen es una imagen del tamaño apropiado y en un formato permitido

if (move_uploaded_file($_FILES["foto"]["tmp_name"], $imagenUsr)) {
    header("location: ../paginaCodigo.php");
} else {
    echo "Error subiendo la imagen, pero era una imagen correcta";
}

?>
