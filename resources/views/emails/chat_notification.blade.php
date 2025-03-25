<html>
<head>
    <title>Pesan Baru</title>
</head>
<body>
    <p><strong>Pengirim:</strong> {{ $message->user->name }}</p>
    <p><strong>Pesan:</strong> {{ $message->message }}</p>
</body>
</html>
