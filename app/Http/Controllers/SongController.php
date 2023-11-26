<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SongModel;


class SongController extends Controller
{
    //
    public function upload()
    {
        return view('song.upload');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'NameSong' => 'required',
            'Artist' => 'required',
            'Type' => 'required',
            'LinkMp3' => 'required|mimes:mp3',
            'Img' => 'required|mimes:jpg',

        ]);

        $mp3file = $request->file('LinkMp3');
        $Name = time() . '.' . $mp3file->getClientOriginalExtension();
        $mp3file->storeAs('SongData', $Name);

        $imgfile = $request->file('Img');
        $Name1 = time() . '.' . $imgfile->getClientOriginalExtension();
        $imgfile->storeAs('Img', $Name1);

        SongModel::create([
            'NameSong' => $request->input('NameSong'),
            'Artist' => $request->input('Artist'),
            'Type' => $request->input('Type'),
            'LinkMp3' => $Name,
            'Img' => $Name1,
            'UserCreate' => auth()->user()->id,
        ]);

        return redirect('/song/upload')->with('done', 'Succcessed');
    }
}
