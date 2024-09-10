@extends('masterlayout.app')
@section('content')
<main class="storealbum" style="background: #0b4141 !important;">
 <div class="container text-center my-4"><h2>Add Album</h2></div>
 <br>
<div class="container my-4">
  <form action="{{route('album.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Album Title</label>
    <input type="text" name="album" class="form-control" id="exampleFormControlInput1" placeholder="Album Title" required autocomplete="off">
    <br>
    @error('album')
      <span style="color: red">{{$message}}</span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Album Image</label>
    <input type="file" name="file" class="form-control" id="exampleFormControlInput1" required>
    <br>
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
