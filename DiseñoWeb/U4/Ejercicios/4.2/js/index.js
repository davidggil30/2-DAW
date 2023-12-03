// Obtener elementos del DOM
var video = document.getElementById('video');
var playButton = document.getElementById('play');
var pauseButton = document.getElementById('pause');
var stopButton = document.getElementById('stop');
var backwardButton = document.getElementById('backward');
var forwardButton = document.getElementById('forward');
var muteButton = document.getElementById('mute');
var volumeControl = document.getElementById('volume');
var fullscreenButton = document.getElementById('fullscreen');
var playlistItems = document.querySelectorAll('.playlist li a');

// Reproducir video al hacer clic en un elemento de la lista de reproducción
playlistItems.forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();
        video.src = this.getAttribute('data-src');
        video.load();
        video.play();
    });
});

// Agregar eventos a los botones del reproductor
playButton.addEventListener('click', () => video.play());
pauseButton.addEventListener('click', () => video.pause());
stopButton.addEventListener('click', () => {
    video.pause();
    video.currentTime = 0;
});
backwardButton.addEventListener('click', () => video.currentTime -= 10);
forwardButton.addEventListener('click', () => video.currentTime += 10);
muteButton.addEventListener('click', () => video.muted = !video.muted);
volumeControl.addEventListener('input', () => video.volume = volumeControl.value);
fullscreenButton.addEventListener('click', () => video.requestFullscreen());

// Actualizar el control de volumen
video.addEventListener('volumechange', () => {
    volumeControl.value = video.volume;
});

