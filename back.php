<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
    $username = htmlspecialchars($_POST['username']);
    $message = htmlspecialchars($_POST['message']);

    $timestamp = time(); 

    if ($_FILES["file"]["size"] > 5000) {
        echo "Sorry, your file is too large.";
        $image_url = null; 
    } else {
       
        $imageFileType = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $image_url = null; 
        } else {
            
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $image_url = $target_file;
            } else {
                $image_url = null;
            }
        }
    }

    $new_message = array(
        'username' => $username,
        'message' => $message,
        'image_url' => $image_url,
        'timestamp' => $timestamp 
    );

    $json_data = file_get_contents('messages.json');
    $messages = json_decode($json_data, true);
    if ($messages == null) {
        $messages = array();
    }

    array_push($messages, $new_message);

    $json_data = json_encode($messages, JSON_PRETTY_PRINT);

    file_put_contents('messages.json', $json_data);
}
?>
