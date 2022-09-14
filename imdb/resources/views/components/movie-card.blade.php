          
            <div class="col-auto m-3 max-w-[250px]">
                <a href="/movies/{{$movie->id}}" >
                    <img 
                    src="{{$movie->image ? asset('storage/' . $movie->image) : asset('img/no-image.jpg')}}" 
                    class="w-[230px] h-[330px] object-cover mx-2"
                    alt="Bild från {{$movie->title}}"
                    />
                </a>
                <ul class="flex justify-between mx-2 my-1">
                    <li class="text-white text-sm">
                        {{$movie->country}} {{$movie->year}}
                    </li>
                    <li class="text-white text-sm">
                       <i class="fa-solid fa-star text-yellow-500 mr-1"></i>
                       {{$movie->rate($movie)}}
                    </li>
                </ul>
                <h3 class="text-white text-2xl mx-2 my-1">{{$movie->title}}</h3>
                <x-movie-tags :tagsList="$movie->tags"/>
            </div>