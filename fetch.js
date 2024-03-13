function fetchMessages() {
    fetch('chat.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('chatMessages').innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching messages:', error);
        });
}

fetchMessages();
setInterval(fetchMessages, 5000); 

document.getElementById('chatForm').addEventListener('submit', function(event) {
    event.preventDefault(); 
    const formData = new FormData(this);

    fetch('back.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                return response.text(); //
            }
            throw new Error('Network response was not ok.');
        })
        .then(data => {
            // Clear form fields after successful submission
            document.getElementById('username').value = '';
            document.getElementById('message').value = '';
            document.getElementById('file').value = '';

            fetchMessages();
            console.log(data);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
});