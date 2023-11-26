<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Music') }}
        </h2>
    </x-slot>
    <div class="w-full flex items-center justify-center mt-5">
        <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg w-2/3">
            <table class="table-auto border" id="ListTable">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Name Song</th>
                        <th class="px-4 py-2">Artist</th>
                        <th class="px-4 py-2">Type</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($followedUsers as $music)
                    <tr>
                        <td class="px-4 py-2">{{ $music->NameSong }}</td>
                        <td class="px-4 py-2">{{ $music->Artist }}</td>
                        <td class="px-4 py-2">{{ $music->Type }}</td>
                        <td class="px-4 py-2">


                            
                            <a href="{{ route('song.edit', $music->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded-md hover:bg-blue-600 hover:text-white mr-2">Edit</a>


                            <form action="{{ route('song.destroy', $music->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600 hover:text-white mr-2">Delete</button>
                            </form>




                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
