<html>
<head>
    <title>Verifikasi Email Baru</title>
</head>
<body>
    <p>Halo, {{ $user->name }}</p>
    <p>Kami menerima permintaan untuk mengganti email Anda ke email baru ini.</p>
    <p>Silakan klik link berikut untuk memverifikasi email baru Anda:</p>
    <p>
        <a href="{{ url('/verify-email/'.$token) }}">Verifikasi Email</a>
    </p>
    <p>Jika Anda tidak merasa melakukan permintaan ini, silakan abaikan email ini.</p>
</body>
</html>
