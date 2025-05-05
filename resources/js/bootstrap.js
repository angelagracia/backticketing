import Echo from 'laravel-echo';
import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: window.location.hostname,
    wsPort: 8080,
    wssPort: 8080,
    forceTLS: false,
    disableStats: true,
});

Livewire.start();
