<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Upload Music') }}
        </h2>
    </x-slot>
    <div class="w-full flex items-center justify-center mt-5">
        <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg w-1/2">
            @if (session('done'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        {{ session('done') }}
                    </div>
                @endif
            <form method="POST" action="/song" enctype="multipart/form-data" class="space-y-6 rounded-lg">
                @csrf
                <div>
                    <label for="NameSong" class="text-gray-700 dark:text-gray-300 font-medium">Name Song</label>
                    <input type="text" name="NameSong" id="NameSong" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full "required>
                </div>
                <div>
                    <label for="Artist" class="text-gray-700 dark:text-gray-300 font-medium">Artist</label>
                    <input type="text" name="Artist" id="Artist" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"required>
                </div>
                <div>
                    <label for="Type" class="text-gray-700 dark:text-gray-300 font-medium">Type</label>
                    <input type="text" name="Type" id="Type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"required>
                </div>
                <div>
                    <label for="LinkMp3" class="text-gray-700 dark:text-gray-300 font-medium">Mp3 file</label>
                    <input type="file" name="LinkMp3" id="LinkMp3" accept=".mp3" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"required>
                </div>
                <div>
                    <label for="LinkMp3" class="text-gray-700 dark:text-gray-300 font-medium">IMG file</label>
                    <input type="file" name="Img" id="Img" accept=".jpg, .jpeg, .webp" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"required>
                </div>
                <div>
                    <button type="submit" class="bg-white rounded-lg px-4 " >Upload</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>