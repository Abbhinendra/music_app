<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{asset('svg/logo.svg')}}"/>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    @stack('css')
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
        @yield('content')
    </main>
    @yield('player')
</div>
</body>
<script src="https://kit.fontawesome.com/527feac5c0.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
let bar = document.querySelector('.bar');
let ul = document.getElementById('ul');
bar.addEventListener('click', function () {
    ul.classList.toggle('add');
    console.log('click hua');
});
</script>
@stack('js')
</html>
