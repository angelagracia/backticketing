<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Notifikasi Tiket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            padding: 20px;
            color: #333;
        }
        .email-container {
            background-color: #ffffff;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .header h2 {
            color: #1d4ed8;
        }
        .content {
            line-height: 1.6;
        }
        .ticket-info {
            background-color: #f0f4ff;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .ticket-info strong {
            display: inline-block;
            width: 130px;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h2>📩 Notifikasi Tiket Anda</h2>
        </div>
        <div class="content">
            <p>Halo <strong>{{ $ticket->name }}</strong>,</p>
            <p>Terima kasih telah membuat tiket keluhan melalui sistem kami. Berikut detail tiket Anda:</p>

            <div class="ticket-info">
                <p><strong>Nomor Tiket:</strong> {{ $ticket->ticket_number }}</p>
                <p><strong>Deskripsi:</strong> {{ $ticket->req_description }}</p>
            </div>

            <p>Tim kami akan segera memproses dan memberikan tanggapan sesegera mungkin.</p>
            <p>Jika Anda memiliki pertanyaan lebih lanjut, silakan hubungi tim support kami.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Helpdesk System - All rights reserved.
        </div>
    </div>
</body>
</html>

