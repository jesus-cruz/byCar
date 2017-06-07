
<?php
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
    } else {
        echo "File is not an image.";
    }
}

// Check file size
if ($_FILES["foto"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}


    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

?>
