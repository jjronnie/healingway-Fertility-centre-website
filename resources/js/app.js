import './bootstrap';
import './custom.js';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import { createIcons, icons } from 'lucide'

document.addEventListener('DOMContentLoaded', () => {
    createIcons({ icons })
})
