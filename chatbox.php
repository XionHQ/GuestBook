<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="fetch.js" defer></script>
    <title></title>
</head>

<body>
<nav class="Navbar">
        <ul class="Navbar-List">
            <li>
                <a href="index.html">
                    <img src="assets/pfp.jpg" alt="logo">
                </a>
            </li>
            <li><a href="index.html">Home</a></li>
            <li><a href="chatbox.php">Chat</a></li>
            <li><a href="Instructions.html">Instructions</a></li>
        </ul>
    </nav>
    <div class="main">
        <div class="chatbox">
            <h1>Chatbox</h1>
            <form id="chatForm">
                <input type="text" maxlength="50" name="username" id="username" placeholder="Username (Max 50 characters)">
                <input type="text" maxlength="500" name="message" id="message" placeholder="Message (Max 500 characters)">
                <input type="file" name="file" id="file">
                <button type="submit" id="sendMessage">Send</button>
            </form>
        </div>


        <div id="chatMessages">
            <?php
            include 'chat.php';
            ?>
        </div>
</body>


</html>