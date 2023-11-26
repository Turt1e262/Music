<x-app-layout>
<div class="w-full flex items-center justify-center mt-5">
    <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg w-1/2">
        <h1 class="text-2xl font-semibold mb-4">Edit Song</h1>
        <form method="POST" action="{{ route('song.update', $song->id) }}">
            @csrf
            @method('PUT') {{-- Use PUT method for updates --}}
            
            <div class="mb-4">
                <label for="NameSong" class="block text-gray-600">Name Song:</label>
                <input type="text" name="NameSong" id="NameSong" class="w-full border rounded py-2 px-3" value="{{ $song->NameSong }}">
            </div>
            
            <div class="mb-4">
                <label for="Artist" class="block text-gray-600">Artist:</label>
                <input type="text" name="Artist" id="Artist" class="w-full border rounded py-2 px-3" value="{{ $song->Artist }}">
            </div>
            
            <div class="mb-4">
                <label for="Type" class="block text-gray-600">Type:</label>
                <input type="text" name="Type" id="Type" class="w-full border rounded py-2 px-3" value="{{ $song->Type }}">
            </div>

            <div>
                <label for="LinkMp3" class="text-gray-700 dark:text-gray-300 font-medium">Mp3 file</label>
                <input type="file" name="LinkMp3" id="LinkMp3" accept=".mp3" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"required>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Song</button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>