<!DOCTYPE html>
<html>
<head>
    <title>Notifikasi Tiket</title>
</head>
<body>
    <h2>Halo {{ $ticket->name }},</h2>
    <p>Terima kasih telah membuat tiket keluhan.</p>
    <p><strong>Nomor Tiket:</strong> {{ $ticket->ticket_number }}</p>
    <p><strong>Deskripsi:</strong> {{ $ticket->req_description }}</p>
    <p>Kami akan segera menindaklanjuti laporan Anda.</p>
</body>
</html>
