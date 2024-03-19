<?php
$json_data = file_get_contents('messages.json');
$messages = json_decode($json_data, true);

$htmlstring = "";	

if ($messages !== null) {
    foreach ($messages as $message) {

        $htmlstring .= "<div class='container'>";
        $htmlstring .= "<h4>" . $message['username'] . "</h4>";
        $htmlstring .= "<p>" . $message['message']. "</p>";
        if(!empty($message['image_url'])){
            $htmlstring .= "<img src='" . $message['image_url'] . "' alt='uploaded image'>";
        }
        $htmlstring .= "</div>"; 
    }

} else {
    
    $htmlstring .= "No messages found.";
}
?>
