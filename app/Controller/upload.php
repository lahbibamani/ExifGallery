<?php
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $output = ['error'=>'Sorry, your file is not an image.'];
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $target_file =$target_dir. uniqid().".".pathinfo($target_file, PATHINFO_EXTENSION);
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    $output = ['error'=>'Sorry, your file is too large.'];
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    $output = ['error'=>'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'];
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded. Here is his details: <br>";
        $output = [];
    } else {
        $output = ['error'=>'Error while uploading images. Please try again'];
    }

    echo json_encode($output);
}

function object_to_array($obj) {
    if (is_object($obj))
        $obj = (array) $obj;
    if (is_array($obj)) {
        $new = array();
        foreach ($obj as $key => $val) {
            $new[$key] = object_to_array($val);
        }
    } else
        $new = $obj;
    return $new;
}
