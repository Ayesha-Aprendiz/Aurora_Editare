<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $targetDir = "Pictures/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;

    $response = array(); // Use traditional array syntax

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $response['message'] = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $response['message'] = "File is not an image.";
        $uploadOk = 0;
    }

    if (file_exists($targetFile)) {
        $response['message'] = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["image"]["size"] > 5000000) {
        $response['message'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($imageFileType, array('jpg', 'jpeg', 'png', 'gif'))) { // Use traditional array syntax
        $response['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $response['message'] = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $response['message'] = "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        } else {
            $response['message'] = "Sorry, there was an error uploading your file.";
        }
    }

    echo json_encode($response);
} else {
    echo json_encode(array('message' => 'Invalid request method.'));
}
?>