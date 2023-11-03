<?php
session_start();

if (isset($_POST['image'])) {
    $img = $_POST['image'];
    $folderPath = "../../upload/";

    // Check if the data URI starts with "data:image/png;base64,"
    if (preg_match('/^data:image\/png;base64,/', $img)) {
        // Remove the prefix to get the base64 data
        $image_base64 = preg_replace('/^data:image\/png;base64,/', '', $img);
        
        // Decode the base64 data
        $image_data = base64_decode($image_base64);
        
        if ($image_data !== false) {
            $fileName = uniqid() . '.png'; // Use .png for PNG images
            $file = $folderPath . $fileName;
            
            if (file_put_contents($file, $image_data)) {
                $_SESSION["photoko"] = "../../upload/" . $fileName;
                $_SESSION['successMessage'] = "Photo successfully submitted.";
            } else {
                $_SESSION['errorMessage'] = "Failed to save the image.";
            }
        } else {
            $_SESSION['errorMessage'] = "Invalid base64 data.";
        }
    } else {
        $_SESSION['errorMessage'] = "Invalid image format or missing prefix.";
    }
} else {
    $_SESSION['errorMessage'] = "Image data not received.";
}

header("location: database_entry.php");
