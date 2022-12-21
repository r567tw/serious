import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('livewire:load', function () {
    Livewire.on('alert_remove', () => {
        console.log("remove")
        setTimeout(function () {
            $(".alert").fadeOut();
        }, 5000); // 5 secs
    });
})
