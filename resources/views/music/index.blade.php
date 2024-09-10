@extends('songslayout.app')
@push('css')
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
@endpush
@section('content')
<div class="contents songs-container">
<h2>Songs</h2>
<div class="container">
@php
    $sno=0;
    $playerShow=false;
@endphp
@forelse ($song as $value)
<div class="card">
<img src="{{Storage::url('/public/uploads/'.$value->image)}}" alt="">
<br>
<div class="title"><p class="songTitle">{{\Illuminate\Support\Str::limit($value['songname'], 16, '...')}}</p></div>
<p class="song-data" id="{{$sno}}">{{$value['songimage']}}</p>
<span class="center-svg">
    <img  src="{{asset('svg/spotify.svg')}}" alt="">
</span>
</div>
@php
    $sno++;
@endphp
@empty
<h2>No Data to show</h2>
@php
    $playerShow=true;
@endphp
@endforelse
</div>
<div class="center-pagination">
    {{$song->links('pagination::default')}}
</div>
</div>
@endsection
@section('player')
@if (!$playerShow)
<div class="player">
    <div class="volum">
<div class="icons">
    <div style="display: flex; justify-content:center; align-items:center; color:white;" id="songnameIcon"><li id="songname"></li> <li id="songtime">00/00</li>   <span id="playgif"><img src="{{asset('images/playgif.gif')}}" alt=""></span></div>
    <div class="mainplay" style="display: flex; justify-content:center; align-items:center; "><img id="previous" style="filter: invert(100%)" src="{{asset('svg/left.svg')}}" alt=""> <img id="play" style="filter: invert(100%)" src="{{asset('svg/pause.svg')}}" alt=""> <img id="next" style="filter: invert(100%)"  src="{{asset('svg/right.svg')}}" alt=""></div>
    <div class="sound" style="display: flex; justify-content:center; align-items:center;"><img style="filter: invert(100%)" src="{{asset('svg/loop.svg')}}" alt="" title="Loop Song" id="loop"> <img style="filter: invert(100%)" id="downloadSong" src="{{asset('svg/download.svg')}}" alt="" title="Download Song"> <img style="filter: invert(100%)" id="sound" src="{{asset('svg/sound.svg')}}" alt=""> <input type="range" value="10" id="volum"></div>
</div>
</div>
<div class="playbar">
    <input type="range"  value="0" id="seekBar" step="0.1">
</div>
</div>
@endif
@endsection
@push('js')
    <script  src="{{asset('js/music.js')}}"></script>
@endpush
