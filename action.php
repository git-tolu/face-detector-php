<?php

include "FaceDetector.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = 'uploads/'; // Directory where uploaded files are stored
    $uploadFile = $uploadDir . basename($_FILES['uploaded_file']['name']);
    
    $detector = new svay\FaceDetector('detection.dat');
    // Check if the file was successfully uploaded
    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $uploadFile)) {
        // $detector->faceDetect($uploadDir . basename($_FILES['uploaded_file']['name']));
        // $detector->faceDetect('img3.jpg');
        
        if($detector->faceDetect($uploadDir . basename($_FILES['uploaded_file']['name']))){
            // $detector->toJpeg();
            echo "face detected";
        }else{
            echo "NO face detected";

        }
    } else {
        echo "Failed to upload the file.";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.72.0">
    <title>Album example · Bootstrap</title>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/face-api.js"></script>


</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">

        <input type="file" id="fileInput" accept="image/*" name="uploaded_file">
        <button id="checkFaceButton" type="submit">Check for Face</button>
    </form>
</body>

</html>