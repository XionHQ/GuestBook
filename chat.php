<?php
// Read JSON data from file
$json_data = file_get_contents('messages.json');
$messages = json_decode($json_data, true);

// Check if messages is not null
if ($messages !== null) {
    // Display each message
    foreach ($messages as $message) {
        // Escape user-generated content before outputting it\
        $escaped_username = htmlspecialchars($message['username']);
        $escaped_message = htmlspecialchars($message['message']);
        $escaped_image_url = htmlspecialchars($message['image_url']);

        echo "<div class='container'>";
        echo "<h4>" . $escaped_username . "</h4>";
        echo "<p>" . $escaped_message . "</p>";
        if(!empty($escaped_image_url)){
            echo "<img src='" . $escaped_image_url . "' alt='uploaded image'>";
        }
        echo "</div>";
    }

} else {
    // Handle case where messages is null or empty
    echo "No messages found.";
}


?>