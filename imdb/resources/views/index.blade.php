
<x-layout>
    @include('partials._hero')

    
        <h2 class="text-white mx-10 mt-10 mb-6 text-2xl">Utvalda Filmer</h2>
        <div class="mx-10 mt-6 mb-20 grid grid-gap-2 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mx-1/2">

            @if(count($movies)==0)
            <p>Fart</p>
            @endif


            @foreach($movies as $movie)
            <x-movie-card :movie="$movie"/>
            @endforeach

            
            
            
        </div>
</x-layout>
  
    