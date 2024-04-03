<?php
// Set session cookie parameters
$lifetime = 86400; // 1 day in seconds
session_set_cookie_params($lifetime);

// Start session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_SESSION['message_sent'])) {
    $username = htmlspecialchars($_POST['username']);
    $message = htmlspecialchars($_POST['message']);
 
    if ($_FILES["file"]["size"] > 500000) {
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
        'timestamp' => date('Y-m-d H:i:s')
    );

    $json_data = file_get_contents('messages.json');
    $messages = json_decode($json_data, true);
    if ($messages == null) {
        $messages = array();
    }

    array_push($messages, $new_message);

    $json_data = json_encode($messages, JSON_PRETTY_PRINT);

    file_put_contents('messages.json', $json_data);

    // Mark message as sent during this session
    $_SESSION['message_sent'] = true;
}
?>
