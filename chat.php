<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST['message'];
    // You can save this message to a database or file, or process it further

    // For simplicity, let's just echo the message back
    echo '<div class="container darker">
            <img src="assets/pfp.jpg" alt="Avatar" class="right">
            <p>' . htmlspecialchars($message) . '</p>
            <span class="time-left">' . date("H:i") . '</span>
          </div>';
}
?>
