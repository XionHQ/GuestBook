<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
            <h1>chatbox</h1>
            <form id="chatForm">
                <input type="text" name="message" id="message">
                <button type="submit">Send</button>
                <input type="file" name="file" id="file">
            </form>
            <div id="chatMessages">

            </div>
        </div>

    </div>
</body>


</html>