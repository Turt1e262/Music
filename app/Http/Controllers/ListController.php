<?php

namespace App\Http\Controllers;

use App\Models\SongModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


class ListController extends Controller
{
    public function listFollowedUsers()
    {
        // Find the user whose follows you want to list
        $user = Auth::id();


        // Retrieve the users that the specified user is following
        $musics = SongModel::Where('UserCreate', $user)->get();

        return view('Song.list', ['followedUsers' => $musics]);
    }





    public function deleteSong($id)
    {
        // Find the song by ID and ensure it belongs to the currently authenticated user
        $song = SongModel::where('UserCreate', Auth::id())->findOrFail($id);

        // Delete the song
        $song->delete();

        return redirect()->route('song.list')->with('success', 'Song deleted successfully');
    }



    public function editSong($id)
    {
        // Find the song by ID and ensure it belongs to the currently authenticated user
        $song = SongModel::where('UserCreate', Auth::id())->findOrFail($id);

        return view('song.edit', ['song' => $song]);
    }




    public function updateSong(Request $request, $id)
    {
        // Find the song by ID and ensure it belongs to the currently authenticated user
        $song = SongModel::where('UserCreate', Auth::id())->findOrFail($id);

        // Update the song with the new data from the form
        $song->update([
            'NameSong' => $request->input('NameSong'),
            'Artist' => $request->input('Artist'),
            'Type' => $request->input('Type'),
            'LinkMp3' => $request->input('LinkMp3'),
            'Img' => $request->input('Img'),
        ]);

        return redirect()->route('song.list')->with('success', 'Song updated successfully');
    }





    public function listAllSongs()
    {
        $songs = SongModel::all();

        return view('dashboard', ['songs' => $songs]);
    }


    public function streamMusic($path)
    {
        // Construct the full path to the MP3 file using the file name
        $fullPath = storage_path('app/SongData/' . $path);

        if (file_exists($fullPath)) {
            // Return the MP3 file as a response with the appropriate content type
            $file = Storage::get('SongData/' . $path);

            $response = Response::make($file, 200);
            $response->header('Content-Type', 'audio/mpeg');

            return $response;
        } else {
            return response('Audio file not found', 404);
        }
    }





    public function showImage($path)
    {
        // Construct the full path to the image file using the file name
        $fullPath = storage_path('app/Img/' . $path);

        if (file_exists($fullPath)) {
            // Return the image file as a response with the appropriate content type
            $file = Storage::get('Img/' . $path);

            $response = Response::make($file, 200);
            $response->header('Content-Type', 'image/jpeg'); // Adjust the content type based on your image format

            return $response;
        } else {
            return response('Image file not found', 404);
        }
    }
}
