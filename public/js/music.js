    let song_Data = document.querySelector('.song-data');
    let currentSong = new Audio();
    currentSong.src = 'storage/public/uploads/' + song_Data.innerHTML;
    let songname = document.getElementById('songname');
    let songTitle = document.querySelector('.songTitle');
    let songtime = document.getElementById('songtime');
    let previous = document.getElementById('previous');
    let play = document.getElementById('play');
    let next = document.getElementById('next');
    let card = document.querySelectorAll('.card');
    const seekBar = document.getElementById('seekBar');
    let volum = document.getElementById('volum');
    let sound = document.getElementById('sound');
    let downloadSong = document.getElementById('downloadSong');
    let songCount=0;
    let loop=document.getElementById('loop');
    let playGif=document.querySelector("#playgif img");

    songname.innerHTML=songTitle.innerText;
    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const formattedMinutes = minutes.toString().padStart(2, '0');
        const remainingSeconds = seconds % 60;
        const formattedSeconds = remainingSeconds.toString().padStart(2, '0');

        return `${formattedMinutes}:${formattedSeconds}`;
    }

    function music(song) {
        currentSong.src = song;
        currentSong.play();
        let url = 'svg/play.svg';
        play.src = url;
        playGif.style.opacity=1;
    }



        let element = Array.from(card);
        element.forEach(el => {
            el.addEventListener('click', function (e) {
                let songData = e.currentTarget.querySelector('.song-data');
                songCount=songData.id;
                songname.innerHTML=e.currentTarget.querySelector('.songTitle').innerText;
                music('/storage/public/uploads/' + songData.innerHTML);
            });
        })

        play.addEventListener('click', function () {
            if (currentSong.paused) {
                currentSong.play();
                let url = 'svg/play.svg';
                play.src = url;
                playGif.style.opacity=1;
            }
            else {
                currentSong.pause();
                let url = 'svg/pause.svg';
                play.src = url;
                playGif.style.opacity=0;
            }
        })


        volum.addEventListener('change', function () {
            currentSong.volume = parseInt(volum.value) / 100;
            if (currentSong.volume == 0) {
                sound.src = 'svg/soundpause.svg';
            }
            else {
                sound.src = 'svg/sound.svg';
            }
        })

        sound.addEventListener('click', function () {
            if (currentSong.volume == 0) {
                sound.src = 'svg/sound.svg';
                currentSong.volume = 1;
                volum.value = 10;
            }
            else {
                sound.src = 'svg/soundpause.svg';
                volum.value = "00";
                currentSong.volume = 0;
            }

        })


// download current song
const downloadCurrentSong = (url) => {
    fetch(url).then(res=>res.blob()).then(file=>{
        let trum=URL.createObjectURL(file);
        let link=document.createElement("a");
        link.href=trum;
        link.download=url;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        link.remove();
        URL.revokeObjectURL(trum);
    })
};

downloadSong.addEventListener('click', function(){
    downloadCurrentSong(currentSong.src);
});


//logic to next button

let songUrl=null;
next.addEventListener('click', function(){
     try {
        let allSongs=document.querySelectorAll('.card .song-data');
        let originalSongs=Array.from(allSongs);
        songCount++;
        if(songCount===originalSongs.length){
           let length=originalSongs.length;
           songUrl='storage/public/uploads/' + originalSongs[length].innerHTML;
           music(songUrl);
        }else{
           songUrl='storage/public/uploads/' + originalSongs[songCount].innerHTML;
           music(songUrl);
        }
        let currentSongName=document.querySelectorAll('.card')[songCount];
        songname.innerHTML=currentSongName.querySelector('.songTitle').innerText;
     } catch (error) {

    }

});

//logic to previous button

previous.addEventListener('click', function(){
try {
    let allSongs=document.querySelectorAll('.card .song-data');
    let originalSongs=Array.from(allSongs);
    songCount--;
    if(songCount <= 0){
        songCount=0;
        songUrl='storage/public/uploads/' + originalSongs[songCount].innerHTML;
        music(songUrl);
    }
    else{
        songUrl='storage/public/uploads/' + originalSongs[songCount].innerHTML;
        music(songUrl);
    }
    let currentSongName=document.querySelectorAll('.card')[songCount];
    songname.innerHTML=currentSongName.querySelector('.songTitle').innerText;

} catch (error) {

}
});


//loop song functionallty

loop.addEventListener('click', function(){
if(currentSong.loop!=true){
   currentSong.loop=true;
   loop.style.filter = "brightness(0) saturate(100%) invert(27%) sepia(77%) saturate(4137%) hue-rotate(97deg) brightness(104%) contrast(101%)";
}
else{
    currentSong.loop=false;
    loop.style.filter = "invert(100%)";
}
});


currentSong.addEventListener("timeupdate", () => {
     document.getElementById("songtime").innerHTML = `${formatTime(Math.trunc(currentSong.currentTime))} / ${formatTime(Math.trunc(currentSong.duration))}`;
     seekBar.value = (currentSong.currentTime / currentSong.duration) * 100;
     const seekBarValue = parseInt(seekBar.value);
     const currentTime = currentSong.currentTime;
     const duration = currentSong.duration;
     if (seekBarValue === 100 && currentTime >= duration && !currentSong.loop) {
         currentSong.pause();
         let url = 'svg/pause.svg';
         play.src = url;
         seekBar.value=0;
         playGif.style.opacity=0;
    }
})

seekBar.addEventListener("change", () => {
     currentSong.currentTime = seekBar.value * currentSong.duration / 100;
})


