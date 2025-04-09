import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;
window.Echo = new Echo({
    broadcaster: "pusher",
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true,
});

// Gantilah `ticket_id` sesuai dengan tiket yang sedang dibuka
let ticketId = 1; 

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
