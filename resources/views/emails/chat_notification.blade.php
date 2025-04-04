{{-- <html>
<head>
    <title>Pesan Baru</title>
</head>
<body>
    <p><strong>Pengirim:</strong> {{ $message->user->name }}</p>
    <p><strong>Pesan:</strong> {{ $message->message }}</p>
</body>
</html> --}}


<!DOCTYPE html>
<html>
<head>
    <title>Pesan Baru</title>
</head>
<body>
    <h2>Pesan Baru dari {{ $message->sender->name }}</h2>
    <p><strong>Isi Pesan:</strong></p>
    <p>{{ $message->message }}</p>

    <br>
    <p>Silakan cek percakapan di aplikasi:</p>
    <a href="{{ url('/chat') }}">Lihat Percakapan</a>
</body>
</html>
