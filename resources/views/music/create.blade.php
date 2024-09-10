@extends('masterlayout.app')
@section('content')
<main class="storealbum" style="background: #0b4141 !important;">
 <div class="container text-center my-4"><h2>Add Song</h2></div>
<div class="container my-4">
  <form action="{{route('music.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Song Name</label>
    <input type="text" name="songname" class="form-control" id="exampleFormControlInput1" placeholder="Song Name" required autocomplete="off">
    @error('songname')
    <span style="color: red">{{$message}}</span>
  @enderror
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Album name</label>

    <select class="form-control"  name="album_id" id="">
        @foreach ($album as $albums)
        <option value="{{ $albums->id}}">
          {{$albums->albumname}}
        </option>
        @endforeach
    </select>
    @error('album_id')
    <span style="color: red">{{$message}}</span>
  @enderror
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Chose song image</label>
    <input type="file" name="image" class="form-control" id="exampleFormControlInput1" required>
    @error('image')
    <span style="color: red">{{$message}}</span>
  @enderror
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Chose song</label>
    <input type="file" name="file" class="form-control" id="exampleFormControlInput1" required>
    @error('file')
    <span style="color: red">{{$message}}</span>
  @enderror
  </div>
  <br>
  <button type="submit" class="btn btn-success">Add</button>
  </form>
</div>
</div>
</main>
@endsection
