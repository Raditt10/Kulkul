const lang = localStorage.getItem('language');
const zone = localStorage.getItem('timezone');
if(lang){ document.documentElement.setAttribute('lang', lang); }
if(zone){ console.log('Zona waktu aktif:', zone); }