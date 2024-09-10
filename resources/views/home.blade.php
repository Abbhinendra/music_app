<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{asset('svg/logo.svg')}}"/>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>TuneTrail - Web Player: Music for everyone</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{route('home')}}"><img src="{{asset('svg/logo.svg')}}" alt=""></a></li>
            <li><a href="{{route('home')}}" id="home">Home</a></li>
        </ul>
        <ul id="ul">
        <li><a href="{{route('album')}}">Album</a></li>
        <li><a  href="{{route('mainpage')}}">Add Album</a></li>
        <li><a href="{{route('music.create')}}">Add Song</a></li>
        <li>
            <form action="{{route('music.index')}}" method="GET">
                <input type="text" name="search" placeholder="Search">
                <button type="submit">Search</button>
            </form>
        </li>
    </ul>
    <div class="bar">
        <img src="{{asset('svg/bar.svg')}}" style="filter: invert(100%)" alt="bar">
    </div>
    </nav>
    <div class="min-height"></div>
    <div class="content">
    <main>
        <div class="color">
            <div>
            <p id="element"></p>
            </div>
        </div>
    </main>
</div>
<header>
<div>
   <ul>
    <li><a target="_blank" href="mailto:thakurabhinendra6@gmail.com"><i style="font-size: 27px" class="fa-regular fa-envelope"></i></a></li>
    <li><a target="_blank" href="https://wa.me/9399595594"><i style="font-size: 27px" class="fa-brands fa-whatsapp"></i></a></li>
   </ul>
   <ul>
    <li><a target="_blank" href="https://www.instagram.com/abhinendrathakur1"><i style="font-size: 27px" class="fa-brands fa-instagram"></i></a></li>
    <li><a target="_blank" href="https://www.github.com/abbhinendra"><i style="font-size: 27px" class="fa-brands fa-github"></i></a></li>
   </ul>
</div>
<div class="copyright">
    <p>Copyright ©  <span id="time"></span>   TuneTrail.com</p>
</div>
</header>
</body>
<script src="https://kit.fontawesome.com/527feac5c0.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script src="/js/index.js"></script>
<script>
    var typed = new Typed('#element', {
      strings: ['Harmony Highway: Your Journey Through Sound.', 'Melody Voyage: Explore the Soundscapes.','SoundSafari: Navigate the Melodies.','MelodyMapper: Charting Your Musical Journey.','SymphonyExplorer: Unveil the Harmonic Path.','HarmonyQuest: Your Journey in Melodies.'],
      typeSpeed: 70,
    });

    let bar = document.querySelector('.bar');
    let ul = document.getElementById('ul');
    bar.addEventListener('click', function () {
    ul.classList.toggle('add');
    console.log('click hua');
   });

  </script>
</html>
