<x-layout>   
    <div class="container flex flex-col md:flex-row my-10 mx-2 md:mx-6">
            <img 
            src="{{$movie->image ? asset('storage/' . $movie->image) : asset('img/no-image.jpg')}}" 
            class="m-10 w-[300px] h-[430px] object-cover"
            alt="Bild från {{$movie->title}}"
            />
            <div class="m-10">
                <p class="text-white text-sm mb-2">
                    {{$movie->country}} {{$movie->year}}
                </p>
                <h1 class="text-white text-3xl mb-6">{{$movie->title}}</h1>
                <p class="text-white text-md font-bold mb-4">
                    <i class="fa-solid fa-star mr-1 text-yellow-500"></i>
                    {{$average}}
                </p>
                
                <p class="text-white my-2">
                    {{$movie->description}}
                </p>
                <x-movie-tags :tagsList="$movie->tags"/>
                
                <a href="#"
                class="bg-yellow-500 text-black text-sm font-bold px-4 py-2 rounded-xl hover:bg-yellow-600">
                    <i class="fa-solid fa-circle-plus ml-1"></i>
                    Lägg till i lista  
                </a>
                <a href="/movies/{{$movie->id}}/edit"
                class="bg-yellow-500 text-black text-sm font-bold px-4 py-2 m-2 rounded-xl hover:bg-yellow-600">
                        <i class="fa-solid fa-pencil"></i> Uppdatera
                </a>
                <form method="POST" action="/movies/{{$movie->id}}">
                        @csrf
                        @method('DELETE')
                        <button 
                            class="bg-yellow-500 text-black text-sm font-bold px-4 py-2 m-2 rounded-xl hover:bg-yellow-600">
                            <i class="fa-solid fa-trash"></i>
                            Radera film
                        </button>
                </form>

            </div>
            
        </div>
        <section class="">
            <div class="flex justify-around md:justify-between max-w-[500px]">
                <h2 class="text-white text-2xl mx-6 md:mx-10">Recensioner
                </h2>
                <a href="/write/{{$movie->id}}"
                class="bg-yellow-500 rounded-xl text-black text-sm font-bold py-2 px-4 mx-2 md:mx-16 hover:bg-yellow-600">
                    Skriv en recension
                </a>
            </div>
            

            <div class="flex flex-col md:flex-row md:flex-wrap m-6 mb-20">
            
            @if(count($reviews)==0)
            <h3 class="text-white text-xl mx-6"
            >Det finns inga recensioner att visa</h3>
            @endif

                
            @foreach($reviews as $review)
            <div class="bg-white rounded-xl p-4 m-4 max-w-[400px]">
                    <div class="flex justify-between text-sm">
                        <h4>{{$review->user->username}}</h4>
                        <ul class="flex ml-2">
                             
                            @for ($i = 0; $i < $review['rating']; $i++)
                            <li><i class="fa-solid fa-star text-yellow-500"></i></li>
                            
                            @endfor
                        </ul>
                    </div>
                    <h3 class="text-lg font-bold my-2">{{$review->title}}</h3>
                    <p class="text-xs">
                    {{$review->description}}
                    </p>
                </div>
            @endforeach
             

            </div>

        </section>
</x-layout>