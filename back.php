<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'];
    $message = $_POST['message'];

    
    if(isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

       
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            
            $image_url = $target_file;
        } else {
            
            $image_url = null;
        }
    } else {
        $image_url = null;
    }
    
   
    $new_message = array(
        'username' => $username,
        'message' => $message,
        'image_url' => $image_url
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
