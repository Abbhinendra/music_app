@extends('masterlayout.app')
@push('css')
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
@endpush
@section('content')
<div class="contents">
<h2>Albums</h2>
<div class="container">
@forelse ($allalbums as $value)
    <div class="card">
    <img src="{{Storage::url('/public/uploads/'.$value->img)}}" alt="">
    <br>
    <div class="title"><p>{{\Illuminate\Support\Str::limit($value['albumname'], 16, '...')}}</p></div>
    <div class="action">
        <a href="{{route('music.index',['id'=>$value->id])}}">View Songs</a>
    </div>
    </div>
@empty
<h2>No Data to show</h2>
@endforelse
</div>
</div>
<div class="center-pagination">
    {{$allalbums->links('pagination::default')}}
</div>
@endsection
