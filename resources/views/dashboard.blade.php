    <x-app-layout>
        <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Music') }}
          </h2>
        </x-slot>
      
        <div class="w-full flex items-center justify-center mt-5">
          <div class="bg-white dark:bg-gray-800 shadow-md p-4 rounded-lg w-1/2">
            <h1 class="text-2xl font-semibold text-blue-500 dark:text-yellow-400 mb-4">All Songs</h1>
      
            <ul>
                @foreach ($songs as $song)



              <li class="mb-4">
                <div class="bg-blue-100 dark:bg-gray-700 p-4 rounded-lg shadow-md flex items-center">
                    <div class="flex-1">
        <div class="mb-2">
            <p class="text-3xl font-semibold text-blue-600 dark:text-yellow-400">{{ $song->NameSong }}</p>
        </div>
        <div>
            <p class="text-lg font-semibold text-blue-600 dark:text-yellow-400"> Type: {{ $song->Type }}</p>
        </div>
        <div>
            <p class="text-lg font-semibold text-blue-600 dark:text-yellow-400"> Artist: {{ $song->Artist }}</p>
        </div>
    </div>
   

    <div class="flex-1 text-center">
      @if ($song->Img)
          <img src="{{ route('song.image', ['path' => $song->Img]) }}" alt="Song Image" class="w-20 h-20 object-cover rounded-full">
      @else
          <span class="text-gray-400">No Image Available</span>
      @endif
  </div>
  
  

                    <div class="flex-1 text-center">
                    <audio controls class="mt-2 inline-block" data-audio-id="{{ $song->id }}">
                        <source src="{{ route('song.stream', ['path' => $song->LinkMp3]) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    </div>
                    <div>
                    <img src="https://cdn.pixabay.com/photo/2013/07/13/12/07/record-159211_640.png" alt="Record" class="w-10 h-10 record-image animate-spin-slow ml-4">
                    </div>
                </div>
                </li>

                            
                  
                                   
                  
                @endforeach
              </ul>
              
          </div>
        </div>
      </x-app-layout>
      