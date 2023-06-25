<?php
// Check if the file was uploaded successfully
if ($_FILES['ico_file']['error'] !== UPLOAD_ERR_OK) {
die('Error uploading file');
}

// Get the file extension
$extension = pathinfo($_FILES['ico_file']['name'], PATHINFO_EXTENSION);

// Convert the ICO file to PNG
if ($extension === 'ico') {
$image = imagecreatefromico($_FILES['ico_file']['tmp_name']);
imagepng($image, 'output.png');
} else {
die('File is not an ICO file');
}

// Download the PNG file
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="output.zip"');
readfile('output.zip');
?>
