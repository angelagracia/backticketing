<div id="chat-box"></div>

<form id="chat-form">
    @csrf
    <input type="text" id="message" name="message" placeholder="Type a message...">
    <button type="submit">Send</button>
</form>

<script src="{{ mix('js/app.js') }}"></script>
<script>
    document.getElementById('chat-form').addEventListener('submit', function(e) {
        e.preventDefault();

        var message = document.getElementById('message').value;

        fetch('/send-message', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ message: message })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        });
    });
</script>
