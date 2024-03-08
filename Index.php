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
            <div class="logo">
                <a href="">
                    <img src="assets/pfp.jpg" alt="logo">
                </a>
            </div>

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
            </form>
            <div id="chatMessages">
            
            </div>
        </div>
       
    </div>

    <script>
        document.getElementById("chatForm").addEventListener("submit", function(event) {
            event.preventDefault();
            var message = document.getElementById("message").value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "chat.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("chatMessages").innerHTML += xhr.responseText;
                    document.getElementById("message").value = ""; // Clear input field after sending message
                }
            }
            xhr.send("message=" + message);
        });
    </script>
</body>
</html>