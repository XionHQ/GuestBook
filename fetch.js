document.getElementById('chatForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(this);


    fetch('back.php', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            if (response.ok) {
                return response.text();
            }
            throw new Error('Network response was not ok.');
        })
        .then(data => {
            document.getElementById('username').value = '';
            document.getElementById('message').value = '';
            document.getElementById('file').value = '';


            console.log(data);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
});
