<script type="text/javascript">
/* load audio file */
var music = document.createElement('audio');
music.src = 'wp-content/uploads/2018/04/city_of_stars.mp3';
music.preload = true;
music.autoplay = false;
music.loop = true;

function togglePause(){
    var player = jQuery('.music-player');
    if (player.hasClass('paused')) {
        music.play();
    } else {
        music.pause();
    }

    player.toggleClass('paused playing');
}

/* create music-player element */
jQuery(document).ready(function(){
    var musicPlayer = document.createElement('div');
        playButton = document.createElement('div');
        textWindow = document.createElement('div');
        textBoard = document.createElement('div');
        songName = document.createElement('span');
        singerName = document.createElement('span');

    /* playButton */
    playButton.classList.add('play-button');

    /* textBoard */
    songName.classList.add('song-name');
    singerName.classList.add('singer-name');
    textBoard.classList.add('text-board');
    textBoard.appendChild(songName);
    textBoard.appendChild(singerName);

    /* textWindow */
    textWindow.classList.add('text-window');
    textWindow.appendChild(textBoard);

    /* musicPlayer */
    musicPlayer.classList.add('music-player');
    musicPlayer.classList.add('paused');
    musicPlayer.appendChild(playButton);
    musicPlayer.appendChild(textWindow);

    jQuery('.scroll-top').after(musicPlayer);

    /* listen to click event fired by the playButton */
    jQuery('.play-button').click(togglePause);
})
</script>
