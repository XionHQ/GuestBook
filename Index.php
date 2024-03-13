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
            <a href="">
                <img src="assets/pfp.jpg" alt="logo">
            </a>

            <li><a href="#">Home</a></li>
            <li><a href="#">Chat</a></li>
            <li><a href="#">Instructions</a></li>
        </ul>
    </nav>
    <div class="main">
        <div class="chatbox">
            <h1>Chatbox</h1>
            <form id="chatForm">
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="text" name="message" id="message" placeholder="Type your message">
                <input type="file" name="file" id="file">
                <button type="submit" id="sendMessage">Send</button>
            </form>
            <div id="chatMessages">
                <?php
                include 'chat.php';
                ?>
                
            </div>
        </div>

    </div>

</body>


</html>