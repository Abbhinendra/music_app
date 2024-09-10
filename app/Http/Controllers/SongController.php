<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;
use App\Http\Requests\SongRequest;
class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->input('search')){
           $search=$request->input('search');
           $song = Song::where('songname', 'like', '%' . $search . '%')->paginate(4);
           $song->appends($request->all());
        }
        else{
        $id=$request->input('id');
        $song=Song::where('album_id',$id)->paginate(4);
        $song->appends($request->all());
        }
        return view('music.index',compact('song'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album=Album::all();
        return view('music.create', compact('album'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SongRequest $request)
    {
        $filename=time().'.'.$request->file('file')->getClientOriginalExtension();
        $path=$request->file('file')->storeAs('public/uploads', $filename);
        $filename2=time().'.'.$request->file('image')->getClientOriginalExtension();
        $path2=$request->file('image')->storeAs('public/uploads', $filename2);
        $song=Song::create([
         'songname'=>$request->songname,
         'songimage'=>$filename,
         'image'=>$filename2,
         'album_id'=>$request->album_id

        ]);

        return redirect()->route('album');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
