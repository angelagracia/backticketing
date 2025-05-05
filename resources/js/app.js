
document.addEventListener("DOMContentLoaded", function () {
    if (typeof ticketId !== 'undefined') {
        window.Echo.join(`chat.ticket.${ticketId}`)
            .listen('MessageSendEvent', (e) => {
                Livewire.dispatch('message-received', { message: e.message });
            });
    }
});
