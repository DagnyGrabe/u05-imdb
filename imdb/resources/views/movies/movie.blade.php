<x-layout>   
        <div class="flex flex-col lg:flex-row justify-start my-10 mx-2 md:mx-6">

            <img 
            src="{{$movie->image ? asset('storage/' . $movie->image) : asset('img/no-image.jpg')}}" 
            class="m-10 w-[300px] h-[430px] object-cover"
            alt="Bild från {{$movie->title}}"
            />
            <div class="m-10 md:max-w-[400px]">
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
                
                <form method="POST" action="/lists">
                    @csrf
                    <input class="hidden"
                       type="hidden"
                       name="movie_id"
                       value="{{$movie->id}}"/>

                    <input class="hidden"
                       type="hidden"
                       name="title"
                       value="{{$movie->title}}"/>


                    <button type="submit" class="bg-yellow-500 text-black text-sm font-bold px-4 py-2 rounded-xl hover:bg-yellow-600">
                        <i class="fa-solid fa-circle-plus ml-1"></i>
                        Lägg till i lista  
                    </button>
                </form>

            </div>
            <div class="m-10">
                <h2 class="text-white text-xl mb-6">
                    Trailer
                </h2>

                @if(!empty($movie->video))
                <iframe src="{{$movie->video}}"
                    class="h-[180px] w-[270px] md:h-[240px] md:w-[360px]" 
                    frameborder="0" allowfullscreen>
                </iframe>
                @else
                <p class="text-white text-lg">
                    Den här filmen har ingen Trailer
                </p>
                @endif
            </div>
            
        </div>

        <section class="">
            <div class="flex justify-around md:justify-between max-w-[600px]">
                <h2 class="text-white text-2xl ml-6 md:mx-10">Recensioner
                </h2>
                <a href="/write/{{$movie->id}}"
                class="bg-yellow-500 rounded-xl text-black text-sm font-bold py-2 px-4 mx-2 md:mx-16 hover:bg-yellow-600">
                    <i class="fa-solid fa-pen mr-1"></i>
                    Skriv en recension
                </a>
            </div>
            

            <div class="flex flex-col justify-start items-start md:flex-row md:flex-wrap m-2 md:m-6 mb-20">
            
            @if(count($reviews)==0)
            <h3 class="text-white text-xl mx-6 mb-6"
            >Det finns inga recensioner att visa</h3>
            @endif

                
            @foreach($reviews as $review)
                <x-review-card :review="$review"/>
            @endforeach
             

            </div>

        </section>
</x-layout>