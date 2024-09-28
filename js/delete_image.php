<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON input
    $input = json_decode(file_get_contents('php://input'), true);
    
    // Get the image name
    $imageName = $input['image_name'];

    // Define the path to the image
    $imagePath = __DIR__ . '/' . $imageName; // Adjust the path as needed

    // Check if the file exists and delete it
    if (file_exists($imagePath)) {
        if (unlink($imagePath)) {
            echo json_encode(['message' => 'Image deleted successfully.']);
        } else {
            echo json_encode(['message' => 'Error deleting the image.']);
        }
    } else {
        echo json_encode(['message' => 'Image does not exist.']);
    }
} else {
    echo json_encode(['message' => 'Invalid request.']);
}
?>
