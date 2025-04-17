import Echo from "laravel-echo";

// Tidak perlu import Pusher, karena kita pakai Reverb
// import Pusher from "pusher-js"; ❌ Hapus ini

// Gantilah ticket_id sesuai tiket yang sedang dibuka
let ticketId = 1;

window.Echo = new Echo({
    broadcaster: "reverb",
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ["ws", "wss"],
});

window.Echo.connector.socket.on('connect', () => {
    console.log("Connected to Reverb");
    console.log("Socket ID:", window.Echo.socketId());
    window.axios.defaults.headers.common["X-Socket-Id"] = window.Echo.socketId();
});

window.Echo.private(`chat.${ticketId}`)
    .listen("ChatMessageSent", (event) => {
        console.log("Pesan baru:", event.message);
        let chatContainer = document.querySelector(".chat-container");
        let newMessage = `
            <div class="chat-message received">
                <div class="message-text">${event.message.message}</div>
                <div class="chat-timestamp">${new Date(event.message.created_at).toLocaleTimeString()}</div>
            </div>
        `;
        chatContainer.innerHTML += newMessage;
    });
